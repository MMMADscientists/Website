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
//Now check if the user/pass are in table and match up
$query = "SELECT * FROM User WHERE username='$user' and password='$pass'";
$result = mysqli_query($dblink, $query);
/*
$salt = '';
while($rows = mysqli_fetch_array($result))
{
	//if(count($rows) == 1)
		$salt = $rows['salt'];
	//else
		//die("There are multiple users with the same name, Please contact customer support!");
}

//hash and salt the password given
$hash = base64_encode(sha1($pass . $salt) . $salt);

$encrypted_query = "SELECT * FROM User WHERE username='$user' and password='$hash'";
$encrypted_result = mysqli_query($dblink, $encrypted_query);
*/
$count = mysqli_num_rows($result);
if($count == 1)
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