function addU () {
	document.getElementById('addU').style.visibility = 'visible';
	document.getElementById('gridU').style.visibility = 'hidden';
	document.getElementById('addDoc').style.visibility = 'hidden';
	document.getElementById('gridDoc').style.visibility = 'hidden';
	document.getElementById('gridScore').style.visibility = 'hidden';
}

function gridU () {
	document.getElementById('addU').style.visibility = 'hidden';
	document.getElementById('gridU').style.visibility = 'visible';
	document.getElementById('addDoc').style.visibility = 'hidden';
	document.getElementById('gridDoc').style.visibility = 'hidden';
	document.getElementById('gridScore').style.visibility = 'hidden';
	
}

function addDoc () {
	document.getElementById('addU').style.visibility = 'hidden';
	document.getElementById('gridU').style.visibility = 'hidden';
	document.getElementById('addDoc').style.visibility = 'visible';
	document.getElementById('latlng_document').value="POINT(  )";
	document.getElementById('gridDoc').style.visibility = 'hidden';
	document.getElementById('gridScore').style.visibility = 'hidden';
}

function gridDoc () {
	document.getElementById('addU').style.visibility = 'hidden';
	document.getElementById('gridU').style.visibility = 'hidden';
	document.getElementById('addDoc').style.visibility = 'hidden';
	document.getElementById('gridDoc').style.visibility = 'visible';
	document.getElementById('gridScore').style.visibility = 'hidden';
}
function gridScore () {
	document.getElementById('addU').style.visibility = 'hidden';
	document.getElementById('gridU').style.visibility = 'hidden';
	document.getElementById('addDoc').style.visibility = 'hidden';
	document.getElementById('gridDoc').style.visibility = 'hidden';
	document.getElementById('gridScore').style.visibility = 'visible';
}


function addPersonne () {
	var nom = document.getElementById("login").value;
	localStorage.removeItem('login');
	localStorage.setItem('login', nom);
	//alert(nom);
	creaPers({"nom":nom});
}


function creaPers(data){

	data.table = "addPerso";

	$.ajax({
		  url: './php/c.php',
		  data: data,
		  success: function(html){
		  			alert("SUCCESS");
       		}
		});
}

function insertDocument()
{
	var data = {"table":"document"};
	
	var nom = document.getElementById("nom_document").value;
	var latlng =  "ST_GeomFromText('"+document.getElementById("latlng_document").value+"')";
	var url = document.getElementById("url_document").value;
	
	if(nom.length >0 && latlng.length >0 && url.length >0)
	{
		data.nom = nom;
		data.latlng = latlng;
		data.url = url;

		$.ajax({
		  url: './php/c.php',
		  data: data,
		  success: function(html){
				document.getElementById("nom_document").value = " ";
				document.getElementById("latlng_document").value = " ";
				document.getElementById("url_document").value = " ";
		
				alert("SUCCESS");
       		},
		  error: function(xhr, ajaxOptions, thrownError){
				notify("log_document","Erreur serveur impossible d'ajouté ce document");	
			}
		});
	}
	else
	{
		notify("log_document","Saisissez tous les champs s.v.p");
	}

}
