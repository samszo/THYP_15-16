		<script src="../js/jquery.min.js" ></script>
		<script src="../js/d3.v3.min.js" ></script>
		<script src="../js/d3pie.js"></script>
		<script src="../js/colorbrewer/colorbrewer.js"></script>
		<link href="../js/colorbrewer/colorbrewer.css" rel="stylesheet" />
			
			
			var dataEtu;  
			var urlGit = "https://github.com/";
			var urlDiigo = "https://www.diigo.com/user/";	
			
			$(document).ready(  
				 function()
				 {
				   $.ajax( {
							type: "GET",
							url: "../php/lecteurFlux.php?url=THYP1516photo",
							dataType: "xml",
							success: function(xml) 
									 {
											var i=0;
									   $(xml).find('enclosure').each(   
										 function()
										 {
											 if(i%2==0){
												$('<div class="items paire" id="link_' + i + '"></div>').html('<img onclick="voirData(' + i + ')" src="' + this.attributes[1].nodeValue + '" />').appendTo('#contenue');
											 }else{
												$('<div class="items impaire" id="link_' + i + '"></div>').html('<img onclick="voirData(' + i + ')" src="' + this.attributes[1].nodeValue + '" />').appendTo('#contenue');
											 }
											
										   i++;
										  });
										d3.csv("../php/lecteurFlux.php?url=THYP1516data", function(data) {
										   dataEtu = data;
										   data.forEach(function(d,i){
											   voirDataLogin(d);
										   })
										 });		   		   
									   
									  }
						});
				  }
				);
			//chercher les data
			function voirData(id){
				
				dataEtu.forEach(function(d){
					if(d.idPhoto==id && d.idPhoto!=""){
						
						
					}
				})
				
			}
			
			
			//afficher les infos 
			function voirDataLogin(d){
				var h = d.Prénom+" "+d.Nom
				+"</br>"
				+"<a href='mailto:mailto:"+ d.mail +"'>Contacter : " + d.Prénom + "</a> "
				+"</br>"
				+" "
				+"<a href='"+ d["page linkedIn"] +"'>linkedIn</a> "
				+"<br/>"
				+"<a href='"+urlDiigo+d["login Diigo"]+"'><img height='40px' src='../img/diigo.jpg' /></a>"
				+"<a href='"+urlGit+d["login Github"]+"'><img height='40px' src='../img/github.png' /></a>"
				+"<div id='graph"+d.idPhoto+"' />"
					$('<div class="data" id="data_' + d.idPhoto + '"></div>').html(h).appendTo('#link_' + d.idPhoto);
				
				creaGraphEtu(d);	
				
			}
			// merci à  http://d3pie.org/
			var score = {"nul": 0 , "moins nul": 20, "bon":60, "trop bon":80, "expert":100};
			var cats = ["Javascript","CSS","HTML","PHP","SVG","OWL","JAVA","XML",".NET","JSON","Objective-C","Android"];

			var fctColor = d3.scale.linear().domain([0, 100]).range(["#ff3400", "#3c9a2e"]);

			function creaGraphEtu(d){
				var dtGraph = [];
				cats.forEach(function(c){ 
					var s = score[d['Langages informatiques ['+c+']']];
					dtGraph.push({"label": c,"value": s,"color":fctColor(s) });
				});
				
				var pie = new d3pie("graph"+d.idPhoto, {
					"header": {
						"title": {
							"text": "Compétences",
							"fontSize": 24,
							"font": "open sans"
						},
						"subtitle": {
							"text": "Langages informatiques maitrisés ou non",
							"color": "#999999",
							"fontSize": 12,
							"font": "open sans"
						},
						"titleSubtitlePadding": 9
					},
					"footer": {
						"color": "#999999",
						"fontSize": 10,
						"font": "open sans",
						"location": "bottom-left"
					},
					"size": {
						"pieInnerRadius": "33%",
						"pieOuterRadius": "83%"
					},
					"data": {
						"sortOrder": "value-desc",
						"content": dtGraph
					},
					"labels": {
						"outer": {
							"pieDistance": 32
						},
						"inner": {
							"hideWhenLessThanPercentage": 3
						},
						"mainLabel": {
							"fontSize": 11
						},
						"percentage": {
							"color": "#ffffff",
							"decimalPlaces": 0
						},
						"value": {
							"color": "#adadad",
							"fontSize": 11
						},
						"lines": {
							"enabled": true
						},
						"truncation": {
							"enabled": true
						}
					},
					"effects": {
						"pullOutSegmentOnClick": {
							"effect": "linear",
							"speed": 400,
							"size": 8
						}
					},
					"misc": {
						"gradient": {
							"enabled": true,
							"percentage": 100
						}
					},
					"callbacks": {}
				});
			}