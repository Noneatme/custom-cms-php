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
					
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						
						// Post
						if(isset($_POST))
						{
							$gemeinde	= unserialize($_SESSION["GemeindeObject"]);
							$uploaddir	= $_SERVER['DOCUMENT_ROOT']."/Home/Files/HeaderImages";
							$uploadfile	= $uploaddir."/".$gemeinde->GemID.".jpg";
							
							$suc 		= move_uploaded_file($_FILES['dateiupload']['tmp_name'], $uploadfile);
							
							if($suc)
							{
								$gemeinde_id = $gemeinde->GemID."('".$gemeinde->Name."');";
								$GLOBALS["system"]->logger->outputLog("[ADMIN_GEMEINDE] Gemeindeheader-bild '$uploadfile' von Gemeinde '$gemeinde_id' wurde angelegt - ".$userObject->getFullName());
								
								echo("<br>Die Aktion wurde ausgef&uuml;rt.<br>");
							}
							else
							{
								echo("<br>Fehler beim Hochladen! Versuchen Sie es erneut.<br>");
									$message = "-";
								 switch ($_FILES['dateiupload']['error']) { 
									case UPLOAD_ERR_INI_SIZE: 
										$message = "The uploaded file exceeds the upload_max_filesize directive in php.ini"; 
										break; 
									case UPLOAD_ERR_FORM_SIZE: 
										$message = "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form"; 
										break; 
									case UPLOAD_ERR_PARTIAL: 
										$message = "The uploaded file was only partially uploaded"; 
										break; 
									case UPLOAD_ERR_NO_FILE: 
										$message = "No file was uploaded"; 
										break; 
									case UPLOAD_ERR_NO_TMP_DIR: 
										$message = "Missing a temporary folder"; 
										break; 
									case UPLOAD_ERR_CANT_WRITE: 
										$message = "Failed to write file to disk"; 
										break; 
									case UPLOAD_ERR_EXTENSION: 
										$message = "File upload stopped by extension"; 
										break; 

									default: 
										$message = "Unknown upload error"; 
										break; 
								}
								echo("<br>$message");
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