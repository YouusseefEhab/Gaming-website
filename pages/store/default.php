<?php
	session_start();
	unset($_SESSION['search']);
	unset($_SESSION['categories']);
	header('location:storePage.php');
?>