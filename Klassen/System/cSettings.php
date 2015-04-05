<?php
	/* 	
		===================================================
		Name: cSettings.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung: Settingsklasse der Propsteiwebsite
		===================================================
	*/
	class cSettings
	{
		// Klassenvariablen
		private $settings;
		private $ini_pfad;
		private $current_mysql_settings	= "mysql_settings_debug_1"; // Zu mysql_settings aendern
		
		// Konstructor
		function __construct($sPfad)
		{
			// Klassenvariablen setzen
			$this->ini_pfad = $sPfad;
			
			// Ini-Datei Parsen
			$this->settings = parse_ini_file($this->ini_pfad, true);
			
			date_default_timezone_set("Europe/Berlin");
		}
	
		// Destructor
		function __destruct()
		{
		
		}

		// getSetting()
		// bekommt eine gewisse Einstellung zurueck
		public function getSetting($sGruppe, $sEinstellung)
		{
			// Falls die Einstellung existiert
			if(isset($this->settings[$sGruppe]))
			{
				// Zurueckgeben
				return ($this->settings[$sGruppe][$sEinstellung] or false);
			}
			else
			{
				cError::outputError("cSettings -> getSetting -> Setting not found");
			}
		}
		// getSettingRow()
		// bekommt eine gewisse Einstellung in Variablen zurueck
		public function getSettingRow($sGruppe)
		{
			// Existiert der array?
			if(isset($this->settings[$sGruppe]))
			{
				// Zurueckgeben
				return $this->settings[$sGruppe];
			}
			else
			{
				cError::outputError("cSettings -> getSettingRow -> Settinggroup not found");
			}
		}
		// setSetting()
		// bekommt eine gewisse Einstellung zurueck
		public function setSetting($sGruppe, $sEinstellung, $sWert)
		{
			// Einstellungen uebernehmen
			$this->settings[$sGruppe][$sEinstellung] = $sWert;
			
			// INI Datei schreiben
			$this->write_php_ini($this->settings, ini_pfad);
		}
		
		// write_php_ini
		// Schreibt eine .ini datei (neu)
		// Quelle: http://stackoverflow.com/questions/5695145/how-to-read-and-write-to-an-ini-file-with-php Abgerufen 24. Maerz 2014
		private function write_php_ini($array, $file)
		{
			$res = array();
			foreach($array as $key => $val)
			{
				if(is_array($val))
				{
					$res[] = "[$key]";
					foreach($val as $skey => $sval) $res[] = "$skey = ".(is_numeric($sval) ? $sval : '"'.$sval.'"');
				}
				else $res[] = "$key = ".(is_numeric($val) ? $val : '"'.$val.'"');
			}
			safefilerewrite($file, implode("\r\n", $res));
		}
		
		// getCurrentMySQLSetting()
		// Gibt die zurzeitigen MySQL Einstellungen zurueck
		
		public function getCurrentMySQLSetting()
		{
			return $this->current_mysql_settings;
		}
	}
?>