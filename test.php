<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('internal/DB_Connect.php');
include('internal/DB_Functions.php');

$connection = new DB_Connect;
$connection->connect();

$db = new DB_Functions;

?>
<head> My Testing Area </head>
<body>
	<br/>
	<?php
	$user = $db->getUserByEmailAndPassword('admin', 'admin');
	?>
</body>
</html>