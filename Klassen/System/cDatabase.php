<?php
	/* 	
		===================================================
		Name: cDatabase.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung: Datenbankklasse
		===================================================
	*/

	
	class cDatabase
	{
		// Klassenvariablen
		private $sHost			= "";
		private	$sPort  		= "";
		private $sUser			= "";
		private $sPassword		= "";
		private $sDatabase		= "";
		private	$connection;
		private $variablesSet 	= false;
		private $lastResult;
		
		
		// Konstructor
		function __construct($host, $port, $user, $password, $database)
		{
			// Daten gegeben?
			if(isset($host) && isset($port) && isset($user) && isset($password))
			{
				// Klassenvariablen setzen
				$this->sHost 		= $host;
				$this->sPort 		= $port;
				$this->sUser 		= $user;
				$this->sPassword 	= $password;
				$this->sDatabase	= $database;
				
				$variablesSet		= true;
				// Connecten:
				$this->connect();
			}
			else
			{
				// Error ausgeben
				//Error->outputError("cDatabase -> Constructor -> Database not ready");
				cError::outputError("cDatabase -> Constructor -> Database not ready");
			}
		}
	
		// Destructor
		function __destruct()
		{
		
		}

		// areSettingsCorrect
		// Checkt ob die Datenbankwerte bereit sind
		private function areSettingsCorrect()
		{
			// Sind sie nicht da da?
			if((!isset($sHost) || $sHost = ""))
			{
				// Nein
				return false;
			}
			else
			{
				// Ja
				return true;
			}
		}
		// getConnection
		// Gibt die Verbindung zurueck
		public function getConnection()
		{
			// Falls die Verbindung steht
			if(isset($this->connection))
			{
				// Zurueckgeben
				return $this->connection;
			}
			else
			{
				// False zurueckgeben
				return false;
			}
		}
		
		// connect
		// Stellt die Datenbankverbindung her, falls keine schon existiert.
		private function connect()
		{
			// Existiert die Connection?
			if(!isset($this->connection))
			{
				// Versuche zu connecten
				$this->connection 	= mysqli_connect($this->sHost.":".$this->sPort, $this->sUser, $this->sPassword);
				
				// Falls die Vebindung nicht steht
				if(!isset($this->connection))
				{
					cError::outputError("cDatabase -> connect -> Datenbankverbindung konnte nicht aufgebaut werden");
				}
				else
				{
					// Datenbank auswaehlen
					mysqli_select_db($this->connection, $this->sDatabase);
				}
			}
		}
		
		// query
		// Sendet einen Befehl mit Rueckgabe
		public function query($sQuery)
		{
			// Versuche Befehl auszufuehren
			$this->lastResult = mysqli_query($this->connection, $sQuery);
			echo(mysqli_error($this->connection));
			
			// Falls der Befehl OK War
			if(isset($this->lastResult))
			{
				// Zurueckgeben
				return $this->lastResult;
			}
			else
			{
			
				return false;
			}
		}
		
		public function fetchRow($result)
		{
			return mysqli_fetch_row($result);
		}
		
		public function escapeString($var)
		{
			return mysqli_real_escape_string($this->connection, $var);
		}
	}
?>