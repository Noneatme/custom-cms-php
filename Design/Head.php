<head>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Internetseite der Propstei Bad Gandersheim</title>
                <link href="/Home/styles.css" rel="stylesheet" type="text/css">
				<link rel="icon" href="/favicon.ico" type="image/x-icon">
				<link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
				<link type="image/x-icon" href="/favicon.ico" />
				
				<!-- UBER GALLERY -->
				<link rel="stylesheet" type="text/css" href="../../../../../../../Home/resources/UberGallery.css" />
				<link rel="stylesheet" type="text/css" href="../../../../../../../Home/resources/colorbox/1/colorbox.css" />
				<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
				<script type="text/javascript">
					$(document).ready(function(){
						$("a[rel='colorbox']").colorbox({maxWidth: "90%", maxHeight: "90%", opacity: ".5"});
					});
					</script>
				<script type="text/javascript" src="../../../../../../../Home/resources/colorbox/jquery.colorbox.js"></script>
				
				<!-- TinyMCE -->
				<script src="/Home/resources/tinymce/tinymce.min.js"></script>
				<script>tinymce.init({
				selector:'textarea',
				width: 775,
				height: 400,
				menubar: false,
				autosave_ask_before_unload: true,
				autosave_unload_msg: "Wollen Sie die Seite wirklich verlassen? Alle ungespeicherten &Auml;nderungen gehen verloren!",
				language: 'de',
				
				});</script>
				<!-- Kein Javascript -->
				<noscript>
					</br></br>
				  Bitte aktivieren Sie JavaScript, um den vollen Funktionsumfang dieser Website in Anspruch nehmen zu können.
				</noscript>
				<?php
					include("Wartungsarbeiten.php");
				?>
</head>


<?php

	require($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/AntiFlood.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/Home/Klassen/cStartup.php");
?>