<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(4);
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
					
						require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cUser.php");
					
						$userObject 	= unserialize($_SESSION['object']);
						$userObject2 	= unserialize($_SESSION['userObject2']); 
						
						// TODO: RECHTE
						
						$id			= $_SESSION['selected_id'];
						
						// Post
						if(isset($_POST) && (isset($id)))
						{
							$recht			= $_POST['list'];
							$userObject2->addGlobalRecht($recht);
							
							$GLOBALS["system"]->logger->outputLog("[ADMIN_BENUTZER] Benutzer '".$userObject2->getFullName()."' wurde GlobalRecht gegeben -> '$recht' - ".$userObject->getFullName());
						}
					?>

				</p>
				Die Operation wurde erfolgreich ausgef&uuml;hrt.<br><br>
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php" ?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>