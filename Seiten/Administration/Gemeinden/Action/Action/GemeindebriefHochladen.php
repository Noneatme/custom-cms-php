<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php			
				require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
				
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGemeindeRight(4);
				
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
						
							?>
							<br>
								
							Hier k&ouml;nnen Sie den Gemeindebrief aktualisieren.<br>
							<u>Falls ein Gemeindebrief schon existiert, wird der mit dem neuen Gemeindebrief &uuml;berschrieben.</u><br><br>
							Unterst&uuml;tzt wird folgendes Format: <b>.pdf</b> (Adobe Acrobat Dokument)</br></br>
							Falls Sie keinen Gemeindebrief in Digitaler Form besitzen, so k&ouml;nnen Sie dieses Option &uuml;berspringen.<br><br>
								<form method="post" action="Action/GemeindebriefHochladen.php" enctype="multipart/form-data">
									<p class="mainTextDoidSans">
										<input type="hidden" name="MAX_FILE_SIZE" value="9999999999" />
										<input type="file" name="dateiupload" accept=".pdf"></br>
										<input type="submit" name="absenden" value="Absenden">
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