function personne() {
	document.getElementById('personneli').className="active";
	document.getElementById('documentli').className="hover";

	document.getElementById('listDoc').className="hover";
	document.getElementById('scoreli').className="hover";
	document.getElementById('personne').style.visibility ='visible';
	document.getElementById('document').style.visibility ='hidden';
	document.getElementById('score').style.visibility ='hidden';
	document.getElementById('listdoc').style.visibility ='hidden';
	
}

function documentT() {
	document.getElementById('personneli').className="hover";
	document.getElementById('documentli').className="active";
	document.getElementById('scoreli').className="hover";

	document.getElementById('listDoc').className="hover";
	document.getElementById('personne').style.visibility ='hidden';
	document.getElementById('document').style.visibility ='visible';
	document.getElementById('score').style.visibility ='hidden';
	document.getElementById('listdoc').style.visibility ='hidden';
	
}

function listDoc() {
	document.getElementById('personneli').className="hover";
	document.getElementById('listDoc').className="active";
	document.getElementById('documentli').className="hover";
	document.getElementById('scoreli').className="hover";
	document.getElementById('listdoc').style.visibility ='visible';
	document.getElementById('personne').style.visibility ='hidden';
	document.getElementById('document').style.visibility ='hidden';
	document.getElementById('score').style.visibility ='hidden';
	
}

function score() {
	document.getElementById('personneli').className="hover";
	document.getElementById('documentli').className="hover";
	document.getElementById('scoreli').className="active";
	document.getElementById('personne').style.visibility ='hidden';
	document.getElementById('document').style.visibility ='hidden';
	document.getElementById('score').style.visibility ='visible';
	document.getElementById('listdoc').style.visibility ='hidden';

}

function addPersonne(){

	var personneName = document.getElementById("presonneValue").value;
	localStorage.removeItem('personneName');
	localStorage.setItem('personneName', personneName);
	//alert(personneName);
	creaPers({"nom":personneName});
}

function creaPers(data){

	data.table = "personne";

	$.get('./db/c.php',
			data,
        		function(html){
				alert('SUCCESS');
				documentT();
     		});	

}

function addDoc(){
	var nom = document.getElementById("dnom").value;
	var lat = document.getElementById("dlat").value;
	var lng = document.getElementById("dlng").value;
	var url = document.getElementById("durl").value;
	creaDoc({"nom":nom,"lat":lat,"lng":lng,"url":url});
}

function creaDoc(data){
	data.table = "document";
	$.get('./db/c.php',
			data,
        		function(html){
				alert('SUCCESS');
				score();
     		});	
}

function updateDoc(){
	data.table = "document";
	$.get('./db/u.php',
			data,
        		function(html){
				//alert('SUCCESS');
				document.location.href="./c.html"
     		});	
}