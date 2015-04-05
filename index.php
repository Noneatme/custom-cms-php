
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php include "Design/Head.php"; ?> 
	
	<?php
		$_SESSION["GemeindeID"] = 0;
	?>
	<body>
			
		
		<div id="background">
			<?php include "Design/Gemeinden_Start.php"; ?> 
			
			<?php include "Design/Gemeinden_End.php"; ?> 
			
			<?php include "Design/Logo.php"; ?> 
			<?php include "Design/Themes_Start.php"; ?> 
				<?php include "Design/Themen_Hauptseite.php"; ?>
			<?php include "Design/Themes_End.php"; ?> 
			<?php include "Design/Header.php"; ?> 
			<?php include "Design/Main_Start.php"; ?> 
				<?php
					$result = $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblsystem LIMIT 1;");
					$row	= $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
					
					print($row[0]);
				?>

			<?php include "Design/Main_End.php"; ?> 
				
			<?php include "Design/Footer_Start.php"; ?> 
				
			<?php include "Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>