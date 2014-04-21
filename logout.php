<?php
	session_start();
	include('internal/connect.php');
	$refering_page = $_SERVER['HTTP_REFERER'];
	
	$_SESSION = array();
 session_destroy();
	
	header("location:home.php");
?>