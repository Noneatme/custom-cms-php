<?php


	/* 	
		===================================================
		Name: cUser.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung:  Benutzerklasse
		===================================================
	*/
	
	// Includes //
	
	require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cPasswordSalt.php");
				

	class cUser
	{
		/*
			Themes:
			
			-> Normaler Themer 	-> ueber die Seite
			-> Gemeinde Themer 	-> ueber die Gemeinde
			-> Admin Themer		-> Administration
		
		*/
	
		/* Globale Rechte:
			
			1 - Benutzer Hinzufuegen
			2 - Benutzer Loeschen
			3 - Benutzer bearbeiten
			4 - Benutzer Gemeinderechte geben
			5 - Benutzer Gemeinderechte entziehen
			
			4 - Gemeinde hinzufuegen
			5 - Gemeinde loeschen
			6 - Gemeinde bearbeiten
			
			
			1337 - Alle rechte
		*/
		
		/* Gemeinde Rechte:
			Recht fuer jede Gemeinde.
			D.h.
			
			-> Gemeindeuebersicht bearbeiten
			(Link)
			-> Dateien und Bilder bearbeiten
			-> Neuigkeiten / Aktuelles hinzufuegen und Entfernen
			-> Und so weiter
			
			
			-> ID 1337 sind alle Gemeinden
		*/
	
		// Accountdaten
		public $id, $name, $password, $passwordSalt, $rechteGemeinde, $rechteGlobal, $loggedIn, $rechteFuerGemeinden, $skipLogin;
		
		// Personendaten 
		public $vorname, $nachname, $email, $telefon, $anrede, $plz, $adresse, $fax, $lastseen;
		
		// MySQL Update Values
		private $updateValues 	= array
		(
			"name" 					=> true,
			"password" 				=> true, 
			"passwordSalt" 			=> true, 
			"rechteGemeinde" 		=> true, 
			"rechteGlobal"			=> true,
			"rechteFuerGemeinden"	=>true,
			
			"vorname"				=> true,
			"nachname"				=> true,
			"anrede"				=> true,
			"email"					=> true,
			"telefon"				=> true,
			"plz"					=> true,
			"adresse"				=> true,
			"fax"					=> true,
			"lastseen"				=> true
		
		);
		
		// Vales <-> MySQL Attribut
		private $mysqlValues	= array			// Updatevalues
		(
			"id"					=> "BenutzerID",
			"name" 					=> "Benutzername",
			"password"				=> "Passwort",
			"passwordSalt"			=> "PasswortSalt",
			"rechteGemeinde" 		=> "RechteGemeinde",
			"rechteGlobal"			=> "RechteGlobal",
			"rechteFuerGemeinden"	=> "RechteFuerGemeinden",
			
			"vorname"				=> "Vorname",
			"nachname"				=> "Nachname",
			"anrede"				=> "Anrede",
			"email"					=> "EMail",
			"telefon"				=> "Telefon",
			"plz"					=> "PLZ",
			"adresse"				=> "Adresse",
			"fax"					=> "Fax",
			"lastseen"				=> "LastSeen"
			
		);
		
		// Werte die als JSON String gespeichert werden
		private $jsonValues		= array
		(
			"rechteGemeinde"		=> true,
			"rechteGlobal"			=> true,
			"rechteFuerGemeinden"	=> true
		);
		
		// Public, da wir die auch in anderen Klassen gebrauchen koennen
		public $globaleRechteValues = array
		(
			1 => "Benutzer hinzufuegen",
			2 => "Benutzer loeschen",
			3 => "Benutzer bearbeiten",
			4 => "Benutzerrechte bearbeiten",

			6 => "Gemeinde hinzufuegen",
			7 => "Gemeinde loeschen",
			8 => "Gemeinde bearbeiten",
			
			
			9 => "Hauptseite bearbeiten",
			10 => "&Uuml;bersichtsseite bearbeiten",
			11 => "&Uuml;ber-uns Seite bearbeiten",
			
			12 => "Impressum bearbeiten",
			
			13 => "Links bearbeiten",

			
			14 => "Gemeindebereiche bearbeiten",
			
			15 => "Protokolle betrachten",
			16 => "Protokolle hochladen",
			17 => "Protokolle loeschen",
			
			1337 =>	"Alle Rechte"
		);
		
		// Gemeinderechte
		public $gemeindeRechteValues = array
		(
			1 => "Beitrag schreiben",
			2 => "Beitrag entfernen",
			3 => "Galerie bearbeiten",
			4 => "Gemeindebrief hochladen",
			
			5 => "Informationen bearbeiten",
			6 => "Informationsleiste bearbeiten",
			7 => "Kirchenvorstandsseite bearbeiten",
			
			6 => "Bild hochladen",
			7 => "Bilder l&ouml;schen",
			1337 => "Alle Rechte"
		);
		
		
		// Table zur identifikation welche Updatetable benutzt werden soll
		private $mysqlUpdateTables		= array
		(
			"BenutzerID" 			=> "tblbenutzer",
			"Benutzername" 			=> "tblbenutzer",
			"Passwort" 				=> "tblbenutzer",
			"PasswortSalt" 			=> "tblbenutzer",
			"RechteGemeinde" 		=> "tblbenutzer",
			"RechteGlobal" 			=> "tblbenutzer",
			"RechteFuerGemeinden" 	=> "tblbenutzer"
		);
		
		private $passwordSaltAmmount = 6;				// Anzahl der zeichen des Salzes
		
		
		// Konstructor
		function __construct($name, $password)
		{
			// Klassenvariablen

			$this->name				= $name;
			$this->password 		= $password;		// Noch unverschluesselt

			
			//	$this->login();
		}
		
		// login
		// Loggt einen User ein (Checkt das Passwort)
		public function login()
		{
			// Escapen
			$this->name 		= $GLOBALS["system"]->getDatabaseClass()->escapeString($this->name);
			$this->password		= $GLOBALS["system"]->getDatabaseClass()->escapeString($this->password);
			
			
			// Existiert der account?
			$result_name = $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblbenutzer WHERE Benutzername = '$this->name';");

			if(isset($result_name))
			{
				// Row fetchen
				$row 			= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result_name);
				$this->salt 	= $row[3];
				
				// Versuche
				try
				{
					// Falls man die Daten hat
					if(isset($this->name) && isset($this->password))
					{
						// Gehashtes passwort generieren
						$hashedPassword = hash("sha256", $this->password.$this->salt);
						
						// Stimmen die Passwoerter ueberein?
						if(($hashedPassword == $row[2]) || ($this->skipLogin == true))	// Sucess
						{
							// Lade Daten
							$this->loadDatas(1, $row);
							
							// ID Setzen
							$id				= $this->id;
							
							// Personendaten erhalten
							$result_datas 	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblpersonendaten WHERE PersID = '$id';");
							$row2			= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result_datas);
							
							// Lade Personendaten
							$this->loadDatas(2, $row2);
							
							
							// Sucess
							return $this->id;
						}
						else
						{
							// Andererseits
							return false;
						}
					}
				}
				catch(Exception $ex)
				{
					// Falls ein Fehler kommt
					return false;
				}
			}
			return false;
		}
		
		// register
		// Registriert einen User, falls er noch nicht existiert
		public function register()
		{
			if(!isset($this->id)) // Wenn die ID noch nicht da ist
			{
				/* Variablen die hierfuer gegeben sein muessen:
					
					$this->name;
					$this->password;
				*/
				
				// Passwortsalzklasse instanzieren
				$passwordSaltClass 	= new cPasswordSalt($this->passwordSaltAmmount);
				
				// Salz erhalten
				$passwordSalt 		= $passwordSaltClass->getSalt();
				
				// Passwort generieren
				$password			= hash("sha256", $this->password.$passwordSalt);
				
				// Name setzen
				$name				= $this->name;
				
				// Und neuen Datensatz generieren
				$result = $GLOBALS["system"]->getDatabaseClass()->query("INSERT INTO tblbenutzer(Benutzername, Passwort, PasswortSalt) VALUES ('$name', '$password', '$passwordSalt');");
				
				if($result)
				{
					// Eingefuegte ID Bekommen
					$last_insert_id_result	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT LAST_INSERT_ID() FROM tblbenutzer;");
					$last_insert_id_row		= $GLOBALS["system"]->getDatabaseClass()->fetchRow($last_insert_id_result);
					
					$last_insert_id			= (int) $last_insert_id_row[0];
					
					// Daten setzen
					$anrede				= $this->anrede;
					$vorname			= $this->vorname;
					$nachname			= $this->nachname;
					
					$telefon			= $this->telefon;
					$plz				= $this->plz;
					$adresse			= $this->adresse;
					$fax				= $this->fax;
					$lastseen			= "-";
					
					$email				= $this->email;
					
					// Personendaten in Datenbank einfuegen
					$result = $GLOBALS["system"]->getDatabaseClass()->query("INSERT INTO tblpersonendaten(PersID, EMail, Telefon, Anrede, Vorname, Nachname, PLZ, Adresse, Fax) VALUES ('$last_insert_id', '$email', '$telefon', '$anrede', '$vorname', '$nachname', '$plz', '$adresse', '$fax');");
					return $result;
				}
				return false;
			}
			return false;
		}
		
		// LoadDatas
		// Laedt die Daten des Rows
		private function loadDatas($int, $row)
		{
			// Accountdaten?
			if($int == 1)
			{
				// Daten setzen
				$this->id 					= $row[0];
				$this->name					= $row[1];
				$this->password 			= $row[2];
				$this->passwordSalt 		= $row[3];
				$this->rechteGemeinde		= (array) json_decode($row[4]); // JSON String decodieren, sodass er ein Array ist
				$this->rechteGlobal			= (array) json_decode($row[5]);
				$this->rechteFuerGemeinden	= (array) json_decode($row[6]);
				
				// Daten in die Klasse schreiben (Nummer sicher)
				$this->setData("id", $this->id, false);
				$this->setData("name", $this->name, false);
				$this->setData("password", $this->password, false);
				$this->setData("passwordSalt", $this->passwordSalt, false);
				$this->setData("rechteGemeinde", $this->rechteGemeinde, false);
				$this->setData("rechteGlobal", $this->rechteGlobal, false);
				$this->setData("rechteFuerGemeinden", $this->rechteFuerGemeinden, false);
			}
			// Personendaten?
			elseif($int == 2)
			{
				// Dasselbe
				$this->email				= $row[1];
				$this->telefon				= $row[2];
				$this->anrede				= $row[3];
				$this->vorname				= $row[4];
				$this->nachname				= $row[5];
				$this->plz					= $row[6];
				$this->adresse				= $row[7];
				$this->fax					= $row[8];
				$this->lastseen				= $row[9];
				
				// Nochmal setzen
				$this->setData("email", $this->email, false);
				$this->setData("telefon", $this->telefon, false);
				$this->setData("anrede", $this->anrede, false);
				$this->setData("vorname", $this->vorname, false);
				$this->setData("nachname", $this->nachname, false);
				$this->setData("plz", $this->plz, false);
				$this->setData("adresse", $this->adresse, false);
				$this->setData("fax", $this->fax, false);
				$this->setData("lastseen", $this->lastseen, false);
				
				$_SESSION["lastseentime"] = $this->lastseen;
				
				
				$this->setData("lastseen", date("d.m.Y")." um ".date("H:i:s"), true);
			}
		}
		
		
		// getIP
		// WICHTIG: RETURNT NICHT DIE IP ADRESSE VOM BENUTZER SONDERN NUR VOM CALLER -> CLIENT!! NICHT DIE IP VOM BENUTZER
		public function getIP()
		{
			return $_SERVER['REMOTE_ADDR'];
		}
		
		//updateMySQLData
		// Aktualisiert einen Wert in der Datenbank
		// Sollte nur innerhalb dieser Klasse aufgerufen werden.
		private function updateMySQLData($sData)
		{
			try
			{	
				// Variablen bekommen
				$value 		= $this->getData($sData);
				$id			= $this->getData("id");
				$mysqlData 	= $this->mysqlValues[$sData];
				
				// Existieren sie?
				if((isset($value)) && (isset($mysqlData)))
				{
					// Falls es ein JSON-String ist
					if(isset($this->jsonValues[$sData]))	// JSON Formatierter String?
					{
						// Escapen und encoden
						$value = $GLOBALS["system"]->getDatabaseClass()->escapeString(json_encode($value));
					}
					// Standarttabelle
					$tabelle 	= "tblbenutzer";
					$where		= "BenutzerID";

					// Falls eine andere Tabelle angesprochen wird
					if(!isset($this->mysqlUpdateTables[$mysqlData]))
					{
						// Die setzen
						$tabelle 	= "tblpersonendaten";
						$where		= "PersID";
					}
					// Daten in der Datenbank aktualisieren
					$query = "UPDATE $tabelle SET $mysqlData = '$value' WHERE $where = $id;";
					$result = $GLOBALS["system"]->getDatabaseClass()->query($query);
					
					if(!isset($result))
					{
						print("Failed Update: $sData");
					}
				}
			}
			catch(Exception $ex)
			{
				return false;
			}
		}
		
		// logOut
		// Loggt einen User aus
		public function logOut()
		{
			// Session zerstoeren
			session_destroy();
			session_unset();
			// Variablen entfernen
			unset($_SESSION); 

			// Destructor aufrufen
			$this->__destruct();

			return true;
		}

		// hasUserAdminPermissions
		// Checkt ob ein User Admin Permissions hat
		public function hasUserAdminPermissions()
		{
			// Falls gemeinderechte oder Globale Rechte vorhande sind
			if(count($this->rechteGemeinde) > 0 || count($this->rechteGlobal) > 0)
			{
				// Ja, hat Permissions
				return true;
			}
			// Andererseits nein
			return false;
		}
		
		// getGemeindeRechte
		// Gibt die Rechte der Gemeinde zurueck
		public function getGemeindeRechte()
		{
			return $this->getData("rechteGemeinde");
		}
		
		// hasGemeindeRecht
		// Frag, ob der Benutzer gemeinderechte hat
		public function hasGemeindeRechte($int)
		{
			// in Integer konvertieren, Sicher ist sicher
			$int = (int) $int;
			// Existiert die Variable in den GemeindeTable oder ist die variable 1337 in dem Table vorhanden?
			if(isset($this->rechteGemeinde[$int]) && ($this->rechteGemeinde[$int] == true) || (array_key_exists(1337, (array)$this->getData("rechteGemeinde"))))
			{
				// Ja, hat rechte
				return true;
			}
			// Andererseits nein
			return false;
		}
		
		// addGemeindeRecht
		// Gibt einem User gewisse Gemeinderechte
		public function addGemeindeRecht($int)
		{
			// Gemeinderecht in Int konvertieren
			$int = (int) $int;
			// In Table / Array packen
			$this->rechteGemeinde[$int] = true;
			// Und in der MySQL Tabelle aktualisieren
			$this->setData("rechteGemeinde", $this->rechteGemeinde, true);
			return true;
		}
		
		
		// removeGemeindeRecht
		// Gibt einem User gewisse Gemeinderechte
		public function removeGemeindeRecht($int)
		{
			$int = (int) $int;
			// Existiert das recht?
			if(isset($this->rechteGemeinde[$int]) && ($this->rechteGemeinde[$int] == true))
			{
				// Recht entfernen
				unset($this->rechteGemeinde[$int]);
				// Speichern
				$this->setData("rechteGemeinde", $this->rechteGemeinde, true);
			}
		}
		
		// getGemeindeRechteString
		// Gibt die Gemeinde Rechte als Stringsatz zurueck
		public function getGemeindeRechteString()
		{
			// String intialisieren und deklarieren
			$string = "";
			// Gemeinderechte bekommen
			$array = (array) $this->getData("rechteGemeinde");
			
			// Fuer jedes Recht im Array
			foreach(array_keys($array) as $key)
			{
				// String zusammenfassen
				$string = $string."- ".$this->gemeindeRechteValues[(int) $key]."<br>";
			}
			// String zurueckgeben
			return $string;
		}
		
		// getBetreuteGemeindenRechteString
		// Gibt die Gemeinde Rechte als Stringsatz zurueck, von jeder Gemeinde auf die man Zugriff hat
		public function getBetreuteGemeindenRechteString()
		{
			// String initialisieren und deklarieren
			$string = "";
			// Gemeinderechte fuer die Gemeinde bekommen
			$array = (array) $this->getData("rechteFuerGemeinden");
			
			// Fuer jedes Gemeinderecht
			foreach(array_keys($array) as $key)
			{
				$key 	= (int) $key;
				
				// Wenn der Key 
				if($key != 1337)
				{
					// Bekommt die Daten aus der Tabelle
					$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT Name FROM tblgemeinde WHERE GemID = '$key';");
					// Bekommt den Row
					$row	= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
					// Fuegt den String zusammen
					$string = $string."- ".$row[0];
				}
				else
				{
					// Andererseits
					$string = "Fuer jede Gemeinde";
					return $string;
				}
			}
			// String zurueckgeben
			return $string;
		}
		
		// addBetreuteGemeindeRecht
		// Gibt das Recht fuer eine bestimmte betreute Gemeinde
		public function addBetreuteGemeindenRecht($int)
		{
			// Integer erhalten
			$int = (int) $int;
			
			// Gemeinderecht hinzufuegen
			$this->rechteFuerGemeinden[$int] = true;
			
			// Daten aktualisieren
			$this->setData("rechteFuerGemeinden", $this->rechteFuerGemeinden, true);
			
			echo("Data: $int");
			return true;
		}
		
		// removeBetreuteGemeindeRecht
		// Entfernt das Recht fuer eine bestimmte betreute Gemeinde
		public function removeBetreuteGemeindenRecht($int)
		{
			// Integer erhalten
			$int = (int) $int;
			
			// Existiert das Recht?
			if(isset($this->rechteFuerGemeinden[$int]) && ($this->rechteFuerGemeinden[$int] == true))
			{
				// Entfernen!
				unset($this->rechteFuerGemeinden[$int]);
				// Speichern
				$this->setData("rechteFuerGemeinden", $this->rechteFuerGemeinden, true);
			}
		}
		
		// hasBetreuteGemeindenRecht
		// Fragt ab, ob der Benutzer Rechte fuer die Gemeinde hat
		public function hasBetreuteGemeindenRecht($int)
		{
			// Integer erhalten
			$int = (int) $int;
			
			// Existiert das Recht?
			if(isset($this->rechteFuerGemeinden[$int]) && ($this->rechteFuerGemeinden[$int] == true) || (array_key_exists(1337, (array)$this->getData("rechteFuerGemeinden"))))
			{
				return true;
			}
			return false;
		}
		
		// getBetreuteGemeinden
		// Gibt die betreuten Gemeinden zurueck
		public function getBetreuteGemeinden()
		{
			return $this->getData("rechteFuerGemeinden");
		}
		
		// getGlobaleRechte
		// Gibt die Globalen Rechte zurueck
		public function getGlobaleRechte()
		{
			return $this->getData("rechteGlobal");
		}
		
		// getGlobaleRechteString
		// Gibt die Globalen Rechte als Stringsatz zurueck
		public function getGlobaleRechteString()
		{
			// String deklarieren
			$string = "";
			
			// Array der Rechte erhalten
			$array = (array) $this->getData("rechteGlobal");
			
			// Fuer jeden index
			foreach(array_keys($array) as $key)
			{
				// String zusammenfuegen
				$string = $string."- ".$this->globaleRechteValues[(int) $key]."<br>";
			}
			// String zurueckgeben
			return $string;
		}
		
		// hasGlobaleRechte
		// Checkt ob Globale Rechte vorhanden sind
		public function hasGlobaleRechte($int)
		{
			// Integer erhalten
			$int = (int) $int;
			
			// Falls das Recht existiert
			if(isset($this->rechteGlobal[$int]) && ($this->rechteGlobal[$int] == true) || (array_key_exists(1337, (array)$this->getData("rechteGlobal"))))
			{
				// Jawoll hat rechte
				return true;
			}
			// Andererseits nein
			return false;
		}
		
		// addGlobalRecht
		// Gibt einem User gewisse Globalrechte
		public function addGlobalRecht($int)
		{
			// Integer erhalten
			$int = (int) $int;
		
			// Globale Rechte setzen
			$this->rechteGlobal[$int] = true;
			
			// Daten aktualisieren
			$this->setData("rechteGlobal", $this->rechteGlobal, true);
			return true;
		}
		
		// removeGlobalRecht
		// Removed einem User geiwsse Globalrechte
		public function removeGlobalRecht($int)
		{
			// Integer erhalten
			$int = (int) $int;
			
			// Existiert das recht?
			if(isset($this->rechteGlobal[$int]) && ($this->rechteGlobal[$int] == true))
			{
				// Recht entfernen
				unset($this->rechteGlobal[$int]);
				
				// Daten aktualisieren
				$this->setData("rechteGlobal", $this->rechteGlobal, true);
			}
		}
		
		// checkIfUserHasGlobalRight
		// Ueberprueft, ob der Benutzer globale rechte hat.
		// Ansonsten wird er auf die Keine-Rechte Seite weitergeleitet.
		
		public function checkIfUserHasGlobalRight($int)
		{
			// Integer erhalten
			$int = (int) $int;
			// Hat er Globale Rechte?
			if($this->hasGlobaleRechte($int))
			{
				// Ja, hat er
				return true;
			}
			// Andererseits zur keineRechte Page weiterleiten
			header("Location: /Home/Seiten/KeineRechte.php");
		}
		// checkIfUserHasGemeindeRight
		// Ueberprueft, ob der Benutzer gemeinderechte hat.
		// Ansonsten wird er auf die Keine-Rechte Seite weitergeleitet.
		
		public function checkIfUserHasGemeindeRight($int)
		{	
			// Integer erhalten
			$int = (int) $int;
			
			// Hat er Gemeinderechte?
			if($this->hasGemeindeRechte($int))
			{
				return true;
			}
			
			// Zur Keinerechtseite weiterleite
			header("Location: /Home/Seiten/KeineRechte.php");
		}
		// checkIfUserHasBetreuteGemeindenRight
		// Ueberprueft, ob der Benutzer Rechte fuer die Gemeinde hat
		// Ansonsten wird er auf die Keine-Rechte Seite weitergeleitet.
		
		public function checkIfUserHasBetreuteGemeindenRight($int)
		{
			// Integer erhalten
			$int = (int) $int;
			
			// Hat er Rechte?
			if($this->hasBetreuteGemeindenRecht($int))
			{
				return true;
			}
			
			// Keine Rehcte
			header("Location: /Home/Seiten/KeineRechte.php");
		}
		
		// setAdministrator
		// Debug-Only!
		public function setAdministrator()
		{
			// Setzt den Administrator
			$this->addGemeindeRecht(1337);
			$this->addGlobalRecht(1337);
			$this->addBetreuteGemeindenRecht(1337);

		}
		// isAdministrator
		// Sehr hohe Rechte, nur der System Administrator darf diese Rechte besitzen
		public function isAdministrator()
		{
			// Setzt den Administrator
			if($this->hasGemeindeRechte(1337) && $this->hasGlobaleRechte(1337) && $this->hasBetreuteGemeindenRecht(1337))
			{
				return true;
			}
			return false;
		}
		// checkIfUserIsAdministrator
		// Sehr hohe Rechte, nur der System Administrator darf diese Rechte besitzen
		public function checkIfUserIsAdministrator()
		{
			// Admin?
			if($this->isAdministrator())
			{
				return true;
			}
			header("Location: /Home/Seiten/KeineRechte.php");
		}
		// setData
		// Setzt eine Klassenvariable. Wird so gemacht, damit die MySQL Datenbank mit dem Paralellen Sychronisieren noch hinterher kommt. (Fuer grosse massen)
		public function setData($sData, $sWert, $bMySQL)
		{
			// Versuche
			try
			{
				// Setzt die Klassenvariable auf den Wert
				$this->$sData = $sWert;
				
				// Falls das ein MySQL Wert ist
				if(isset($this->updateValues[$sData]) && $bMySQL)
				{
					// Daten in MySQL Tabelle aktualisieren
					$this->updateMySQLData($sData);
				}
				
				// Jawoll
				return true;
			}
			// Falls ein Fehler kommt
			catch(Exception $ex)
			{
				// False returnen
				return false;
			}
		}
		
		// getData
		// Bekommt eine Klassenvariable. 
		public function getData($sData)
		{
			// Versuche
			try
			{
				// Variable zurueckgeben
				return $this->$sData;
			}
			catch(Exception $ex)
			{
				// Existiert nicht
				return false;
			}
		}
		
		// getFullName
		// Bekommt den vollen Namen
		public function getFullName()
		{
			return ($this->anrede." ".$this->vorname." ".$this->nachname." [IP: ".$this->getIP()."]");
		}
		
		// Destructor
		function __destruct()
		{
				
		}
	}
	
	// Ende der Klasse: cUser.php
?>