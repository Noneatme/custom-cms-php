<?php	
	// Existiert die Session Variable?
	if(!isset($_SESSION['object']))
	{
		// Nein, also keine Rechte
		header("Location: ".$_SERVER['DOCUMENT_ROOT']."/Home/Seiten/KeineRechte.php");
	}
	
	$user = unserialize($_SESSION['object']);
	
	// Admin, hat der User irgendwelche Permissions?
	if($user->hasUserAdminPermissions() != true)
	{
		// Keine Rechte
		header("Location: ".$_SERVER['DOCUMENT_ROOT']."/Home/Seiten/KeineRechte.php");
	}
?>