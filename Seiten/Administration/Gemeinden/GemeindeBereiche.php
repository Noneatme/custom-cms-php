<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(8);
				$userObject->checkIfUserHasGlobalRight(14);
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
					Hier k&ouml;nnen Sie neue Unterbereiche f&uuml;r die Gemeinden erstellen und l&ouml;schen.<br>
					Jede Gemeinde, die von den &Auml;nderungen betroffen sind, m&uuml;ssen manuell ge&auml;ndert werden.<br><br>

					<center>
						<b>Gemeindeunterpunkt hinzuf&uuml;gen:</b></br>
						<form action="Action/GemeindepunktHinzufuegen.php" method="POST">
							Ort: <input type="text" name="name" maxlength="35"> 
							<br>
							PLZ: <input type="text" name="plz" maxlength="5"> 
							<br>
							<input type="submit" name="absenden" value="Hinzuf&uuml;gen">
						</form>
						<b>Vorhandenen Gemeindeunterpunkt l&ouml;schen:</b></br>
						<form action="Action/GemeindepunktLoeschen.php" method="POST">
							<select name="plz" size="5">
								<?php
									$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblort ORDER BY Ort ASC;");
												
									if(isset($result))
									{
										while($ort = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result))
										{
											echo("<option value='".$ort[1]."'>".$ort[1]."</option>");
										}
									}
								?>
							</select>
							<br>
							<input type="submit" name="absenden" value="L&ouml;schen" onclick="return confirm('Sind sie sicher, dass Sie diesen Gemeindeunterpunkt entfernen m&ouml;chten?');">
						</form>
					</center>
				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>
