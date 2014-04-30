<?php
	session_start();
	include('internal/connect.php');
	$refering_page = $_SERVER['HTTP_REFERER'];
	$user = $_SESSION['user'];
	$name = $_POST['room_name'];
 $prop_id = $_POST['prop_id'];

	//Use this for now cause i'm lazy, soooo lazy
	$query = "INSERT INTO Room(name, idProperty) VALUES ('$name', '$prop_id')";
	$result = mysqli_query($dblink, $query);

	if (!$result) 
	{
		echo mysqli_errno($dblink) . ": " . mysqli_error($dblink). "\n";
		$message  = 'Invalid query: ' . mysqli_error($dblink) . "<br/>\n";
		$message .= 'Whole query: ' . $query;
		die($message);
	}

	header("location:rooms.php");
?>