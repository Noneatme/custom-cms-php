<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(12);
			?>
		
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 

				<p class="mainTextDoidSans">
					<br>
					Hier k&ouml;nnen Sie das Impressum verwalten. </br>
					<u>Hinweis f&uuml;r erfahrene Benutzer:</u> Sie m&uuml;ssen HTML-Tags verwenden. </br>
					<?php
										
						$userObject = unserialize($_SESSION['object']);
						
						// TODO: Rechte
						
						$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT Impressum FROM tblsystem LIMIT 1;");
						$row	= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
					
						
					?>
					</br>
					</br>
					</br>Text der Impressumseite:</br>
					<form action="Action/ImpressumBearbeiten.php" method="POST">
						<textarea name="impressum" cols="80" rows="15">
							<?php
								print($row[0]);
							?>
						</textarea>
						</br>
						<input type="submit" name="absenden" value="Impressum bearbeiten" onclick="return confirm('Sind sie sicher, dass Sie die das Impressum bearbeiten m&ouml;chten?');">
					</form>

				</p>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>