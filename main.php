<?php
	session_start();
	
	if(isset($_SESSION['main']))
	{
		$main = $_SESSION['main'];
	}
	else
	{
		$main = 'location:pages/register_login/login_form.php';
	}
	
	header($main);
?>