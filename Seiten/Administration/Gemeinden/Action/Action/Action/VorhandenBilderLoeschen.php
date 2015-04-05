<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
					
			
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGemeindeRight(3);
				$userObject->checkIfUserHasGemeindeRight(7);
				
				$id			= (int) unserialize($_SESSION["GemeindeObject"])->GemID;
				$userObject->checkIfUserHasBetreuteGemeindenRight($id);
			?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration_GemeindeBearbeiten.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
				
				<p class="mainTextDoidSans">
					<?php
					
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						
						// Post
						if(isset($_POST))
						{
							$gemeinde	= unserialize($_SESSION["GemeindeObject"]);
							
						
							$selected_id	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["BildEntfernen"]);
							$pfad			= $_SERVER['DOCUMENT_ROOT']."/Home/Files/Bilder/".$gemeinde->GemID."/".$selected_id;
							
							if(is_file($pfad))
							{
								unlink($pfad);
								
								$gemeinde_id = $gemeinde->GemID."('".$gemeinde->Name."');";
								$GLOBALS["system"]->logger->outputLog("[ADMIN_GEMEINDE] Gemeindebild '$pfad' von Gemeinde '$gemeinde_id' wurde entfernt - ".$userObject->getFullName());
								echo("<br>Die Aktion wurde erfolgreich ausgef&uuml;rt.</br>");
							}
							else
							{
								echo("<br>Fehler: Die Datei existiert nicht.</br>");
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