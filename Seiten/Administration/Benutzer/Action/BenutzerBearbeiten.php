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
			
				<br>Bitte beachten Sie: Sie m&uuml;ssen das Passwort zur Bearbeitung unten erneut eingeben. (2x)</br>
				<p class="mainTextDoidSans">
					<?php
						error_reporting(E_ALL);
						ini_set('error_reporting', E_ALL);
						ini_set('display_errors', 1);
						
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						$selected_id = $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["BenutzerBearbeiten"]);
						
						if(isset($selected_id))
						{
							$result_1 	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblbenutzer WHERE BenutzerID = '$selected_id';");
							$result_2 	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblpersonendaten WHERE PersID = '$selected_id';");
						
							$row_1 		= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result_1);
							$row_2 		= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result_2);
							
							$anrede		= $row_2[3];
							$vorname	= $row_2[4];
							$nachname	= $row_2[5];
							$plz		= $row_2[6];
							$adresse	= $row_2[7];
							$fax		= $row_2[8];
							$email		= $row_2[1];
							$telefon	= $row_2[2];
						
							$accname	= $row_1[1];
							
							?>
							<form method="post" action="BenutzerFertigBearbeitet.php">
								<p class="mainTextDoidSans">
									
									Anrede:			<br><input type="text" name="anrede" value=<?php print("'$anrede'")?> maxlength="25"> (Titel, Bsp. Frau Pr&ouml;pstin)
									<br>
									<br>
									Vorname: 		<br><input type="text" name="vorname" value=<?php print("'$vorname'")?> maxlength="25" required="true"> (Pflichtfeld)
									<br>
									Nachname: 		<br><input type="text" name="nachname" value=<?php print("'$nachname'")?> maxlength="25" required="true"> (Pflichtfeld)
									<br>
									<br>
									PLZ: 			<br><input type="text" name="plz" value=<?php print("'$plz'")?> maxlength="6"> (Kein Pflichtfeld)
									<br>
									Adresse: 		<br><input type="text" name="adresse" value=<?php print("'$adresse'")?> maxlength="35"> (Kein Pflichtfeld)
									<br>
									E-Mail: 		<br><input type="text" name="email" value=<?php print("'$email'")?> maxlength="35"> (Kein Pflichtfeld)
									<br>
									Telefon: 		<br><input type="text" name="telefon" value=<?php print("'$telefon'")?> maxlength="35"> (Kein Pflichtfeld)
									<br>
									Fax: 			<br><input type="text" name="fax" value=<?php print("'$fax'")?> maxlength="35"> (Kein Pflichtfeld)
									<br>
									<br>
									Accountname*:	<br><input type="hidden" name="accname" value=<?php print("'$accname'")?> maxlength="22"> <input type="text" name="display_accname" disabled="true" value=<?php print("'$accname'")?> maxlength="22"> (Pflichtfeld) (Kann nicht geändert werden)
									<br>
									<br>
									Passwort: 				<br><input type="password" name="password1" required="true" > (Pflichtfeld)
									<br>
									</br>
									Passwort wiederholen: 	<br><input type="password" name="password2" required="true"> (Pflichtfeld)
									<br>
									</br>
									<br>
									<input type="checkbox" name="administrator"> Administrator** <br><br>
									<input type="submit" name="absenden" value="Benutzer Bearbeiten">
								</p>
							</form>	
												
							
							* Wird zum einloggen benutzt (Kann nicht Bearbeitet werden!)<br>
							** Dieses K&auml;stchen gibt an, ob der Benutzer Administrationsrechte besitzen soll.<br>
							Wichtig: Diese Rechte sind keine Gemeinderechte, sondern Globale Rechte, um Beispielsweise<br>
							neue Benutzer anzulegen.
							
							Nicht alle Felder sind Pflichtfelder.
							<?php
						}
						// Keine Ausgabe, da es anders nicht sein kann

			
					?>

				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
