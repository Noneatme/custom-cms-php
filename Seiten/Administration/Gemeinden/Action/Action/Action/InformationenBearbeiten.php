<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
			
				require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
				
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGemeindeRight(5);
				
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
						error_reporting(E_ALL);
						ini_set('error_reporting', E_ALL);
						ini_set('display_errors', 1);

						require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
					
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						
						// Post
						if(isset($_POST))
						{
							$gemeinde	= unserialize($_SESSION["GemeindeObject"]);
							
							
							$name		= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["name"]);
							$adresse	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["adresse"]);
							$telefon	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["telefon"]);
							$fax		= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["fax"]);
							if(isset($_POST["Unterordnung"]))
							{
								$plz		= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["Unterordnung"]);
							}
							
							$gemeinde->setData("Name", $name, true);
							$gemeinde->setData("Adresse", $adresse, true);
							$gemeinde->setData("Telefon", $telefon, true);
							$gemeinde->setData("Fax", $fax, true);
							
							
							if(isset($plz))
							{
								$gemeinde->setData("UeberPLZ", $plz, true);
							}
							
						}
						$gemeinde_id = $gemeinde->GemID."('".$gemeinde->Name."');";
						$GLOBALS["system"]->logger->outputLog("[ADMIN_GEMEINDE] Informationen von Gemeinde '$gemeinde_id' wurden bearbeitet - ".$userObject->getFullName());
								
						echo("<br>Die Aktion wurde ausgef&uuml;rt.<br>");
						include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php";
					?>
				
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>