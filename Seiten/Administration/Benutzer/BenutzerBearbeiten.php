<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(3);
			?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration_BenutzerVerwalten.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
				
				<p class="mainTextDoidSans">
					<br>
					Bitte w&auml;hlen Sie einen Benutzer aus der Liste aus, den Sie dann anschlie&szlig;end bearbeiten m&ouml;chten.<br><br></br>
						
					<center>
					<form action="Action/BenutzerBearbeiten.php" method="POST">
						<select name="BenutzerBearbeiten" size="10" required="true">
						<?php
						error_reporting(E_ALL);
						ini_set('error_reporting', E_ALL);
						ini_set('display_errors', 1);
						
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
									$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT BenutzerID, Benutzername FROM tblbenutzer ORDER BY Benutzername ASC;");

									while($row = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result))
									{
										$name		= "";
										$id			= (int) $row[0];
										$accname	= $row[1];
										
										$result2 = $GLOBALS["system"]->getDatabaseClass()->query("SELECT Anrede, Vorname, Nachname FROM tblpersonendaten WHERE PersID = '$id';");
										
										if(isset($result2))
										{
											$row2 = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result2);
											$name = $row2[0]." ".$row2[1]." ".$row2[2];
										}
									
										$name = $name."(".$accname.")";
										
										echo("<option value='".$row[0]."'>".$name."</option>");
									}

								// Keine Ausgabe, da es anders nicht sein kann

			
								?>
							</select> 
							<br>
							<input type="submit" name="absenden" value="Bearbeiten">
						</form>
					</center>
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
