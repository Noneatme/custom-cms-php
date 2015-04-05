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
					Hier k&ouml;nnen Sie die Datenbank verwalten.<br>
					Folgende Optionen stehen Ihnen zur verf&uuml;gung:
					<br><br><br>
					
					<b>Datenbankbackup herunterladen:</b></br>
					Hier k&ouml;nnen Sie ein Backup der Datenbank herunterladen.<br></br>
					<b>Wichtiger Hinweis:</b></br> Die Datenbank enth&auml;lt sensible Personendaten die unter Datenschutz stehen und in der Datenschutzerkl&auml;rung angegeben sind. Bitte achten Sie
					darauf dass Sie die Datenbank nicht weitergeben oder ver&ouml;ffentlichen!</br>
					Wom&ouml;glich machen Sie sich mit dem Download strafbar, wenn Sie nicht die Rechte f&uuml;r das Downloaden besitzen.</br></br>
					Falls das Downloaden nicht funktioniert, hat PHP nicht genug Rechte den Befehl <b>mysqldump</b> auszuf&uuml;ren.</b>
					<form action="Action/DatenbankHerunterladen.php" method="POST">
						<input type="submit" name="absenden" value="Datenbank herunterladen">
					</form>
					</br>
					Die MySQL Datenbankeinstellungen k&ouml;nnen in der settings.ini Datei im Hauptverzeichnis der Website ge&auml;ndert werden.
					Bitte beachten Sie die .htaccess Datei im Hauptverzeichnis, diese verweigert den direkten Zugriff auf die settings.ini Datei. &Ouml;ffnen Sie die Datei nur &uuml;ber das FTP-Protokoll.
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
