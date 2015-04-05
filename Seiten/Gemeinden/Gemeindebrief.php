
<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
			
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/GetGemeindeID.php"; ?> 
		
		<div id="background">
			<?php
			
					$folder		= $_SERVER['DOCUMENT_ROOT']."/Home/Files/Gemeindebriefe/".$gemeinde_id.".pdf";
					
					
					$filename	= $gemeinde_id.".pdf";
					
					if(is_file($folder))
					{
						ob_clean();
						header('Content-type: application/pdf');
						header('Content-Disposition: inline; filename="' . $filename . '"');
						header('Content-Transfer-Encoding: binary');
						header('Content-Length: ' . filesize($folder));
						header('Accept-Ranges: bytes');
						@readfile($folder);
						
					}

			?>
		
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_Start.php"; ?> 
				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Gemeinden_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Logo.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_Start.php"; ?> 
				<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themen_Gemeinde.php"; ?> 				
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Themes_End.php"; ?> 
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Header.php"; ?> 
					
			<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Main_Start.php"; ?> 
				<p class="mainTextDoidSans">
					<?php
						

					?>
					<br>Es ist kein Gemeindebrief der Gemeinde vorhanden. </br>
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