<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		
		<?php $_SESSION["GemeindeID"] = 0; ?>
		
		<div id="background">
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
				
				<p class="mainTextDoidSans">
					<?php
						
						error_reporting(E_ALL);
						ini_set('error_reporting', E_ALL);
						ini_set('display_errors', 1);
						
					
						$userObject = unserialize($_SESSION['object']);
						
						$gemeindeRechte = $userObject->getGemeindeRechte();
						$globaleRechte 	= $userObject->getGlobaleRechte();
						
						$globaleRechteString 	= $userObject->getGlobaleRechteString();
						$gemeindeRechteString	= $userObject->getGemeindeRechteString();
						$betreuteGemeinden		= $userObject->getBetreuteGemeindenRechteString();
						
						$zuletzt				= $_SESSION["lastseentime"];
						
						
						echo(
							"Willkommen, ".$userObject->anrede." ".$userObject->vorname." ".$userObject->nachname." (".$userObject->name.")!
							<br>
							<b>Sie haben sich zuletzt am $zuletzt eingeloggt.</br></b>
							<br>
							Sie haben folgende Rechte:
							<br>
							<br>
							Seiten-Administrationsrechte: 
							<br>
							<br>
							<u>".$globaleRechteString."</u>
							<br>
							Gemeinde-Administrationsrechte:
							<br>
							<br>
							<u>".$gemeindeRechteString."</u>
							<br>
							<br>
							Sie haben ausserdem Rechte fuer folgende Gemeinden:
							<br>
							<br>
							<u>".$betreuteGemeinden."</u> </br></br>
						");
						
						?>
						
						<?php
						
						if($userObject->hasGlobaleRechte(15))
						{
						?>
							</br>
							</br>
							<b>Protokolle</b></br>
							Hier k&ouml;nnen Sie die Protokolle betrachten und Verwalten, wenn Sie die Rechte hierf&uuml;r haben.
							<form method="post" action="ProtokollUebersicht.php" enctype="multipart/form-data">
								<input type="submit" name="absenden" value="Protokollbereich betreten">
									
							</form>
						
						<?php
						}
						
						if($userObject->isAdministrator())
						{
							?>
								<br><b>Erweiterte Administrationsfunktionen f&uuml;r Administratoren:</b></br>
								<form method="post" action="ErweiterteFunktionen.php" enctype="multipart/form-data">
									<input type="submit" name="absenden" value="Systemadministrationsbereich betreten" onclick="return confirm('Warnung: Der Systemadministrationsbereich sollte nur von Systemadministratoren und Administratoren mit Erfahrung betreten werden. Sind sie sicher dass Sie den Bereich betreten wollen?');">
									
								</form>
							<?php
						}

					?>
					
					
					</br>
					</br>
					</br>

				</p>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>