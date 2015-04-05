<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(6);
			?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration_GemeindenVerwalten.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
				
				<p class="mainTextDoidSans">
					<?php
						$userObject = unserialize($_SESSION['object']);
						
						// TODO: RECHTE
						
					?>
					<br>
						
						Hier k&ouml;nnen Sie eine neue Gemeinde anlegen.<br><br>
						Bitte f&uuml;llen Sie dazu dieses Formular aus.<br><br>
						
						<form method="post" action="Action/GemeindeHinzufuegen.php">
						<p class="mainTextDoidSans">
							
							Gemeindenname:	<br><input type="text" name="name" maxlength="35"> (Bsp. Bad Gandersheim)
							<br>
							Adresse: 		<br><input type="text" name="adresse" maxlength="35"> (Bsp. Stiftsfreiheit 1)
							<br>
							Telefon: 		<br><input type="text" name="telefon" maxlength="35"> (Bsp. 0555/555555)
							<br>
							Fax: 			<br><input type="text" name="fax" maxlength="35"> (Kein Pflichtfeld)
							<br>
							
							<input type="submit" name="absenden" value="Absenden">
						</p>
					</form>	

				</p>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>