<?php
	// Deklarieren
	$gemeinde_id	= null;
					
	// GET-Methode?
	if(isset($_GET["Gemeinde"]))
	{
		// Das ist die ID!
		$gemeinde_id	= (int) $_GET["Gemeinde"];
	}
	else
	{
		// Die ID ist in der Session
		$gemeinde_id = $_SESSION["GemeindeID"];
	}
	// Falls die aber nicht gestaret ist
	if(!isset($_SESSION))
	{
		// Starten
		session_start();
	}
	
	// Falls sie da ist
	if(isset($gemeinde_id))
	{
		// Escapen
		$gemeinde_id 				= $GLOBALS["system"]->getDatabaseClass()->escapeString($gemeinde_id);
							
		// Wird bei allen Seiten benutzt;
		$_SESSION["GemeindeID"] 	= $gemeinde_id;
	}
?>