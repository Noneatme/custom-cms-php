<?php
	// Quelle: http://stackoverflow.com/questions/12553606/anti-flood-ddos-in-php
	// Wurde nicht von uns gemacht
	
	if (!isset($_SESSION)) 
	{
		session_start();
	}
	
	if(isset($_SESSION['last_session_request']) && $_SESSION['last_session_request'] > (time() - 2))
	{
		if(empty($_SESSION['last_request_count']))
		{
			$_SESSION['last_request_count'] = 1;
		}
		elseif($_SESSION['last_request_count'] < 5)
		{
			$_SESSION['last_request_count'] = $_SESSION['last_request_count'] + 1;
		}
		elseif($_SESSION['last_request_count'] >= 5)
		{
			header("location: http://www.google.de/");
			exit;
		}
		 
	}
	else
	{
		$_SESSION['last_request_count'] = 1;
	}

	$_SESSION['last_session_request'] = time();
?>