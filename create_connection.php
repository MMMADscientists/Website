<?php
	session_start();
	include('internal/connect.php');
	$refering_page = $_SERVER['HTTP_REFERER'];
	$user = $_SESSION['user'];
	$prop_id = $_POST['prop_id_conn'];
	$source_id = $_POST['room_id_conn'];
	$dest_id = $_POST['dest_id'];
	$x_coord = $_POST['x'];
	$y_coord = $_POST['y'];
	$z_coord = $_POST['z'];
	

	//Use this for now cause i'm lazy, soooo lazy
	$query = "INSERT INTO Connection(idSource, idDestination, idProperty, doorX, doorY, doorZ) 
												VALUES ('$source_id', '$dest_id', '$prop_id', '$x_coord', '$y_coord', '$z_coord')";
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