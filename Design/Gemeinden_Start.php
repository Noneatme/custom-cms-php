<div id="Gemeinden">
		<pc class="gemeindeText"> 
<?php  
		// GEMEINDEN
		// Bekomme Row
		print("<a href='/Home/index.php'>Hauptseite</a>");
		print("</br></br>");
		print("<b>Gemeinden</b></br></br>");
		
		// Orte bekommen
		$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblort WHERE Anzeigen = '1' ORDER BY Ort ASC;");
		
		if(isset($result))
		{
			while($row = mysqli_fetch_row($result))
			{ 
				// Fuer jeden Ort in der Datenbank die Gemeinden abfragen
				$iPLZ				= $row[0];
				$sName				= $row[1];
				
				$result_gemeinden 	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblgemeinde WHERE UeberPLZ = '$sName' ORDER BY Name ASC;");
				
				print("$sName </br> <ul type='square'>");
				if(isset($result_gemeinden))
				{
					
					while($gemeinde = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result_gemeinden))
					{
						$string	= "";
						$name 	= $gemeinde[1];
						$id		= $gemeinde[0];	
						// Naja, kann man besser machen
						$string = $string."<a href='/Home/Seiten/Gemeinden/Aktuelles.php?&Gemeinde=".$id."' Detail='$id';><li>".$name."</li></a>";
	
						
						print("$string");
					
					}
				
				}
				print("</ul>");
				/*
				$string	= "";
				$name 	= $row[1];
				$id		= $row[0];	
				// Naja, kann man besser machen
				$string = $string."<a href='/Home/Seiten/Gemeinden/Aktuelles.php?&Gemeinde=".$id."' Detail='$id';>".$name."</a>";
				$string = $string."</br>";
				
				print("$string");
				*/
			
			}
		}
		
	
?>
	