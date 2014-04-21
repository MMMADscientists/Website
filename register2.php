<?php
/*
*
*This page verifies the login information and
*sends the user to their profile page
*
*/
session_start();
include('internal/connect.php');
//Gets the inputted username and password
$user = $_POST['username'];
$pass = $_POST['password'];
$email = $_POST['email'];

//This stuff will protect us from MySQL injection attacks apparently
$user = stripslashes($user);
$pass = stripslashes($pass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);


$check_query = "SELECT username FROM User";
$check_result = mysqli_query($dblink, $check_query);
while($rows = mysqli_fetch_array($check_result))
{
	$used_name = $rows['username'];
	$used_email = $rows['email'];
	
	if($user == $used_name || $email == $used_email)
	{
		header("location:register_failure.php");
	}
}

$salt = sha1(rand());
$salt = substr($salt, 0, 10);
$hash = base64_encode(sha1($pass . $salt) . $salt);

$hash = substr($hash,0,45);

$query = "INSERT INTO User(username, password, email, salt) VALUES('$user', '$hash', '$email', '$salt')";
$result = mysqli_query($dblink, $query);

if (!$result) 
{
	echo mysqli_errno($dblink) . ": " . mysqli_error($dblink). "\n";
	$message  = 'Invalid query: ' . mysqli_error($dblink) . "<br/>\n";
	$message .= 'Whole query: ' . $query;
	die($message);
}

header("location:register_success.php");

?>