<?php
	/* 	
		===================================================
		Name: cError.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung: Klasse zur Ausgabe und Logs von Fehlern
		===================================================
	*/

	
	class cEditorString
	{
		// Klassenvariablen
		private string m_newString;
		
		// Konstructor
		function __construct($string)
		{
			$this->m_newString = str_replace(array("\r","\n",'\r','\n'), "", $string)
		}
	
		// Destructor
		function __destruct()
		{
		
		}
		
		// GetString
		// Sagt Alles
		public function getString()
		{
			return $this->m_newString;
		}
	}
	
?>