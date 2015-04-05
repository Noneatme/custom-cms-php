<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(4);
			?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration_BenutzerVerwalten.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
				
				<p class="mainTextDoidSans">

					<?php
						error_reporting(E_ALL);
						ini_set('error_reporting', E_ALL);
						ini_set('display_errors', 1);
						
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						if(isset($_POST["BenutzerRechteBearbeiten"]))
						{
							$GLOBALS['selected_benutzerrechtID'] = $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["BenutzerRechteBearbeiten"]);
							$_SESSION['selected_benutzerrechtID'] = $GLOBALS['selected_benutzerrechtID'];
						
						}
						else
						{
							$GLOBALS['selected_benutzerrechtID'] = $_SESSION['selected_benutzerrechtID'];
							echo("<b>Hinweis:</b> Die Aktion wurde erfolgreich ausgef&uuml;hrt.");
						}
						
						$selected_id = $GLOBALS['selected_benutzerrechtID'];
					
						
						$result			= $GLOBALS["system"]->getDatabaseClass()->query("SELECT Benutzername FROM tblbenutzer WHERE BenutzerID = '$selected_id';");
						$row			= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
						$name			= $row[0];
						
						if(isset($selected_id))
						{
							// Userobjekt erstellen
							$suser	= new cUser($name, "asdf");
							
							// Ohne korrektes Passwort einloggen
							$suser->skipLogin = true;
							
							// Einloggen
							$suser->login();
							
							$_SESSION['userObject2'] = serialize($suser);
						}
					
					?>
					<br>
					In diesem Bereich k&ouml;nnen Sie Rechte des Benutzers &auml;ndern.
					<br>
					<br>
					<b>Warnung:</b> Falls Sie Ihre eigenen Rechte bearbeiten, kann dies dazu f&uuml;hren, dass Sie Ihre eigenen Rechte entfernen.<br>
					Seien Sie also vorsichtig.
					<br>
					<center>
					<form action="BenutzerRechteBearbeiten_EntfernenGlobal.php" method="POST">
						Dieser Benutzer besitzt folgende Globale Rechte:
						<br>
						<br>
						<select name="list" size="10" required="true">
						
						<?php
							$rechte = $suser->getGlobaleRechte();
							foreach(array_keys((array) $rechte) as $key)
							{
								$recht	= $suser->globaleRechteValues[(int) ($key)];
								echo("<option value='".$key."'>".$recht."</option>");
							}
						?>
						
						</select>
						</br>
						<input type="submit" name="button" value="Recht entfernen" onclick="return confirm('Sind sie sicher, dass Sie diesem Benutzer dieses Recht entfernen m&ouml;chten?');">
					</form>
						<br>
						<br>
						Dieser Benutzer besitzt folgende Gemeinderechte:
						<br>
						<br>
					<form action="BenutzerRechteBearbeiten_EntfernenGemeindeRecht.php" method="POST">
						<select name="list" size="10" required="true">
						
						<?php
							$rechte = $suser->getGemeindeRechte();
							foreach(array_keys((array) $rechte) as $key)
							{
								$recht	= $suser->gemeindeRechteValues[(int) ($key)];
								echo("<option value='".$key."'>".$recht."</option>");
							}
						?>
						</select>
						</br>
						<input type="submit" name="button" value="Recht entfernen" onclick="return confirm('Sind sie sicher, dass Sie diesem Benutzer dieses Recht entfernen m&ouml;chten?');">
					</form>
					<br>
					<br>
					Dieser Benutzer hat au&szlig;erdem <b>Bearbeitungsrechte</b> f&uuml;r folgende <b>Gemeinden</b>:
					<br>
					<br>
					<form action="BenutzerRechteBearbeiten_GemeindeEntfernen.php" method="POST">
						<select name="list" size="10" required="true">
						
						<?php
							$rechte = $suser->getBetreuteGemeinden();
							foreach(array_keys((array) $rechte) as $key)
							{
								$result	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT GemID, Name FROM tblgemeinde WHERE GemID = '$key';");
								$row	= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
								
								echo("<option value='".$key."'>".$row[1]."</option>");
							}
						?>
						</select>
						</br>
						<input type="submit" name="button" value="Recht zum Bearbeiten der Gemeinde entziehen" onclick="return confirm('Sind sie sicher, dass Sie diesem Benutzer dieses Recht entfernen m&ouml;chten?');">
					</form>
					<br>
					<br>
					Diesem Benutzer k&ouml;nnen folgende <b>Globale</b>-Rechte zugeteilt werden:
					<br>
					<br>
						
					<form action="BenutzerRechteBearbeiten_GebenGlobal.php" method="POST">
						<select name="list" size="10" required="true">
						
						<?php
							$rechte = $suser->globaleRechteValues;
							foreach(array_keys((array) $rechte) as $key)
							{
								$value = $suser->globaleRechteValues[$key];
								echo("<option value='".$key."'>".$value."</option>");
							}
						?>
						</select>
						</br>
						<input type="submit" name="button" value="Globales Recht geben">
					</form>
					<br>
					<br>
					Diesem Benutzer k&ouml;nnen folgende <b>Gemeinde</b>-Rechte zugeteilt werden:
					<br>
					<br>
					<form action="BenutzerRechteBearbeiten_GebenGemeindeRecht.php" method="POST">
						<select name="list" size="10" required="true">
						
						<?php
							$rechte = $suser->gemeindeRechteValues;
							foreach(array_keys((array) $rechte) as $key)
							{
								$value = $suser->gemeindeRechteValues[$key];
								echo("<option value='".$key."'>".$value."</option>");
							}
						?>
						</select>
						</br>
						<input type="submit" name="button" value="Gemeinderecht geben">
					</form>
					<br>
					<br>
					Diesem Benutzer k&ouml;nnen Rechte f&uuml;r folgende Gemeinden gegeben werden:
					<br>
					<br>
					<form action="BenutzerRechteBearbeiten_GemeindeGeben.php" method="POST">
						<select name="list" size="10" required="true">
						
						<?php
							$result	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT GemID, Name FROM tblgemeinde;");
							while($row = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result))
							{ 
								if($suser->hasBetreuteGemeindenRecht($row[0]) == false)
								{
									echo("<option value='".$row[0]."'>".$row[1]."</option>");
								}
							}
						?>
						</select>
						</br>
						<input type="submit" name="button" value="Gemeinderecht geben">
					</form>
					</center>
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
