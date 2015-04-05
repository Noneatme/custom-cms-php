<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<?php
			$userObject = unserialize($_SESSION['object']);
			$userObject->checkIfUserIsAdministrator();
				
				
			require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/System/cSettings.php");
	
			// http://stackoverflow.com/questions/6750531/using-a-php-file-to-generate-a-mysql-dump
				
			$settingsClass	= new cSettings($_SERVER['DOCUMENT_ROOT']."/Home/settings.ini");
			$row			= $settingsClass->getSettingRow($settingsClass->getCurrentMySQLSetting());
			
			$db_user 	= $row["user"];
			$db_pass 	= $row["password"];
			$db_db		= $row["database"];

			// Log
			$GLOBALS["system"]->logger->outputLog("[SYSADMIN] Datenbankbackup wurde heruntergeladen - ".$userObject->getFullName());
			
			$filename = "backup-" . date("d-m-Y") . ".sql";
			
			$folder	  = $_SERVER['DOCUMENT_ROOT']."/Home/Files/intern/datenbanken/$filename";
			
			$cmd = "mysqldump -u $db_user --password=$db_pass $db_db > $folder";   
			
			exec($cmd);
			
			ob_clean();
			header('Content-type: application/sql');
			header('Content-Disposition: inline; filename="' . $filename . '"');
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: ' . filesize($folder));
			header('Accept-Ranges: bytes');
			@readfile($folder);
			
			exit(0);
		?>
		</div>
	</body>
</html>
