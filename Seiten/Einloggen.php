<html xmlns="http://www.w3.org/1999/xhtml">
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
						// Existiert die Session und das Objekt?
						if(isset($_SESSION) && isset($_SESSION['object']))
						{
							// Schon eingeloggt!
							header("Location: ".$_SERVER['DOCUMENT_ROOT']."/Home/index.php");
						}
					
					?>
					Falls Sie einen Benutzeraccount besitzen, k&ouml;nnen Sie sich hier einloggen. </br>
					Geben sie dazu bitte Ihren Benutzernamen und Ihr Passwort ein. </br></br>
					Falls sie Probleme beim Einloggen haben, melden Sie sich bitte bei Ihrem </br>
					Administrator.
				
					</br>
					</br>
					</br>

				</p>
					<form method="post" action="LoginCheck.php">
						<p class="mainTextDoidSans">
							
							Benutzername: 	<br><input type="text" name="name"><br>
							Passwort: 		<br><input type="password" name="password"><br></br>

							<input type="submit" name="absenden">
						</p>
					</form>	
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>