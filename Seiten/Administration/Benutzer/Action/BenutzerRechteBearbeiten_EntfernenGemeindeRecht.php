<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
	<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<?php
		$userObject = unserialize($_SESSION['object']);
		$userObject->checkIfUserHasGlobalRight(4);

			
		require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cUser.php");
					
		$userObject 	= unserialize($_SESSION['object']);
		$userObject2 	= unserialize($_SESSION['userObject2']); 

						
		// Post
		if(isset($_POST))
		{
			$recht			= $_POST['list'];
			$userObject2->removeGemeindeRecht($recht);
							
			$GLOBALS["system"]->logger->outputLog("[ADMIN_BENUTZER] Benutzer '".$userObject2->getFullName()."' wurde GemeindeRecht entzogen -> '$recht' - ".$userObject->getFullName());
			header("Location: BenutzerRechteBearbeiten.php");
		}
	?>
	</body>
</html>