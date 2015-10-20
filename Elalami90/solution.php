<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Trombinoscope des THYP 2015</title>
<script src="../js/jquery.min.js" ></script>
<script src="../js/d3.v3.min.js" ></script>
<script>
	var dataEtu;   
	$(document).ready(  
		 function()
		 {
		   $.ajax( {
		            type: "GET",
		            url: "pic.xml",
		            dataType: "xml",
		            success: function(xml) 
		                     {
		            				var i=0;
		                       $(xml).find('enclosure').each(   
		                         function()
		                         {
		                        	 	//console.log(this.attributes[1].nodeValue);
		                            $('<div class="items" id="link_' + i + '"></div>').html('<img onclick="voirData(' + i + ')" src="' + this.attributes[1].nodeValue + '" />').appendTo('#Div_XML');
			                       i++;
		                          });
		                      }
		        });
		   d3.csv("donnee.csv", function(data) {
			   dataEtu = data;
			    console.log(data);

			   
			   data.forEach(function(d,i){
				   //console.log(d.idPhoto+" "+d.Nom);
				  // console.log(d);
			   })
			   
			 });		   		   
		  }
		);
	
	function voirData(id){
		//chercher les data
		dataEtu.forEach(function(d){
			if(d.idPhoto==id && d.idPhoto!=""){

				
				var name = "Langages informatiques [CSS]";
              // $('<div class="data" id="data_' + id + '"></div>').html(d.mail+" "+d.Nom).appendTo('#link_' + id);
              $('<div class="data" id="data_' + id + '"></div>').html(""+d.name).appendTo('#link_' + id);
              
					
			}
		})
		
	}
</script>
</head>
<body  >
<div id="Div_XML"></div>

</body>
</html>