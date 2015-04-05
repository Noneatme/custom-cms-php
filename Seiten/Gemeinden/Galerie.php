<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<!-- DIV STYLE -->
		
		<div id="background">
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Gemeinde.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/GetGemeindeID.php"; ?> 
			
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
			
					<?php
					
						include $_SERVER['DOCUMENT_ROOT']."/Home/resources/UberGallery.php";
						
						$folder		= "../../Files/Bilder/".$gemeinde_id."/";
							
						
						if(is_dir($folder))
						{
								$gallery = UberGallery::init()->createGallery($folder);
							
						}
						else
						{
							echo("<br>Zurzeit sind keine Bilder von dieser Gemeinde vorhanden. </br>");
						}
					?>

					</br>
					</br>
					</br>

			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_End.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Footer_End.php"; ?> 
		</div>
	</body>
</html>