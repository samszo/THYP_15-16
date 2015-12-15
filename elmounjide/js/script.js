var member;
function addPersonne(){

	var nom = document.getElementById("login").value;
	localStorage.removeItem('login');
	localStorage.setItem('login', nom);
	//alert(nom);
	creaPers({"nom":nom});
}

function creaPers(data){

	data.table = "personne";

	$.ajax({
		  url: './php/c.php',
		  data: data,
		  success: function(html){
		  			if(html.substring(1,2)!='0')
						onConnected(html);
					else
						document.getElementById("error").style.visibility = "visible";
       		}
		});

}

/* connexion réussi
**/
function onConnected(json)
{
	var extract = json.substring(json.indexOf("{"));
	member = JSON.parse(extract);
	if("elmounjide"==member["nom"])
		document.location.href="admin.php";
	else{
		document.location.href="uts.php";
	}
}