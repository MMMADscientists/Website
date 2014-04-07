<?php
session_start();
$user = $_SESSION['user'];

//Check to see if the Session was correctly built, if it isnt tell us.
if(!session_is_registered($user))
{
	header("location:session_failure.php");
}
else
{
	header("location:profile.php");
}
?>