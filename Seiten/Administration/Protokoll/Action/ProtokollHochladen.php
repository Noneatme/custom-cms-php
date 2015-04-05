<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(16); // Hochladen
			?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_ProtokollAdministration.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
				
				<?php
					if(isset($_POST))
					{
						$uploaddir			= $_SERVER['DOCUMENT_ROOT']."/Home/Files/intern/protokolle/";
						$uploadfile			= $uploaddir."/".$_FILES['dateiupload']['name'];
						
						$suc 		= move_uploaded_file($_FILES['dateiupload']['tmp_name'], $uploadfile);
						
						if($suc)
						{
							$GLOBALS["system"]->logger->outputLog("[PROTOKOLL] Protokoll '$uploadfile' wurde hochgeladen - ".$userObject->getFullName());
				
							echo("<br>Die Aktion wurde ausgef&uuml;rt.<br>");
						}
						else
						{
							echo("<br>Fehler beim Hochladen! Versuchen Sie es erneut.<br>");
						}
						
					}
				?>
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php"; ?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
