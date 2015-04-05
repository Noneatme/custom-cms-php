<?php


	/* 	
		===================================================
		Name: cSystem.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung: Klasse zur globalen Verwaltung
		===================================================
	*/
	
	// Includes //
	require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cDatabase.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cSettings.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cError.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cUser.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cLogger.php");
	
	
	class cSystem
	{
		// Klassenvariablen
		private $dbClass;
		private $settingsClass;
		private $users;
		public	$logger;
		
		// Konstructor
		function __construct()
		{
			
			// Generiere Instanzen
			$this->settingsClass	= new cSettings($_SERVER['DOCUMENT_ROOT']."/Home/settings.ini");
			$this->logger			= new cLogger();
			
			// Datenbank
			$row = $this->settingsClass->getSettingRow($this->settingsClass->getCurrentMySQLSetting());
		
			// Datenbankklasse instanzieren
			$this->dbClass 			= new cDatabase($row["host"], $row["port"], $row["user"], $row["password"], $row["database"]);
		}
	
		// Destructor
		function __destruct()
		{
			// Zerstoere Instanzen
			$this->dbClass->__destruct();
			$this->settingsClass->__destruct();
			
		}

		
		// getSettingsClass
		// Gibt die Settingsklasse wieder
		public function getSettingsClass()
		{
			return $this->errorClass;
		}
		
		// getDatabaseClass
		// Gibt die Datenbankklasse wieder
		public function getDatabaseClass()
		{
			return $this->dbClass;
		}
		
		
		// LoginUser
		// Startet eine Session falls der User richtig eingeloggt wurde
		public function loginUser($name, $password)
		{
			
		}
	}
?>