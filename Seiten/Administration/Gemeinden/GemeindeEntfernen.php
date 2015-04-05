<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(7);
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
						In diesem Bereich k&ouml;nnen Sie Gemeinden entfernen.<br><br>
						Klicken Sie auf die Gemeinde, und anschlie&szlig;end auf 'Entfernen', um die Gemeinde endg&uuml;ltig zu entfernen.<br><br>
						
						Hinweis: Dieser Vorgang kann nicht r&uuml;ckg&auml;nig gemacht werden!<br><br>
					<center>
						<form action="Action/GemeindeEntfernen.php" method="POST">
							<select name="GemeindeEntfernen" size="10" required="true">
								<?php
									$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT GemID, Name FROM tblgemeinde ORDER BY Name ASC;");

									while($row = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result))
									{
										$name		= "";
										$id			= (int) $row[0];
										$name		= $row[1];

										echo("<option value='".$row[0]."'>".$name."</option>");
									}
								?>
							</select> 
							<br>
							<input type="submit" name="absenden" value="Entfernen" onclick="return confirm('Sind sie sicher, dass Sie diese Gemeinde entfernen m&ouml;chten?');">
						</form>
					</center>
				</p>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>