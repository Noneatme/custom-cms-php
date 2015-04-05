<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(7);
			?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration_GemeindenVerwalten.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
				
				<p class="mainTextDoidSans">
					<?php

						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						$selected_id = $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["GemeindeEntfernen"]);
						
						if(isset($selected_id))
						{
							$result1 = $GLOBALS["system"]->getDatabaseClass()->query("DELETE FROM tblgemeinde WHERE GemID = '$selected_id';");
							$result2 = $GLOBALS["system"]->getDatabaseClass()->query("DELETE FROM tblgemeindeneuigkeiten WHERE GemeindeID = '$selected_id';");
							
							if(isset($result1) && isset($result2))
							{
								echo("<br>Die Gemeinde '$selected_id' wurde erfolgreich gel&ouml;scht.");
								$GLOBALS["system"]->logger->outputLog("[ADMIN_GEMEINDE] Gemeinde '$selected_id' wurde entfernt - ".$userObject->getFullName());
							}
							else
							{
								echo("<br>Fehler beim l&ouml;eschen der Gemeinde! Vermutlich existiert sie nicht mehr.");
							}
						}
						// Keine Ausgabe, da es anders nicht sein kann

						echo("<br");
						include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php";
					?>
					
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
