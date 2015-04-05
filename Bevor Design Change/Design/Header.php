<div id="Header"> 
	<?php
		// Falls die Session existiert und die Gemeinde ID bekannt ist
		if(isset($_SESSION) && isset($_SESSION["GemeindeID"]))
		{
			// Gemeinde importieren
			require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
					
			// In Integer umwandeln
			$id			= (int) $_SESSION["GemeindeID"];
			
			// Escapen
			$id			= $GLOBALS["system"]->getDatabaseClass()->escapeString($id);
			
			// Pfad des Bildes erhalten
			$dir		= $_SERVER['DOCUMENT_ROOT']."/Home/Files/HeaderImages/".$id.".jpg";
			
			// Abfrage zum erhalt des Namens der Gemeinde
			$result		= $GLOBALS["system"]->getDatabaseClass()->query("SELECT Name FROM tblgemeinde WHERE GemID = '$id';");
			
			// Falls die Abfrage erfolgreich war
			if($result)
			{
				// Zeile bekommen
				$row 	= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
				
				// Falls sie da ist
				if($row)
				{	
					// Headertext schreiben
					echo("<pc class='headerText'> Gemeinde ".$row[0]."</pc>");
				}
			}
			
			if($id == 0)
			{
				echo("<pc class='headerText'> Propstei Bad Gandersheim</pc>");
			}
			if(is_file($dir))
			{
				$htmldir	= $_SERVER['DOCUMENT_ROOT']."/Home/Files/HeaderImages/".$id.".jpg";
				echo("<img src='".$htmldir."' width='820' height='165'></img>");
				
				
			}
		}
	
	?>

</div>
                        