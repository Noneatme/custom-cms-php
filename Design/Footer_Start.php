<div id="Footer">
	<p class="footerText1"> <a href="/Home/Seiten/Impressum.php"> Impressum </a> </p>
	<p class="footerText2"> 
	<?php

		if(isset($_SESSION) && isset($_SESSION['object']))
		{
			echo("<a href='/Home/Seiten/Ausloggen.php'> Ausloggen </a>");

		}
		else
		{
			echo("<a href='/Home/Seiten/Einloggen.php'> Einloggen </a>");
		}
	?></p>
	<?php	
			if(isset($_SESSION['object']))
			{
				$user = unserialize($_SESSION['object']);
				// Admin
				
				if($user->hasUserAdminPermissions() == true)
				{
					echo
					("
						<p class='footerText3'>
							<a href='/Home/Seiten/Administration/Uebersicht.php'> Administration </a>
						</p>
					");
		
				}
			}
	?>