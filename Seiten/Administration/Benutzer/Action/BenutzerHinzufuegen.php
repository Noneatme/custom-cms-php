<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<div id="background">
			<?php
				$userObject = unserialize($_SESSION['object']);
				$userObject->checkIfUserHasGlobalRight(1);
			?>
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Administration_BenutzerVerwalten.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
				
				<p class="mainTextDoidSans">
					<?php

						require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cUser.php");
					
						$userObject = unserialize($_SESSION['object']);

						// TODO: RECHTE
						
						
						// Post
						if(isset($_POST))
						{
							$anrede 	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["anrede"]);
							
							$vorname	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["vorname"]);
							$nachname	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["nachname"]);
							$plz		= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["plz"]);
							$adresse	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["adresse"]);
							$email		= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["email"]);
							$telefon	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["telefon"]);
							$fax		= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["fax"]);
							
							$accname	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["accname"]);
							$password1	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["password1"]);
							$password2 	= $GLOBALS["system"]->getDatabaseClass()->escapeString($_POST["password2"]);
							
							$admin	 	= false;
							
							if(isset($_POST["administrator"]))
							{
								$admin	= true;
							}
							
							$sucess 	= false;
							
							// Passwort laenge
							
							try
							{
								if(strlen($password1) > 3)
								{
									// Password1 == Password2
									if($password1 == $password2)
									{
										
										if((strlen($vorname) >= 3) && (strlen($nachname) >= 3) && (strlen($accname) >= 3))
										{

											// Benutzer Anlegen
											$newuser	= new cUser($accname, $password1);
											
											if(isset($newuser))
											{
												// Daten setzen
												$newuser->vorname	= $vorname;
												$newuser->nachname	= $nachname;
												
												$newuser->plz		= $plz;
												$newuser->adresse	= $adresse;
												$newuser->telefon	= $telefon;
												
												$newuser->fax		= $fax;
												$newuser->email		= $email;
												$newuser->anrede	= $anrede;
												
												
												// Registrieren
												$result = $newuser->register();
												
												if($admin == true)
												{
													$newuser->login();
													$newuser->setAdministrator();
												}

												$sucess	= $result;
											}
											
										}
										else
										{
											echo("<br>Es wurde nicht alle Pflichtfelder ausgef&uuml;llt. <br><br>Bitte gehen Sie eine Seite zur&uuml;ck und versuchen Sie es erneut.");
										}
										
									}
									else
									{
										echo("<br>Die eingegeben Passw&ouml;rter stimmen nicht &uuml;berein. <br><br>Bitte gehen Sie eine Seite zur&uuml;ck und versuchen Sie es erneut.");
									}
								}
								else
								{
									echo("<br>Das Passwort muss mindestens 4 Zeichen beinhalten. <br><br>Bitte gehen Sie eine Seite zur&uuml;ck und versuchen Sie es erneut.");
								}
							}
							catch(Exception $ex)
							{
								echo("<br>Ein interner Fehler ist aufgetreten. <br><br>Bitte gehen Sie eine Seite zur&uuml;ck und versuchen Sie es erneut. Eventuell existiert der Benutzer bereits.");
							}
	
							if($sucess == true)
							{
								$GLOBALS["system"]->logger->outputLog("[ADMIN_BENUTZER] Benutzer '$accname' wurde angelegt - ".$userObject->getFullName());
								echo("<br>Der Benutzer wurde erfolgreich angelegt.<br><br>Bitte beachten Sie, dass dieser Benutzer noch keine Rechte besitzt.<br>Um einen Benutzer Rechte zu geben, klicken Sie bitte auf die Schaltfl&auml;che 'Benutzer rechte geben'.");
								include $_SERVER['DOCUMENT_ROOT']."/Home/Design/BackOnePage.php";
							}
							else
							{
								echo("<br>Ein interner Fehler ist aufgetreten. <br><br>Bitte gehen Sie eine Seite zur&uuml;ck und versuchen Sie es erneut. Eventuell existiert der Benutzer bereits.");
							
							}
						}
					?>

				</p>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>