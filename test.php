<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php 
include('connect.php');
?>
  <head>
    <title>PHP Output</title>
    <meta http-equiv="content-type"
        content="text/html; charset=utf-8"/>
  </head>
<body> 
	Successfully Connected to AWS Database!
	</br>
	<p>Proof:</p>
<?php
$query = "SELECT idRoom, name from Room";
$result = mysqli_query($dblink, $query);
while ($rooms = mysqli_fetch_array($result))
{
	echo "Room Name: ".$rooms['name'];
	echo "<br/>";
}

?>
</body>
</html>