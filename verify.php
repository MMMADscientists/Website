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

//This stuff will protect us from MySQL injection attacks apparently
$user = stripslashes($user);
$pass = stripslashes($pass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);

$query = "Select * FROM User WHERE username = '$user'";
$result = mysqli_query($dblink, $query);

$rows = mysqli_fetch_array($result);

$salt = $rows['salt'];
$encrypted_password = $rows['password'];

$hash = base64_encode(sha1($pass . $salt) . $salt);

$hash = substr($hash,0,45);

if($hash == $rows['password'])
{
	$_SESSION['user'] = $user;
	header("location:properties.php");
}
else
{
	//redirect them to failed login page
	header("location:login_failure.php");
}

?>