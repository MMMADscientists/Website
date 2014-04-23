<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('internal/connect.php');
$user = $_SESSION['user'];
$prop_id = $_POST['prop_id'];
$address = $_POST['address'];
$room_name = $_POST['room_name'];
$room_id = $_POST['room_id'];
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Promenade Virtual Tours</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
	<link href="bootstrap/css/jumbotron.css" rel="stylesheet">

	<!-- This Line Makes the Little Tab Icon Show Up -->
	<link rel="shortcut icon" href="bootstrap/img/globe_logo_favicon.ico">

  </head>
  <body>
		<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand" href="home.php"> <img src='bootstrap/img/globe_logo.png' width="30" height="30"> PromenadeVT </a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="properties.php">My Properties</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li style="color:white"><?php echo "Welcome $user\n"; ?></li>
					<a class="btn btn-logout" href="logout.php">Logout</a>
				</ul>
			</div><!--/.nav-collapse -->
		  </div>
		</div>
		
		<div class="jumbotron">
			<div class="container">			
				<script>
					var prop_id = <?php Print($prop_id); ?>;
					var room_id = <?php Print($room_id); ?>;
					var room_tour = "http://54.186.153.0/API/embed_js.php?i="+prop_id+"&room="+room_id+"&w=1120&h=400";
					console.log(room_tour);
					document.write("<\x3Cscript src='" + room_tour + "'><\x3C/script>");
			 	</script>
				
				<script>
					window.addEventListener("propertyCreate", function(e){
					document.getElementById('x').value=e.detail.x;
					document.getElementById('y').value=e.detail.y;
					document.getElementById('z').value=e.detail.z;}
					);
				</script>
				
				<script>
					window.addEventListener("propertyEdit", function(e){
					console.log(e.detail);
					document.getElementById('conn_id').value=e.detail.id;
					document.getElementById('conn_id_delete').value=e.detail.id;});
				</script>

				<?php			
					echo "<h1> <font color=#F2F5F6> $room_name Tour!</font> </h1>\n";
					echo "<p> <font color=#080808>$address</font> </p>";
				?>	
				
			</div>
		</div>
		
		<div class="container">
				<h4>If the room is showing up as a black screen, please refresh the page.                         Other editing instructions are below.</h4>
				<br/>
				<h4>If you want to create a connection with another room, click and hold anywhere in the image then choose a room you want to connect to!</h4>
				<?php
				echo "<form name='create_conn' method='post' action='create_connection.php'>\n";
				echo " <input type='hidden' name='room_id_conn' id='room_id_conn' value='$room_id'>\n";
				echo " <input type='hidden' name='prop_id_conn' id='prop_id_conn' value='$prop_id'>\n";
				echo " <input type='hidden' name='x' id='x' value=''>\n";
				echo " <input type='hidden' name='y' id='y' value=''>\n";
				echo " <input type='hidden' name='z' id='z' value=''>\n";
							
				$query = "SELECT * FROM Room WHERE	idProperty='$prop_id'";
				$result = mysqli_query($dblink, $query);
				echo " <label for='dest_room'>Destination Room:</label>\n";
				echo "  <select name='dest_id' id='dest_id' required>\n";
				echo "   <option value=''/>\n";
				while ($rows = mysqli_fetch_array($result))
				{
					$dest_id = $rows['idRoom'];
					$dest_name = $rows['name'];
					if($dest_id != $room_id)
						echo "  <option value='$dest_id'>$dest_name</option>\n";
				}
				echo "  </select>\n";
				echo "<br/>\n";
				
				echo "<button type='submit' class='btn btn-primary'>Submit</button>\n";
			 echo "</form>\n";
			 ?>
				<br/>
				<h4>If you want to edit a connection just click and hold on a door icon, then choose it's new destination!</h4>

				<?php
				echo "<form name='update_conn' method='post' action='update_connection.php'>\n";

				echo " <input type='hidden' name='conn_id' id='conn_id' value=''>\n";
							
				$query = "SELECT * FROM Room WHERE	idProperty='$prop_id'";
				$result = mysqli_query($dblink, $query);
				echo " <label for='dest_room'>Destination Room:</label>\n";
				echo "  <select name='dest_id' id='dest_id' required>\n";
				echo "   <option value=''/>\n";
				while ($rows = mysqli_fetch_array($result))
				{
					$dest_id = $rows['idRoom'];
					$dest_name = $rows['name'];
					if($dest_id != $room_id)
						echo " <option value='$dest_id'>$dest_name</option>\n";
				}
				echo "  </select>\n";
				echo " <br/>\n";
				
				echo " <button type='submit' class='btn btn-primary'>Submit</button>\n";
			 echo "</form>\n";
			 ?>
				<br/>
				<h4>If you want to delete a connection just click and hold on a door icon, then click the delete button below!</h4>
				<?php
				echo "<form name='delete_conn' method='post' action='delete_connection.php'>\n";
				echo " <input type='hidden' name='conn_id_delete' id='conn_id_delete' value=''>\n";
				echo " <button type='submit' class='btn btn-logout'>Delete</button>\n";
			 echo "</form>\n";
			 ?>
				<br/>
				<footer>
						<p>&copy; MMMadScientists 2014</p>
				</footer>
		</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>