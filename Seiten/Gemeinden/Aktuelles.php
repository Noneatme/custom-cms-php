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
							$result	= $GLOBALS["system"]->getDatabaseClass()->query("SELECT Titel, Datum, Inhalt FROM tblgemeindeneuigkeiten WHERE GemeindeID = '$gemeinde_id';");
							
							$count = 0;
								
							if($result)
							{
								while($row = $GLOBALS["system"]->getDatabaseClass()->fetchRow($result))
								{
									if($count < 10)
									{
										$val = str_replace(array("\r","\n",'\r','\n'), "", $row[2]);
										echo("<u><b>".$row[1]." - ".$row[0]."</b></u></br></br>");
										echo($val);
										echo("</br></br></br>");
									
										$count = $count+1;
									}
								}

							}
							
							
							if($count == 0)
							{
								echo("<br>Willkommen auf der Neuigkeitenseite der Gemeinde.</br></br>Es wurden keine aktuellen Neuigkeiten gefunden.</br>");
							}
							else
							{
								echo("</br>(Es werden maximal 10 Nachrichten gezeigt.)");
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