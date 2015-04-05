<?php
	// PHP Debug & System
	require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cSystem.php");
	
	// Debug Modus
	$GLOBALS["debug"] = true;
	
	// Ist er an?
	if($GLOBALS["debug"] == true)
	{
		// Errors melden
		error_reporting(E_ALL);
		ini_set('error_reporting', E_ALL);
		ini_set('display_errors', 1);
	}
	else
	{
		// Andererseits keine Errors melden
		error_reporting(0);
		ini_set('error_reporting', 0);
		ini_set('display_errors', 0);
	}
	
	// System
	if(!isset($GLOBALS["system"]))
	{	
		// Neues System
		$GLOBALS["system"] = new cSystem();
	}
?>