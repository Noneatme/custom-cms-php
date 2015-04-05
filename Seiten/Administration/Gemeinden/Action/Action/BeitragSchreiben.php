<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php			
				require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
				
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGemeindeRight(1);
				
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
								
							Hier k&ouml;nnen Sie einen Beitrag f&uuml;r die Gemeinde schreiben.<br>
							Diese wird auf der Hauptseite der Gemeinde angezeigt.<br><br>
							<b>Hinweis f&uuml;r erfahrene Benutzer:</b> Bitte verwenden Sie HTML-Tags!<br><br>
								
							<form method="post" action="Action/BeitragSchreiben.php">
								<p class="mainTextDoidSans">
									
									Titel:			<br><input type="text" name="titel" maxlength="100" size="25"> (Pflichtfeld)
									<br>
									Datum: 			<br><input type="text" name="datum" maxlength="35" size="25" value=<?php echo("'".date("d.m.y")."'"); ?>> (Von wann der Artikel stammt)
									<br>
									Inhalt: 		<br>
									<textarea name="inhalt" cols="80" rows="15"></textarea><br>
									
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