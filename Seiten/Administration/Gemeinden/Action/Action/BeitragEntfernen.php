<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php			
				require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cGemeinde.php");
				
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGemeindeRight(2);
				
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
								
							Hier k&ouml;nnen Sie einen Beitrag f&uuml;r entfernen.<br>
							<u>Bitte seien Sie vorsichtig: Diese Aktion kann nicht mehr R&uuml;ckg&auml;ngig gemacht werden!</u><br><br>
							<center>
								<form method="post" action="Action/BeitragEntfernen.php">
									<p class="mainTextDoidSans">
										<select name="BeitragEntfernen" size="10" required="true">
											<?php
												$neuigkeiten = $gemeinde->getNeuigkeiten();
												
												foreach(array_keys((array) $neuigkeiten) as $key)
												{
													if(isset($neuigkeiten[$key][0]))
													{
														$name = "Titel: ".$neuigkeiten[$key][0]." (Vom ".$neuigkeiten[$key][1].")";
														echo("<option value='".$key."'>".$name."</option>");
													}
												}
											?>
										
										</select>
										</br>
										<input type="submit" name="absenden" value="Beitrag l&ouml;schen" onclick="return confirm('Sind sie sicher, dass Sie diesen Beitrag l&ouml;schen m&ouml;chten?');">
										<input type="submit" name="absenden" value="Beitrag bearbeiten">
									</p>
								</form>	
							</center>
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