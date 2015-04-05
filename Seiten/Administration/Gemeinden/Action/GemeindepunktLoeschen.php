<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(8);
				$userObject->checkIfUserHasGlobalRight(14);

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
						$plz	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["plz"]);
						
						if(isset($plz))
						{
							$result = $GLOBALS["system"]->getDatabaseClass()->query("DELETE FROM tblort WHERE Ort = '$plz';");
							if(isset($result))
							{
								$GLOBALS["system"]->logger->outputLog("[ADMIN_GEMEINDE] Gemeindepunkt '$plz' wurde entfernt - ".$userObject->getFullName());
								echo("<br>Die Aktion wurde ausgef&uuml;rt.<br><br>");
							}
							else
							{
								echo("<br>Fehler bei der Verarbeitung. Eventuell falsche Daten.<br><br>");
							}
						}
						include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php";
					?>
					
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
