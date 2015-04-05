<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(6);
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
						error_reporting(E_ALL);
						ini_set('error_reporting', E_ALL);
						ini_set('display_errors', 1);
						
					
						require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cUser.php");
					
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						
						// Post
						if(isset($_POST))
						{
							$name		= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["name"]);
							$adresse	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["adresse"]);
							$telefon	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["telefon"]);
							$fax		= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["fax"]);
							
							try
							{
								if(strlen($name) > 3)
								{
									$result = $GLOBALS["system"]->getDatabaseClass()->query("INSERT INTO tblgemeinde (Name, Adresse, Telefon, Fax) VALUES ('$name', '$adresse', '$telefon', '$fax');");
									
									if($result)
									{
										$GLOBALS["system"]->logger->outputLog("[ADMIN_GEMEINDE] Gemeinde '$name' wurde angelegt - ".$userObject->getFullName());
										echo("Die Aktion wurde erfolgreich ausgef&uuml;rt.<br>");
										include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php";
									}
								}
								else
								{
									echo("Bitte geben Sie einen Namen ein.<br>");
									include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php";
								}
							}
							catch(Exception $ex)
							{
								echo("Ein Fehler trat auf.<br>");
								include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php";
							}
						}
					?>

				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>