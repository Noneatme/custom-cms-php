<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(15); // Betrachten
				
				
				$folder			= $_SERVER['DOCUMENT_ROOT']."/Home/Files/intern/protokolle/";
				$filename		= $_POST['Protokoll'];
					
				$file			= $folder.$filename;
					
				$GLOBALS["system"]->logger->outputLog("[PROTOKOLL] Protokoll '$filename' wurde betrachtet / heruntergeladen - ".$userObject->getFullName());
				
				if($_POST['absenden'] == "Protokoll herunterladen")
				{
					ob_clean();
					header('Content-type: application/sql');
					header('Content-Disposition: inline; filename="' . $filename . '"');
					header('Content-Transfer-Encoding: binary');
					header('Content-Length: ' . filesize($file));
					header('Accept-Ranges: bytes');
					@readfile($file);
					
					exit(0);
				}
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
					
					if(file_exists($file))
					{
						if($_POST['absenden'] == "Protokoll betrachten")
						{
							?>
							<textarea name="protokoll" cols="80" rows="15">
							<?php
								echo(str_replace(array("\r","\n",'\r','\n'), "</br>", file_get_contents($file)));
							?>
							</textarea>
							<?php
						}
					}
				?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
