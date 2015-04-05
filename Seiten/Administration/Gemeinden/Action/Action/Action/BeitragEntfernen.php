<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php			
				require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
				
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGemeindeRight(2);
				
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
					
						require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
					
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						
						// Post
						if(isset($_POST))
						{
						
							$mode			= $_POST['absenden'];
							$selected_id	= (int) $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["BeitragEntfernen"]);
								
							$gemeinde	= unserialize($_SESSION["GemeindeObject"]);
							$gemeinde->loadNeuigkeiten();
							
							if($mode == 'Beitrag löschen')
							{
	
								$sucess = $gemeinde->removeNeuigkeit($selected_id);

								if($sucess)
								{				
									echo("<br>Die Aktion wurde ausgef&uuml;rt.<br>");
									$gemeinde_id = $gemeinde->GemID."('".$gemeinde->Name."');";
									$GLOBALS["system"]->logger->outputLog("[ADMIN_GEMEINDE] Gemeindebeitrag '$selected_id' von Gemeinde '$gemeinde_id' wurde entfernt - ".$userObject->getFullName());
									
									$_SESSION["GemeindeObject"] = serialize($gemeinde);
								}
								else
								{
									echo("<br>Fehler bei der Verarbeitung!<br>");
									echo(mysql_error());
								}
							}
							else
							{
								?>
								<form method="post" action="Action/BeitragBearbeiten.php">
									<textarea name="inhalt" cols="80" rows="15"><?php echo(str_replace(array("\r","\n",'\r','\n'), "", $gemeinde->Neuigkeiten[$selected_id][2])); ?></textarea><br>
									<input type="submit" name="absenden" value="Absenden">
								</form>
								<?php
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