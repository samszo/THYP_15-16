<?php

	
	//Thanks : Senador from stackoverflow
	//Source : http://bueltge.de/einfaches-php-debugging-in-browser-console/
	//Source : http://stackoverflow.com/questions/4323411/how-can-i-write-to-console-in-php
	
	function debug_to_console( $data ) {

		if ( is_array( $data ) )
			$output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
		else
			$output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";

		echo $output;
	}
	
	function debugConsole($data){
		$output = "<script>console.log( '" . $data . "' );</script>";
		echo $output;
	}
	
	function print_tab($tab){
		foreach($tab as $indice => $mot){
			echo "$mot<br>";
		}
	}

?>