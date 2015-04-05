<?php
	/* 	
		===================================================
		Name: cError.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung: Klasse zur Ausgabe und Logs von Fehlern
		===================================================
	*/

	
	class cError
	{
		// Klassenvariablen

		// Konstructor
		function __construct($host, $port, $user, $password)
		{
			
		}
	
		// Destructor
		function __destruct()
		{
		
		}
		
		
		
		// outputError
		// Gibt einen Error wieder.
		
		public static function outputError($sError)
		{
			// Existiert er?
			if(isset($sError))
			{
				// Print Error
				printf("Error: %s", $sError);
			}
		}
		
	}
	
?>