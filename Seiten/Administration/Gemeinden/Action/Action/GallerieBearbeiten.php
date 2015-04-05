<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php			
				require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
				
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGemeindeRight(3);
				
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
						if($_SESSION)
						{
							$gemeinde		= unserialize($_SESSION["GemeindeObject"]);
						
							$scan_dir		= $_SERVER['DOCUMENT_ROOT']."/Home/Files/Bilder/".$gemeinde->GemID."/";
						
							?>
							<br>
								
							Hier k&ouml;nnen Sie die Gemeindegallerie bearbeiten.<br>

							<center>
								<form method="post" action="Action/VorhandenBilderLoeschen.php">
									<p class="mainTextDoidSans">
										<br>
										Vorhandene Bilder l&ouml;schen:<br>
										<select name="BildEntfernen" size="10" required="true">
											<?php
												$bilder = scandir($scan_dir);
												
												foreach($bilder as $bild)
												{
													if(!is_dir($scan_dir.$bild))
													{
														echo("<option value='".$bild."'>".$bild."</option>");
													}
												}
											?>
										
										</select>
										</br>
										<input type="submit" name="absenden" value="L&ouml;schen">
									</p>
								</form>	
							</center>
							<form method="post" action="Action/BildHochladen.php" enctype="multipart/form-data">
								<p class="mainTextDoidSans">
									<br>
									Neues Bild hochladen:<br>
									Dieses Bild wird dann in der Gemeindegallerie zu sehen sein.<br>
									Achten Sie darauf, dass der Name des Bildes einmalig ist, ansonsten wird das Bild &uuml;berschrieben.<br>
									Bitte laden Sie keine Anst&ouml;ssigen Bilder hoch. (Max. 10 MB / Bild)<br></br>
									
								
									<input type="hidden" name="MAX_FILE_SIZE" value="9999999999999" />
									<input type="file" name="dateiupload" accept="image/*"></br>
									<input type="submit" name="absenden" value="Absenden">
										
									</br>
								
								</p>
							</form>	
						
						<?php
						}
					?>
					

				</p>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>