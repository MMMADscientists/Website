<?php
session_start();
include('internal/connect.php');
$refering_page = $_SERVER['HTTP_REFERER'];
$user = $_SESSION['user'];
$address = $_POST['new_address'];


//Use this for now cause i'm lazy, soooo lazy
$query = "INSERT INTO Property(address, username) VALUES ('$address', '$user')";
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