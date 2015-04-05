<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(1);
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
					<?php
						$userObject = unserialize($_SESSION['object']);
						
						// TODO: RECHTE
						
					?>
						<br>
						
						Hier k&ouml;nnen Sie neue Benutzer anlegen, welche sich dann einloggen k&ouml;nnen.<br><br>
						Bitte f&uuml;llen Sie dazu dieses Formular aus.<br><br>
						
						<form method="post" action="Action/BenutzerHinzufuegen.php">
						<p class="mainTextDoidSans">
							
							Anrede:			<br><input type="text" name="anrede" maxlength="25"> (Titel, Bsp. Frau Pr&ouml;pstin)
							<br>
							<br>
							Vorname: 		<br><input type="text" name="vorname" maxlength="25" required="true"> (Pflichtfeld)
							<br>
							Nachname: 		<br><input type="text" name="nachname" maxlength="25" required="true"> (Pflichtfeld)
							<br>
							<br>
							PLZ: 			<br><input type="text" name="plz" maxlength="6"> (Kein Pflichtfeld)
							<br>
							Adresse: 		<br><input type="text" name="adresse" maxlength="35"> (Kein Pflichtfeld)
							<br>
							E-Mail: 		<br><input type="text" name="email" maxlength="35"> (Kein Pflichtfeld)
							<br>
							Telefon: 		<br><input type="text" name="telefon" maxlength="35"> (Kein Pflichtfeld)
							<br>
							Fax: 			<br><input type="text" name="fax" maxlength="35"> (Kein Pflichtfeld)
							<br>
							<br>
							Accountname*:	<br><input type="text" name="accname" maxlength="22" required="true"> (Pflichtfeld, kann sp&auml;ter nicht mehr ge&auml;ndert werden)
							<br>
							<br>
							Passwort: 				<br><input type="password" name="password1" required="true"> (Pflichtfeld)
							<br>
							</br>
							Passwort wiederholen: 	<br><input type="password" name="password2" required="true"> (Pflichtfeld)
							<br>
							</br>
							<br>
							<input type="checkbox" name="administrator"> Administrator** <br><br>
							<input type="submit" name="absenden" value="Absenden">
						</p>
					</form>	
					
					
					* Wird zum einloggen benutzt, kann sp&auml;ter nicht mehr ge&auml;ndert werden<br>
					** Dieses K&auml;stchen gibt an, ob der Benutzer Administrationsrechte besitzen soll.<br>
					Wichtig: Diese Rechte sind keine Gemeinderechte, sondern Globale Rechte, um Beispielsweise<br>
					neue Benutzer anzulegen.
					
					Nicht alle Felder sind Pflichtfelder.
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>