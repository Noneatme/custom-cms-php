<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(15); // Betrachten
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
					$folder			= $_SERVER['DOCUMENT_ROOT']."/Home/Files/intern/protokolle/";
				
				?>
				
				<p class="mainTextDoidSans">
					<br>
					Hier k&ouml;nnen Sie die vorhandenen Protokolle betrachten.<br>
					Klicken Sie hierzu auf ein vorhandenes Protokoll und auf die gew&uuml;nschte Schaltfl&auml;che.
					</br></br>
					<b>Wichtige Information:</b> Bitte lassen Sie sich nur Dateien mit der Endung <b>.LOG oder .TXT</b> Anzeigen, da es sonst zu Problemen kommen kann.</br>
					Selbstverst&auml;ndlich k&ouml;nnen Sie sich jede andere Datei herunterladen.
					<br><br><br>
					<center>
						<form action="Action/ProtokollBetrachten.php" method="POST">
							<select name="Protokoll" size="10" required="true">
								<?php
									$protokolle = scandir($folder);
									foreach($protokolle as $protokoll)
									{
										if(!is_dir($folder.$protokoll))
										{
											echo("<option value='".$protokoll."'>".$protokoll."</option>");
										}
									}
								?>
							</select>
							</br>
							<input type="submit" name="absenden" value="Protokoll herunterladen">
							<input type="submit" name="absenden" value="Protokoll betrachten">
							
						</form>
					</center>
					</br>
					
				</p>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
