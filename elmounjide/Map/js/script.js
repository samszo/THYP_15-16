function personne() {
	document.getElementById('personneli').className="active";
	document.getElementById('documentli').className="hover";
	document.getElementById('scoreli').className="hover";
	document.getElementById('personne').style.visibility ='visible';
	document.getElementById('document').style.visibility ='hidden';
	document.getElementById('score').style.visibility ='hidden';
	
}

function documentT() {
	document.getElementById('personneli').className="hover";
	document.getElementById('documentli').className="active";
	document.getElementById('scoreli').className="hover";
	document.getElementById('personne').style.visibility ='hidden';
	document.getElementById('document').style.visibility ='visible';
	document.getElementById('score').style.visibility ='hidden';
	
}

function score() {
	document.getElementById('personneli').className="hover";
	document.getElementById('documentli').className="hover";
	document.getElementById('scoreli').className="active";
	document.getElementById('personne').style.visibility ='hidden';
	document.getElementById('document').style.visibility ='hidden';
	document.getElementById('score').style.visibility ='visible';

}

function addPersonne(){

	var personneName = document.getElementById("presonneValue").value;
	localStorage.setItem('personneName', personneName);
	//alert(personneName);
	creaPers({"nom":personneName});
}

function creaPers(data){

	data.table = "personne";

	$.get('../db/c.php',
			data,
        		function(html){
				alert('SUCCESS');
     		});	

}