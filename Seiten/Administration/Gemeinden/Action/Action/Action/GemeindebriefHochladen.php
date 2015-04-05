<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php	
				require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
				
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGemeindeRight(4);
				
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
							$uploaddir	= $_SERVER['DOCUMENT_ROOT']."/Home/Files/Gemeindebriefe";
							$uploadfile	= $uploaddir."/".$gemeinde->GemID.".pdf";
							
							$suc 		= move_uploaded_file($_FILES['dateiupload']['tmp_name'], $uploadfile);

							if($suc)
							{
								$gemeinde_id = $gemeinde->GemID."('".$gemeinde->Name."');";
								$GLOBALS["system"]->logger->outputLog("[ADMIN_GEMEINDE] Gemeindebrief '$uploadfile' von Gemeinde '$gemeinde_id' wurde angelegt - ".$userObject->getFullName());
								
								echo("<br>Die Aktion wurde ausgef&uuml;rt.<br>");
							}
							else
							{
								echo("<br>Fehler beim Hochladen! Versuchen Sie es erneut.<br>");
								echo($_FILES['dateiupload']['error']."<br>");
							
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