<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="refresh" content="3;url=../index.php">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 

		
		<div id="background">
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Hauptseite.php"; ?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
				<p class="mainTextDoidSans">
					<?php
						// Falls die Session nicht existiert
						if(!isset($_SESSION))
						{
							header("Location: ".$_SERVER['DOCUMENT_ROOT']."/Home/index.php");
						}
						else
						{
							// Ist ein Benutzerobjekt da?
							if(isset($_SESSION['object']))
							{
								// Ist es unseralisiert?
								if(!is_string($_SESSION['object']))
								{
									// Serialisieren
									$_SESSION['object'] = serialize($_SESSION['object']);
								}
								// Ausloggen
								$name = unserialize($_SESSION['object'])->getFullName();
								$bool = unserialize($_SESSION['object'])->logOut();
								
								// Sucess?
								if($bool)
								{
									$GLOBALS["system"]->logger->outputLog("[BENUTZER] Benutzer hat sich ausgeloggt - ".$name);
									echo("Sie wurden erfolgreich ausgeloggt.");

								}
								else
								{
									echo("Bitte loggen Sie sich ein, bevor Sie sich ausloggen.");
								}
							}
							else
							{
								echo("Bitte loggen Sie sich ein, bevor Sie sich ausloggen.");
							}
						}
					
					?>

					</br>
					</br>
					</br>

				</p>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>