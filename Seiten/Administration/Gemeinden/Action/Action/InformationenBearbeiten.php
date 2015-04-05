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
						require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
			
					
						$userObject = unserialize($_SESSION['object']);
						
						// TODO: RECHTE
						if($_SESSION)
						{
							$gemeinde		= unserialize($_SESSION["GemeindeObject"]);
							
							$name			= $gemeinde->Name;
							$adresse		= $gemeinde->Adresse;
							$telefon		= $gemeinde->Telefon;
							$fax			= $gemeinde->Fax;
							
							$informationen 	= $gemeinde->Informationen;
							$kv 			= $gemeinde->Kirchenvorstand;
							$plz 			= $gemeinde->UeberPLZ;
							
							?>
							<br>
								
							Hier k&ouml;nnen Sie die Gemeinde bearbeiten.<br><br>
							Bitte bearbeiten Sie daf&uuml;r dieses Formular.<br><br>
								
							<form method="post" action="Action/InformationenBearbeiten.php">
								<p class="mainTextDoidSans">
									
									Gemeindenname:	<br><input type="text" name="name" maxlength="35" value=<?php print("'$name'"); ?> > (Bsp. Bad Gandersheim)
									<br>
									Adresse: 		<br><input type="text" name="adresse" maxlength="35" value=<?php print("'$adresse'"); ?> > (Bsp. Stiftsfreiheit 1)
									<br>
									Telefon: 		<br><input type="text" name="telefon" maxlength="35" value=<?php print("'$telefon'"); ?> > (Bsp. 0555/555555)
									<br>
									Fax:									<br><input type="text" name="fax" maxlength="35" value=<?php print("'$fax'"); ?> > (Kein Pflichtfeld)
									<br>
									<br>
									Unterordnung in der 'Gemeinde'-Liste:
									<br>
									<select name="Unterordnung" size="5">
										<?php
											$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblort ORDER BY Ort ASC;");
											
											if(isset($result))
											{
												while($ort = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result))
												{
													echo("<option value='".$ort[1]."'>".$ort[1]."</option>");
												}
											}
										?>
									
									</select>
									<br>
									<input type="submit" name="absenden" value="Absenden">
								</p>
							</form>
							</br>
							<b>Header-Bild Aktualisieren:</b> <br>
							Laden Sie ein Bild mit den Ma&szlig;en 820 x 165 (Oder kleiner) hoch, um das Header-Bild zu ersetzen.</br></br>
							<b>Wichtig: Bitte <u>nur .JPG</u> Dateien hochladen! </b>
							<form method="post" action="Action/HeaderHochladen.php" enctype="multipart/form-data">
								<p class="mainTextDoidSans">
									<input type="hidden" name="MAX_FILE_SIZE" value="9999999999999" />
									<input type="file" name="dateiupload" accept="image/*"></br>
									<input type="submit" name="absenden" value="Absenden">
									
									</br>
								</p>
							</form>	
							</br></br>
							<b>Informationsleiste bearbeiten:</b> <br>
							Dieser Inhalt wird unter den Kontaktdaten angezeigt. </br>
							<form action="Action/InformationsleisteBearbeiten.php" method="POST">
								<textarea name="informationen" cols="80" rows="15">
									<?php
										print($informationen);
									?>
								</textarea>
								</br>
								<input type="submit" name="absenden" value="Informationsleiste bearbeiten" onclick="return confirm('Sind sie sicher, dass Sie die Informationsleiste bearbeiten m&ouml;chten?');">
							</form></br></br>
							<b>Kirchenvorstand bearbeiten:</b> <br>
							Dieser Inhalt wird in dem Reiter 'Kirchenvorstand' angezeigt.</br>
							<form action="Action/KirchenvorstandsseiteBearbeiten.php" method="POST">
								<textarea name="informationen" cols="80" rows="15">
									<?php
										print($kv);
									?>
								</textarea>
								</br>
								<input type="submit" name="absenden" value="Kirchenvorstandsseite bearbeiten" onclick="return confirm('Sind sie sicher, dass Sie die Kirchenvorstandsseite bearbeiten m&ouml;chten?');">
							</form></br></br>
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