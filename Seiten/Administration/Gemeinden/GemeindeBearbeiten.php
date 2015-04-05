<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(8);
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
					<br>
					Bitte w&auml;hlen Sie eine Gemeinde aus der Liste aus, die Sie dann anschlie&szlig;end bearbeiten m&ouml;chten.<br><br>
					<center>
					<form action="Action/GemeindeBearbeiten.php" method="POST">
						<select name="GemeindeBearbeiten" size="10" required="true">
						<?php

						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT GemID, Name FROM tblgemeinde ORDER BY Name ASC;");

						while($row = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result))
						{
							$name		= "";
							$id			= (int) $row[0];
							$name		= $row[1];
										
									
							echo("<option value='".$row[0]."'>".$name."</option>");
						}

						// Keine Ausgabe, da es anders nicht sein kann

			
						?>
							</select> 
							<br>
							<input type="submit" name="absenden" value="Bearbeiten">
						</form>
					</center>
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
