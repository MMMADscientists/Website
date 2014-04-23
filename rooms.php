<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('internal/connect.php');
$user = $_SESSION['user'];
$prop_id = $_POST['prop_id'];
$address = $_POST['address'];
$house_url = $_POST['houseURL'];
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
					<li class="active"><a href="properties.php">My Properties</a></li>
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
				<?php
				
				if($house_url)
					echo "<img src='$house_url' width='920' height='350'>\n";
					
				echo "<h1> <font color=#F2F5F6> $address </font> </h1>\n";

				//<!-- Kosler, Why this no worky? -->
				//echo "<script src = 'http://54.186.153.0/API/embed_js.php?i=$prop_id'></script>\n";
				?>

			</div>
		</div>
		
		<?php
		$query = "SELECT * FROM Room WHERE idProperty='$prop_id'";
		$result = mysqli_query($dblink, $query);
		if (!$result) 
		{
		echo mysqli_errno($dblink) . ": " . mysqli_error($dblink). "\n";
		$message  = 'Invalid query: ' . mysqli_error($dblink) . "<br/>\n";
		$message .= 'Whole query: ' . $query;
		die($message);
		}
		?>
		
		<div class="container">
			<p>	
				<?php
				echo "<form name='tour' method='post' action='tour.php'>\n";
				// Add New Room Button
				echo "<button type='button' class='btn btn-default btn-lg' data-toggle='modal' data-target='#modal-add'>\n";
				echo"	<span class='glyphicon glyphicon-plus'></span>\n";
				echo"</button>\n";
				echo"Add A New Room\n";
				
				echo"&nbsp &nbsp &nbsp\n";

				// Take Tour Button
				echo "		<input type='hidden' name='prop_id' id='prop_id' value='$prop_id'>\n";
				echo "		<input type='hidden' name='address' id='address' value='$address'>\n";
				echo "		<button type='submit' class='btn btn-default btn-lg'><span class='glyphicon glyphicon-play'></span></button>\n";
				echo " Tour\n";
				echo "</form>\n";
				?>
			</p>


			<!-- Add Model -->
			<?php
				echo "  <div class='modal fade' id='modal-add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
				echo "    <div class='modal-dialog'>\n";
				echo "      <div class='modal-content'>\n";
				echo "        <div class='modal-header'>\n";
				echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
				echo "          <h4 class='modal-title' id='myModalLabel'>Add a New Room</h4>\n";
				echo "        </div>\n";
				echo "        <form name='room_update' method='post' action='room_add.php'>\n";
				echo "          <div class='modal-body'>\n";
				echo "            <input type='hidden' name='prop_id' id='prop_id' value='$prop_id'>\n";
				echo "            <label for='room_name'>Room Name:</label>\n";
				echo "       	    <input type='text' name='room_name' id='room_name' size='15' required>\n";
				echo "          </div>\n";
				echo "          <div class='modal-footer'>\n";
				echo "            <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>\n";
				echo "			         <button type='submit' class='btn btn-primary'>Add</button>\n";
				echo "          </div>\n";
				echo "        </form>\n";
				echo "      </div>\n";
				echo "    </div>\n";
				echo "  </div>\n";
				//Add Modal -- End
			?>

			
				
			



			<table class="table">
				<thead>
					<th>Name</th>
					<th>Edit</th>
					<th>Make Connections</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<?php
					while ($rows = mysqli_fetch_array($result))
					{
						$room_id = $rows['idRoom'];
						$room_name = $rows['name'];
						$room_url = $rows['roomURL'];
						
						echo "<tr>\n";
						echo "<td>$room_name</td>\n";
						echo "<td>\n";
						echo "  <button type='button' class='btn btn-default btn-lg' data-toggle='modal' data-target='#modal-edit".$room_id."'>\n";
						echo "    <span class='glyphicon glyphicon-pencil'></span>\n";
						echo "  </button>\n";
						//Edit Modal
						echo "  <div class='modal fade' id='modal-edit".$room_id."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
						echo "    <div class='modal-dialog'>\n";
						echo "      <div class='modal-content'>\n";
						echo "        <div class='modal-header'>\n";
						echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
						echo "          <h4 class='modal-title' id='myModalLabel'>Update Room</h4>\n";
						echo "        </div>\n";
						echo "        <form name='room_update' method='post' action='room_update.php'>\n";
						echo "          <div class='modal-body'>\n";
						echo "            <input type='hidden' name='room_id' id='room_id' value='$room_id'>\n";
						echo "            <label>Name:</label>\n";
						echo "       	  <input type='text' name='room_name' id='room_name' value='$room_name' size='15'>\n";
						echo "          </div>\n";
						echo "          <div class='modal-footer'>\n";
						echo "            <button type='button' class='btn btn-default' data-dismiss='modal'>Cancel</button>\n";
						echo "			         <button type='submit' class='btn btn-primary'>Update</button>\n";
						echo "          </div>\n";
						echo "        </form>\n";
						echo "      </div>\n";
						echo "    </div>\n";
						echo "  </div>\n";
						//Edit Modal -- End
						echo "</td>\n";


						// Make Connections
						echo "<td>\n";
						echo "<form name='room_connection' method='post' action='room_connection.php'>\n";
						echo "		<input type='hidden' name='prop_id' id='prop_id' value='$prop_id'>\n";
						echo "		<input type='hidden' name='room_id' id='room_id' value='$room_id'>\n";
						echo "		<input type='hidden' name='room_name' id='room_name' value='$room_name'>\n";
						echo "		<input type='hidden' name='address' id='address' value='$address'>\n";
						echo "		<button type='submit' class='btn btn-default btn-lg'><span class='glyphicon glyphicon-resize-small'></span></button>\n";
						echo "</form>\n";
						echo "</td>\n";

						echo "<td>\n";
						echo "  <button type='button' class='btn btn-default btn-lg' data-toggle='modal' data-target='#modal-delete".$room_id."'>\n";
						echo "    <span class='glyphicon glyphicon-remove'></span>\n";
						echo "  </button>\n";
						//Delete Modal
						echo "  <div class='modal fade' id='modal-delete".$room_id."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
						echo "    <div class='modal-dialog'>\n";
						echo "      <div class='modal-content'>\n";
						echo "        <div class='modal-header'>\n";
						echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
						echo "          <h4 class='modal-title' id='myModalLabel'>Delete Room</h4>\n";
						echo "        </div>\n";
						echo "        <form name='room_delete' method='post' action='room_del.php'>\n";
						echo "          <div class='modal-body'>\n";
						echo "            <input type='hidden' name='room_id' id='room_id' value='$room_id'>\n";
						echo "            <p>Are you sure you want to delete $room_name from this property?</p>\n";
						echo "          </div>\n";
						echo "          <div class='modal-footer'>\n";
						echo "            <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>\n";
						echo "			  <button type='submit' class='btn btn-primary'>Yes</button>\n";
						echo "          </div>\n";
						echo "        </form>\n";
						echo "      </div>\n";
						echo "    </div>\n";
						echo "  </div>\n";
						//Delete Modal -- End
						echo "</td>\n";
						echo "</tr>\n";
					}
					?>

					<tr>
					
					</tr>


				</tbody>
			</table>
			<br/>
			<footer>
        		<p>&copy; MMMadScientists 2014</p>
      		</footer>
		</div>
    </div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>