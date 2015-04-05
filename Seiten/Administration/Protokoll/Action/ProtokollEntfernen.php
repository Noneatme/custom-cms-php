<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(17); // Entfernen
				
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
					
				
						$folder			= $_SERVER['DOCUMENT_ROOT']."/Home/Files/intern/protokolle/";
						$filename		= $_POST['Protokoll'];
							
						$file			= $folder.$filename;
							
							
						if(is_file($file))
						{
							if(is_readable($file))
							{
						
								$bool = @unlink(realpath($file));
								echo("Das Protokoll '$filename' wurde gel&ouml;scht. </br>");
								
								$GLOBALS["system"]->logger->outputLog("[PROTOKOLL] Protokoll '$filename' wurde entfernt - ".$userObject->getFullName());
						
							}
							else
							{
								echo("Fehler: Datei nicht lesbar.");
							}
						}
						else
						{
							echo("Fehler: Datei nicht gefunden.");
						}
					}
					else
					{
						echo("Fehler: Kein POST &uuml;bergeben.");
					}
				?>
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php"; ?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
