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
					Hier k&ouml;nnen Sie die vorhandenen Protokolle entfernen.<br>
					Klicken Sie hierzu auf ein vorhandenes Protokoll und auf 'Entfernen'.
					<br><br><br>
					<center>
						<form action="Action/ProtokollEntfernen.php" method="POST">
							<select name="Protokoll" size="10" required="true">
								<?php
									$protokolle = scandir($folder);
									foreach($protokolle as $protokoll)
									{
										if(!is_dir($folder.$protokoll))
										{
											echo("<option value='".$protokoll."'>".$protokoll."</option>");
										}
									}
								?>
							</select>
							</br>
							<input type="submit" name="absenden" value="Protokoll entfernen" onclick="return confirm('Sind Sie sicher dass Sie das Protokoll entfernen m&ouml;chten? Dieses Protokoll wird f&ouml;r immer gel&ouml;scht.');">
							
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
