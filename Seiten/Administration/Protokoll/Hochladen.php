<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(17); // Entfernen
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
						Hier k&ouml;nnen Sie ein neues Protokoll hochladen.<br>
						Klicken Sie hierzu auf die Schaltfl&auml;che 'Datei ausw&auml;hlen' und w&auml;hlen Sie das gew&uuml;nschte Protokoll aus.</br>
						<br>Anschlie&szlig;end klicken Sie bitte auf 'Protokoll hochladen'.</br></br>
						<b>Jede Dateiendung kann hochgeladen werden. Maximale Dateigr&ouml;&szlig;e: <s><u>10MB</u></s></b>
						<br></br>
						<center>
							<form action="Action/ProtokollHochladen.php" method="POST" enctype="multipart/form-data">
								<input type="hidden" name="MAX_FILE_SIZE" value="9999999999999" />
								<input type="file" name="dateiupload" accept="file_extension"></br>
								</br>
								<input type="submit" name="absenden" value="Protokoll hochladen">
								
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
