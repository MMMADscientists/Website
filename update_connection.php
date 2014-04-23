<?php
	session_start();
	include('internal/connect.php');
	$refering_page = $_SERVER['HTTP_REFERER'];
	$user = $_SESSION['user'];
	$dest_id = $_POST['dest_id'];
 $conn_id = $_POST['conn_id'];
	
	//Use this for now cause i'm lazy, soooo lazy
	$query = "UPDATE Connection SET idDestination='$dest_id' WHERE idConnection='$conn_id'";
	$result = mysqli_query($dblink, $query);

	if (!$result) 
	{
		echo mysqli_errno($dblink) . ": " . mysqli_error($dblink). "\n";
		$message  = 'Invalid query: ' . mysqli_error($dblink) . "<br/>\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}

	header("location:properties.php");
?>