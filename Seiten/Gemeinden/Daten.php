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
						
							$result	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT * FROM tblgemeinde WHERE GemID = '$gemeinde_id';");
						
							if($result)
							{
								$row = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result);
								
								echo("<b>Gemeinde: ".$row[1]." </b></br>");
								echo("<u>Kontaktdaten:</u></br></br>");
								
								echo("Gemeinde ".$row[1]."</br>");
								echo("Adresse: ".$row[2]."</br>");
								echo("Telefon: ".$row[3]."</br>");
								echo("Fax: ".$row[4]."</br>");
								echo("</br></ht></br><b><u>Sonstige Gemeindeinformationen:</u></b></br></br>");
								
								$val = str_replace(array("\r","\n",'\r','\n'), "", $row[5]);
								echo($val);
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