<?php
	/* 	
		===================================================
		Name: cLogger.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung: Klasse zur Ausgabe von Logs von Fehlern
		===================================================
	*/

	
	class cLogger
	{
		// Klassenvariablen
		private $logFile;
		public  $logFolder;
		private $absoluteFile;
		private $enabled			= true; // Protokollierung aktivieren? 
		
		// Konstructor
		function __construct()
		{
			$this->logFile 		= date("d-m-Y").".log";
			$this->logFolder	= $_SERVER['DOCUMENT_ROOT']."/Home/Files/intern/logs/";
			$this->absoluteFile = $this->logFolder.$this->logFile;
			
			$newCreate			= false;
			if(!file_exists($this->absoluteFile))
			{
				$newCreate		= true;
			}
			
			$this->logFileFile	= fopen($this->absoluteFile, "a+");
			
			if($newCreate == true)
			{
				$this->outputLog("- LOGGING GESTARTET -");
			}
			
			if($this->enabled == false)
			{
				$this->outputLog("Protokollierung wurde deaktiviert.");
			}
		}
	
		// Destructor
		function __destruct()
		{
			fclose($this->logFileFile);
		}

		// outputLog
		// Schreibt ein Log in die Logfile.
		public function outputLog($log)
		{
			if($this->enabled)
			{
				$sString = "[".date("d.m.Y")." ".date("H:i:s")."] ".$log."\n";
				fwrite($this->logFileFile, $sString);
				fflush($this->logFileFile);
			}
		}
		
		// isEnabled
		// Ist Protokollierung aktiviert?
		public function isEnabled()
		{
			return $this->enabled;
		}
		
	}
	
?>