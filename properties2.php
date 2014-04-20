<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('internal/connect.php');
$user = $_SESSION['user'];
$prop_id = $_POST['prop_id'];
$address = $_POST['address'];
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
					<li><a href="settings.php">Settings</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li style="color:white"><?php echo "Welcome $user"; ?></li>
				</ul>
			</div><!--/.nav-collapse -->
		  </div>
		</div>
		
		<div class="jumbotron">
			<div class="container">
				<?php
				echo "<h1> <font color=#F2F5F6> $address </font> </h1>";
				?>

				<!-- Kosler, Why this no worky? -->
				<script src = 'http://54.186.153.0/API/embedjs.php?i=prop_id'></script>

			</div>
		</div>
		
		<?php
		$query = "SELECT idRoom, name, roomURL FROM Room Where idProperty = $prop_id";
		$result = mysqli_query($dblink, $query);
		?>
		
		<div class="container">
			<p>	
				<button type='button' class='btn btn-default btn-lg' data-toggle='modal' data-target='#modal-add'>
					<span class='glyphicon glyphicon-plus'></span>
				</button>
				Add A New Room
			</p>


			<!-- Add Model -->
			<?php
				//Edit Modal
				echo "  <div class='modal fade' id='modal-add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
				echo "    <div class='modal-dialog'>\n";
				echo "      <div class='modal-content'>\n";
				echo "        <div class='modal-header'>\n";
				echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
				echo "          <h4 class='modal-title' id='myModalLabel'>Add a New Room</h4>\n";
				echo "        </div>\n";
				//echo "        <form name='room_update' method='post' action='room_update.php'>\n";
				echo "          <div class='modal-body'>\n";
				//echo "            <input type='hidden' name='room_id' id='room_id' value='$room_id'>\n";
				echo "            <label>Room Name:</label>\n";
				echo "       	  <input type='text' name='room_name' id='room_name' value='$room_name' size='15'>\n";
				echo "			  <br>";
				echo "			  <input type='file' name='myFile'>";
									//Probably going to need to do something with connections here
				echo "          </div>\n";
				echo "          <div class='modal-footer'>\n";
				echo "            <button type='button' class='btn btn-default' data-dismiss='modalCancel>Cancel</button>\n";
				echo "			  <button type='submit' class='btn btn-primary'>Update</button>\n";
				echo "          </div>\n";
				//echo "        </form>\n";
				echo "      </div>\n";
				echo "    </div>\n";
				echo "  </div>\n";
				//Edit Modal -- End
			?>





			<table class="table">
				<thead>
					<th>Name</th>
					<th>Edit</th>
					<th> </th>
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
						echo "            <button type='button' class='btn btn-default' data-dismiss='modalCancel>Cancel</button>\n";
						echo "			  <button type='submit' class='btn btn-primary'>Update</button>\n";
						echo "          </div>\n";
						echo "        </form>\n";
						echo "      </div>\n";
						echo "    </div>\n";
						echo "  </div>\n";
						//Edit Modal -- End
						
						echo "</td>\n";
						echo "<td>\n";
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
		</div>
		
      <footer>
        <p>&copy; MMMadScientists 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>