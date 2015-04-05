<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserIsAdministrator();
			?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_ErwAdministration.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
				
				<p class="mainTextDoidSans">
					<br>
					<?php
						$status 	= "aktiviert";
						$no_status	= "deaktivieren";
						
						if(!$GLOBALS["system"]->logger->isEnabled())
						{
							$status 	= "deaktiviert";
							$no_status	= "aktivieren";
						}
						echo("Logging ist momentan <b>$status</b>".".");
						
					
					?>
					<br><br>
					Folgende Optionen stehen Ihnen zur Verf&uuml;gung:
					<br>
					(Eingegraute Schaltfl&auml;chen bedeuten dass die Funktion zur Sicherheit deaktiviert wurde.)
					<br><br><br>
					<b><s>Logging aktivieren/deaktivieren:</s></b></br></br>
					<s>Hier k&ouml;nnen Sie das Loggen von Aktivit&auml;ten deaktivieren bzw. aktivieren.</s><br>
					<form action="Action/ToggleLogging.php" method="POST">
						<input type="submit" name="absenden" value="Logging <?php echo($no_status) ?>" disabled="true">
					</form> <br>
					
					<b>Logs herunterladen:</b></br>
					Hier k&ouml;nnen Sie Logs herunterladen<br></br>
					<b>Wichtiger Hinweis:</b></br> Logs enthalten IP-Adressen. Seien sie mit dieser Art von Daten vorsichtig, da es sich um private und sensiblen Daten handelt.</br>
					<form action="Action/LogHerunterladen.php" method="POST">
						<select name="LogAuswaehlen" size="10" required="true">
						<?php
							$scan_dir = $GLOBALS["system"]->logger->logFolder;
							
							$logs = scandir($scan_dir);
											
							foreach($logs as $log)
							{
								if(!is_dir($scan_dir.$log))
								{
									echo("<option value='".$log."'>".$log."</option>");
								}
							}
							?>

						</select>
						</br></br>
						<input type="submit" name="absenden" value="Log herunterladen">
						<input type="submit" name="absenden" value="Log betrachten">
						<input type="submit" name="absenden" value="Log l&ouml;schen" onclick="return confirm('Sind Sie sicher dass Sie den Log l&ouml;schen wollen?');" disabled="true">
						
						
					</form>
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
