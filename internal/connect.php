<?php
$dbbase = 'promenadevt';               
$dbuser = 'awsuser';         // Your MySQL username
$dbpass = 'promenade';     // ...and password
$dbhost = 'promenadevt.cm8ddcjx8fni.us-west-2.rds.amazonaws.com';  // Internal IP for MYSQL Server

// connect to database
$dblink = mysqli_connect($dbhost, $dbuser, $dbpass) 
    or die ("Cannot connect to AWS");

if (!mysqli_set_charset($dblink, 'utf8')) die ("Unable to set database connection encoding");

if (!mysqli_select_db($dblink, $dbbase)) die ("Cannot connect to database");
?>