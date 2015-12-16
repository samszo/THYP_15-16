<?php 
include_once 'connect.php';


		readpersonnes();
	
		readcolis();
function readpersonnes(){
	global $conn;
	
	$sql = "SELECT * FROM personnes";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
		echo "<h1 style='text-align:center;'>Table Personnes</h1>";
		echo "<table class='table table-hover'>
				 <thead>
      					<tr class='danger'>
					        
					        <th>Id personne</th>
					        <th>Nom de la personne</th>
							
					       <th>Prenom de la personne</th>
     					 </tr>
   				 </thead><tbody> ";
	    while($row = $result->fetch_assoc()) {
	        echo "<tr class='info'><td> " . $row["id_perso"]. "</td><td> " . $row["nom"]. "</td><td> " . $row["prenom"]. "</td></tr>";
	    }
	     echo "</tbody>
  </table>";
	} else {
    	echo "Table personne vide<br>";
	}
}
function readcolis(){
	global $conn;
	
	$sql = "SELECT * FROM colis";
	$result = $conn->query($sql);
}

?>