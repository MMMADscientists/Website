<?php
session_start();
include('internal/connect.php');
$refering_page = $_SERVER['HTTP_REFERER'];

$prop_id = $_POST['prop_id'];
$address = $_POST['address'];


//Use this for now cause i'm lazy
$query = "UPDATE Property SET address='$address' WHERE idProperty='$prop_id'";
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