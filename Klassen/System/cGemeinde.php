<?php


	/* 	
		===================================================
		Name: cUser.php
		Authoren: Jonas Barascu & Elisabeth Krenn
		Version: 1.0.x
		Beschreibung:  Gemeindeklasse
		===================================================
	*/
	
	// Includes //
	
	
	
	// Variablen //
	// Klassen, aus Datenbank //
	
	class cGemeinde
	{
		// Klassenvariablen
		public $GemID, $Name, $Adresse, $Telefon, $Fax, $Informationen, $Kirchenvorstand, $UeberPLZ;
		
		public $Neuigkeiten;
		
		
		// Konstructor
		function __construct($id, $b)
		{
			// Gemeinden ID
			$this->GemID = $id;
			
			// Daten laden
			$this->loadDatas();
		}
		
		// Destructor
		function __destruct()
		{
			
		}
		
		
		// loadDatas
		// Laedt die Daten aus der Datenbank
		private function loadDatas()
		{
			// Versuche
			try
			{
				// ID zu bekommen
				$id			= $this->GemID;
				
				// Daten aus Tabelle zu Laden
				$result 	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblgemeinde WHERE GemID = '$id';");
				
				
				// Daten erhalten
				$row		= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
				
				// Und als Klassenvariable laden
				$this->Name 			= $row[1];
				$this->Adresse			= $row[2];
				$this->Telefon			= $row[3];
				$this->Fax				= $row[4];
				$this->Informationen 	= $row[5];
				$this->Kirchenvorstand 	= $row[6];
				$this->UeberPLZ			= $row[7];
				
				// Neuugkeitern laden
				$this->loadNeuigkeiten();
			}
			catch(Exception $ex)
			{
				
			}
		}
	
		// setData
		// Statische Funktion, um Arbeit zu sparen, wir haben keine Permissions und keine Dynamischen Tabellen also sollte das reichen
		public function setData($sData, $value, $bMySQL)
		{
			// Versuche
			try
			{
				// Value Escapen
				$value			= $GLOBALS["system"]->getDatabaseClass()->escapeString($value);
				
				// Klassenvariable speichern
				$this->$sData 	= $value;
				
				// bMySQL Value?
				if(isset($bMySQL))
				{
					// In die Tabelle speichern
					$result = $GLOBALS["system"]->getDatabaseClass()->query("UPDATE tblgemeinde SET $sData = '$value' WHERE GemID = '$this->GemID';");
					
					if($result)
					{
						// Sucess
						return true;
					}
					else
					{
						// Kein Sucess, Fehler
						return false;
					}
				}
				
				return true;
			}
			catch(Exception $ex)
			{
			
			}
			return false;
		}
		
		
		// getData
		// Erhaelt eine Klassenvariable
		public function getData($sData)
		{
			// Versuche
			try
			{
				// Klassenvariable zu erhalten
				return $this->$sData;
			}
			catch(Exception $ex)
			{
				return false;
			}
			return false;
		}
		
		// addNeuigkeit
		// Wie der name schon sagt
		public function addNeuigkeit($titel, $datum, $text)
		{
			// Neuigkeit hinzufuegen
			$titel 	= $GLOBALS["system"]->getDatabaseClass()->escapeString($titel);
			$datum	= $GLOBALS["system"]->getDatabaseClass()->escapeString($datum);
			$text	= $GLOBALS["system"]->getDatabaseClass()->escapeString($text);
			
			// Neuigkeit speichern
			$result = $GLOBALS["system"]->getDatabaseClass()->query("INSERT INTO tblgemeindeneuigkeiten(GemeindeID, Titel, Datum, Inhalt) VALUES ('$this->GemID', '$titel', '$datum', '$text');");
			
			// Existiert das Result?
			if($result)
			{
				// Letzte ID Bekommen
				$result2 	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT LAST_INSERT_ID() FROM tblgemeindeneuigkeiten;");
				$row		= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result2);
				
				$id			= (int) $row[0];
				// Neuigkeit speichern
			
				$this->Neuigkeiten[$id] = array(0 => $titel, 1 => $datum, 2 => $text);
				return true;
			}
			return false;
		}
		
		// removeNeuigkeit
		// Entfernt eine Nachricht
		public function removeNeuigkeit($id)
		{
			$this->loadNeuigkeiten();
							
			// ID Escapen
			$id			= (int) $GLOBALS["system"]->getDatabaseClass()->escapeString($id);
			
			// Ist die Neuigkeit vorhanden?
			if(isset($this->Neuigkeiten[$id]))
			{
				// Entferne Sie
				unset($this->Neuigkeiten[$id]);
				
				$this->Neuigkeiten[$id] = null;
				
				// MySQL Datensatz loeschen
				$result = $GLOBALS["system"]->getDatabaseClass()->query("DELETE FROM tblgemeindeneuigkeiten WHERE GemeindeID = '$this->GemID' AND NeuigkeitID = '$id';");
				
				if($result)
				{
					return true;
				}
			}
			else
			{
				echo("Error: this->Neuigkeiten not set with ID ".$id);
				return false;
			}
			return false;
		}
		
		
		// loadNeuigkeiten
		// Wie der Name schon sagt - Laedt die Neuigkeiten
		public function loadNeuigkeiten()
		{
			// Bekomme alle Nachrichten mit der Gemeinde ID
			$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblgemeindeneuigkeiten WHERE GemeindeID = '$this->GemID';");
			
			// Gehe alle Nachrichten durch
			while($row = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result))
			{
				$id 	= (int) $row[0];
				$titel	= $row[2];
				$datum	= $row[4];
				$inhalt	= $row[3];
				
				// In Array Speichern
				$this->Neuigkeiten[$id] = array(0 => $titel, 1 => $datum, 2 => $inhalt);
			}	
		}
		
		
		// getNeuigkeiten
		// Gibt die Neuigkeiten zurueck
		public function getNeuigkeiten()
		{
			$this->loadNeuigkeiten();
			return $this->Neuigkeiten;
		}
		
		// updateInformationsleiste
		// Updated die Informationsseite unter den Daten
		public function updateInformationsleiste($inhalt)
		{
			// Variable setzen
			$this->Informationen = $GLOBALS["system"]->getDatabaseClass()->escapeString($inhalt);
			
			// Updaten
			$result = $GLOBALS["system"]->getDatabaseClass()->query("UPDATE tblgemeinde SET Informationen = '$this->Informationen' WHERE GemID = '$this->GemID';");
			
			// Falls es erfolgreich war
			if($result)
			{
				// Jawoll zurueckgeben
				return true;
			}
			
			return false;
		}
		
		// updateKirchenvorstandsseite
		// Updated die Kirchenvorstandsseite
		public function updateKirchenvorstandsseite($inhalt)
		{
			// Variable setzen
			$this->Kirchenvorstand = $GLOBALS["system"]->getDatabaseClass()->escapeString($inhalt);
			
			// Updaten
			$result = $GLOBALS["system"]->getDatabaseClass()->query("UPDATE tblgemeinde SET Kirchenvorstand = '$this->Kirchenvorstand' WHERE GemID = '$this->GemID';");
			
			// Falls es erfolgreich war
			if($result)
			{
				// Jawoll zurueckgeben
				return true;
			}
			
			return false;
		}
	}
?>