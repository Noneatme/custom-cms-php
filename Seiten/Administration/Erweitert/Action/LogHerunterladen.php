<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<?php
			$userObject = unserialize($_SESSION['object']);
			$userObject->checkIfUserIsAdministrator();

			// User
			$log			= $_POST['LogAuswaehlen'];
			
			// Log
			$GLOBALS["system"]->logger->outputLog("[SYSADMIN] Log '$log' wurde heruntergeladen - ".$userObject->getFullName());
			
			
			$folder	  	= $GLOBALS["system"]->logger->logFolder;
			$file		= $folder.$log;

			
			if($_POST['absenden'] == "Log betrachten")
			{
				echo(str_replace(array("\r","\n",'\r','\n'), "</br>", file_get_contents($file)));
			}
			// Deaktiviert da Einbrecher sonst die Logs loeschen koennen
			/*
			elseif($_POST['absenden'] == "Log löschen")
			{
				if(is_file($file))
				{
					if(is_readable($file))
					{
						error_reporting(E_ALL);
						$bool = @unlink(realpath($file));
						echo("Log wurde gel&ouml;scht. ".$bool);
						print_r(error_get_last());
					}
				}
				else
				{
					echo("Log existiert nicht!");
				}
			}
			*/
			else
			{
				ob_clean();
				header('Content-type: application/sql');
				header('Content-Disposition: inline; filename="' . $log . '"');
				header('Content-Transfer-Encoding: binary');
				header('Content-Length: ' . filesize($file));
				header('Accept-Ranges: bytes');
				@readfile($file);
				
				exit(0);
			}
			
		?>
		</div>
	</body>
</html>
