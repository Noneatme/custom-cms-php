<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(2);
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
						error_reporting(E_ALL);
						ini_set('error_reporting', E_ALL);
						ini_set('display_errors', 1);
						
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						$selected_id = $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["BenutzerEntfernen"]);
						
						if(isset($selected_id))
						{
							$result1 = $GLOBALS["system"]->getDatabaseClass()->query("DELETE FROM tblbenutzer WHERE BenutzerID = '$selected_id';");
							$result2 = $GLOBALS["system"]->getDatabaseClass()->query("DELETE FROM tblpersonendaten WHERE PersID = '$selected_id';");
							
							if(isset($result1) && isset($result2))
							{
								echo("<br>Der Benutzeraccount '$selected_id' wurde erfolgreich gel&ouml;scht. </br></br>");
								$GLOBALS["system"]->logger->outputLog("[ADMIN_BENUTZER] Benutzer '$selected_id' wurde geloescht - ".$userObject->getFullName());
								include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php";
							}
							else
							{
								echo("<br>Fehler beim l&ouml;eschen des Accounts! Vermutlich existiert der Account nicht mehr.");
							}
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
