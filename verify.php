<?php
/*
*
*This page verifies the login information and
*sends the user to their profile page
*
*/
session_start();
include('connect.php');
//Gets the inputted username and password
$user = $_POST['username'];
$pass = $_POST['password'];

//This stuff will protect us from MySQL injection attacks apparently
$user = stripslashes($user);
$pass = stripslashes($pass);
$user = mysql_real_escape_string($user);
$pass = mysql_real_escape_string($pass);


//Now check if the user/pass are in table and match up
$query = "SELECT * FROM User WHERE username='$user' and password='$pass'";
$result = mysqli_query($dblink, $query);
$count = mysqli_num_rows($result);

if($count == 1)
{
	$_SESSION['user'] = $user;
	$_SESSION['pass'] = $pass;
	header("location:dashboard.php");
}
else
{
	//redirect them to failed login page
	header("location:login_failure.php");
	
}


?>