<?php

require("reader.php"); 
$file="test.xls";
$connection=new Spreadsheet_Excel_Reader(); 
$connection->read($file);
$startrow=2;
$endrow=5;
$col1=5; ?>
<h1>Trombinoscope Etudiant</h1>
		<table border="1" style="width:30%">
					   <tr>
   <th>Nom d'etudiant</th>
   <th>Sa photo</th>
 </tr>
<?php

for($i=$startrow;$i<=$endrow;$i++){ 
?>

					  <tr>
						    <td style="font-size: 70px;"><?php echo $connection->sheets[0]["cells"][$i][$col1];  ?></td>
						    <td><img src=<?php  echo $connection->sheets[0]["cells"][$i][$col1].".jpg";  ?>  style="width: 181px;"/> <?php  echo $connection->sheets[0]["cells"][$i][$col1].".jpg";  ?></td>
						   
					  </tr>
					 
    
<?php
}

?> </table>