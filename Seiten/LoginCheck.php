<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 

			
		<?php
			/* 	
				===================================================
				Name: LoginCheck.php
				Authoren: Jonas Barascu & Elisabeth Krenn
				Version: 1.0.x
				Beschreibung: Klasse zum Management der Benutzer
				===================================================
			*/

			require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cUser.php");
			
			$system = $GLOBALS["system"];

			
			$sucess		= false;
			

			if(isset($_POST["name"]))
			{
				$username 	= $_POST["name"];
				$password	= $_POST["password"];
			
				$userObject = new cUser($username, $password);
				$userObject->Login();
				
				if(($userObject->id) && (isset($username)) && (isset($password)))
				{
					
					$GLOBALS["system"]->logger->outputLog("[BENUTZER] Benutzer hat sich eingeloggt - ".$userObject->getFullName());
					$sucess = true;
					
					if(!session_id())
					{
						session_start();
					}
					$_SESSION['object'] = serialize($userObject);
				}
			}
		?>
		<div id="background">
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php 
				include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; 
			
			
				if($sucess == true)
				{
					include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration.php";
				}
				else
				{
					include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Hauptseite.php";
				}
			
			?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
				<p class="mainTextDoidSans">
					<?php
						if($sucess == false)
						{
							$GLOBALS["system"]->logger->outputLog("[BENUTZER] IP [".$_SERVER["REMOTE_ADDR"]."] hat versucht sich in den Account '$username' mit dem Passwort '$password' einzuloggen");
									
							echo("Sie konnten nicht eingeloggt werden.<br>Bitte ueberpruefen Sie ob Sie Ihre Daten korrekt eingegeben haben, und versuchen Sie es erneut.");
						}
						else
						{
							
							echo("Sie wurden erfolgreich eingeloggt!</br></br>");
							echo("<b><a href='Administration/Uebersicht.php'>Zur Administration</a></b>");
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
