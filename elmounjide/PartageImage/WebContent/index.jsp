<%@page import="java.util.ArrayList"%>
<%@page import="com.thyp.models.Xslx"%>
<%@page import="java.util.HashMap"%>
<%@page import="java.util.Map"%>
<%@page import="java.util.List"%>
<%@page import="java.util.Vector"%>
<%@ page language="java" contentType="text/html; charset=UTF-8"
    pageEncoding="UTF-8"%>
    <%@page import="com.thyp.main.UrlImages" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Image</title>
	
	<script src="http://d3js.org/d3.v3.min.js"></script>
	<link href="js/nv.d3.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/d3/3.5.2/d3.min.js" charset="utf-8"></script>
    <script src="js/nv.d3.js"></script>
    <script src="js/stream_layers.js"></script>
	
	<link href='http://fonts.googleapis.com/css?family=Mr+Dafoe' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Amaranth:700' rel='stylesheet' type='text/css'>
	
	<link rel="stylesheet" href="css/styles.css" />
	<script type="text/javascript">
									var data = [
									                {key: "Javascript", y: 5},
									                {key: "CSS", y: 2},
									                {key: "HTML", y: 9},
									                {key: "PHP", y: 7},
									                {key: "SVG", y: 4},
									                {key: "OWL", y: 3},
									                {key: "JAVA", y: 0.5},
									                {key: "Xml", y: 0.5},
									                {key: "SCALA", y: 0.5},
									                {key: "NET", y: 0.5},
									                {key: "JSON", y: 0.5},
									                {key: "ObjectiveC", y: 0.5},
									                {key: "Android", y: 0.5}
									            ];
									var height = 350;
								    var width = 350;

								    nv.addGraph(function() {
								        var chart = nv.models.pieChart()
								            .x(function(d) { return d.key })
								            .y(function(d) { return d.y })
								            .width(width)
								            .height(height);

								        d3.select("#test")
								            .datum(data)
								            .transition().duration(1200)
								            .attr('width', width)
								            .attr('height', height)
								            .call(chart);
								        d3.select("#test1")
							            .datum(data)
							            .transition().duration(1200)
							            .attr('width', width)
							            .attr('height', height)
							            .call(chart);

								        // update chart data values randomly
								        setInterval(function() {
								        	data[0].y = Math.floor(Math.random() * 10);
								        	data[1].y = Math.floor(Math.random() * 10);
								            chart.update();
								        }, 4000);

								        return chart;
								    });

									</script>
</head>
<body>
	<%
		UrlImages urlImages = new UrlImages();
		Vector<String> images = urlImages.allImages("https://picasaweb.google.com/data/feed/base/user/117590660096025980525/albumid/6202430039697759777?alt=rss&kind=photo&hl=fr");
		List listPeople = urlImages.people();
	%>
	

	<h1><span class="cursive">Mohammed</span> EL MOUNJIDE</h1>
	
	<section>
		
		
		<div>
			<div>
				
				<%
					for (int i=0; i<images.size(); i++) {
				%>
				<figure>
					<img src="<%= images.get(i) %>" alt="" width="300" height="310" />
					<figcaption>
						<%
							for(int j=0;j<=urlImages.length()+1;j++){
								if(((Xslx)listPeople.get(j)).getIdPhoto()==i){
						%>
						<table>
							<tr>
								<td>Prénom : </td>
								<td><%= ((Xslx)listPeople.get(j)).getPrenom()%></td>
							</tr>
							<tr>
								<td>Nom : </td>
								<td><%= ((Xslx)listPeople.get(j)).getNom()%></td>
							</tr>
							<tr>
								<td>Adresse éléctronique : </td>
								<td><%= ((Xslx)listPeople.get(j)).getMail()%></td>
							</tr>
							<tr>
								<td>Login Github : </td>
								<td><%= ((Xslx)listPeople.get(j)).getLoginGithub()%></td>
							</tr>
							<tr>
								<td>Login Diigo : </td>
								<td><%= ((Xslx)listPeople.get(j)).getLoginDiigo()%></td>
							</tr>
							
						</table>
						
						<svg id="test" class="mypiechart"></svg>
									
						<%
								}
							}
						%>
					</figcaption>
				</figure>
				<%
					}
				%>
			</div>
		</div>
		
	</section>
</body>
</html>