<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(9);
				$userObject->checkIfUserHasGlobalRight(13);
			?>
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration.php"; ?> 				
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
				
				<p class="mainTextDoidSans">
						<?php
							$userObject = unserialize($_SESSION['object']);
							
							$GLOBALS["system"]->logger->outputLog("[ADMIN_HAUPTSEITE] Links wurde bearbeitet - ".$userObject->getFullName());
			
							// TODO: RECHTE -> Erledigt
							
							if(isset($_POST))
							{
								$text = $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST['links']);
								$GLOBALS["system"]->getDatabaseClass()->query("UPDATE tblsystem SET LinksText = '$text';");
							}
							
						?>
				</p>
				<br>
				Die Aktion wurde erfolgreich ausgef&uuml;hrt.<br>
				<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php" ?>
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
