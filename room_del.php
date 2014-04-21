<?php
session_start();
include('internal/connect.php');
$refering_page = $_SERVER['HTTP_REFERER'];

$room_id = $_POST['room_id'];

/*MORE SECURE VERSION FOR DELETING, MAKE IT WORK WHEN WE MOVE THE STUFF TO A SERVER
if(!isset($refering_page)) die ("You are in the wrong place buddy!");
else
{
	$page_path = parse_url($refering_page, PHP_URL_PATH);
	if($page_path != '/properties2.php') die ("You are in the wrong place buddy!");
	else
	{
		$query = "DELETE FROM Room WHERE id='$room_id'";
		$result = mysqli_query($dblink, $query);
		if (!$result) 
		{
			echo mysqli_errno($root_link) . ": " . mysqli_error($root_link). "\n";
			$message  = 'Invalid query: ' . mysqli_error($root_link) . "<br/>\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
	}
}
*/
//Use this for now cause i'm lazy
$query = "DELETE FROM Room WHERE idRoom='$room_id'";
$result = mysqli_query($dblink, $query);
if (!$result) 
{
	echo mysqli_errno($dblink) . ": " . mysqli_error($dblink). "\n";
	$message  = 'Invalid query: ' . mysqli_error($dblink) . "<br/>\n";
	$message .= 'Whole query: ' . $query;
	die($message);
}

$check_query = "Select idSource FROM Connection WHERE idSource='$room_id'";
$check_result = mysqli_query($dblink, $check_query);
$numrows = mysqli_num_rows($check_result);
if($numrows > 0)
{
	$conn_query = "DELETE FROM Connection WHERE idSource='$room_id'";
	$conn_result = mysqli_query($dblink, $query);
	if (!$conn_result) 
	{
		echo mysqli_errno($dblink) . ": " . mysqli_error($dblink). "\n";
		$message  = 'Invalid query: ' . mysqli_error($dblink) . "<br/>\n";
		$message .= 'Whole query: ' . $conn_query;
		die($message);
	}
}

$check_query2 = "Select idDestination FROM Connection WHERE idDestination='$room_id'";
$check_result2 = mysqli_query($dblink, $check_query2);
$numrows2 = mysqli_num_rows($check_result2);
if($numrows2 > 0)
{
	$conn_query2 = "DELETE FROM Connection WHERE idDestination='$room_id'";
	$conn_result2 = mysqli_query($dblink, $query);
	if (!$conn_result) 
	{
		echo mysqli_errno($dblink) . ": " . mysqli_error($dblink). "\n";
		$message  = 'Invalid query: ' . mysqli_error($dblink) . "<br/>\n";
		$message .= 'Whole query: ' . $conn_query2;
		die($message);
	}
}
	
header("location:properties.php");
?>