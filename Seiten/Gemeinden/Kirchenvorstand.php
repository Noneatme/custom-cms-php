<html xmlns="http://www.w3.org/1999/xhtml">
	<body>
		<?php include $_SERVER['DOCUMENT_ROOT']."/Home/Design/Head.php"; ?> 
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
				<p class="mainTextDoidSans">
					<?php
						
							$result	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT Kirchenvorstand, Name FROM tblgemeinde WHERE GemID = '$gemeinde_id';");
						
							if($result)
							{
								$row = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
								
								echo("<b>Gemeinde: ".$row[1]." </b></br></br>");
								echo("<u><b>Aktueller Kirchenvorstand:</b></u></br></hr></br></br>");
								
								if(isset($row[0]) && strlen($row[0]) > 5)
								{
									$val = str_replace(array("\r","\n",'\r','\n'), "", $row[0]);
									echo($val);
								}
								else
								{
									echo("Der Kirchenvorstand ist noch nicht in dieser Gemeinde eingetragen worden.");
								}

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