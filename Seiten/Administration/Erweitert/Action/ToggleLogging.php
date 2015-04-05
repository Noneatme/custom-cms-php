<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AdminCheck.php" ?>
		<?php
			$userObject = unserialize($_SESSION['object']);
			$userObject->checkIfUserIsAdministrator();
				
			exit(0);
		?>
		</div>
	</body>
</html>
