<?php
session_start();
include("connect.php");
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

header("location:properties.php");
?>