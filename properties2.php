<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('connect.php');
$user = $_SESSION['user'];
$prop_id = $_SESSION['prop_id'];
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Promenade Virtual Tours</title>

    <link href="/firestrike/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="/firestrike/bootstrap/css/jumbotron.css" rel="stylesheet">
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
			  <a class="navbar-brand" href="home.php">PromenadeVT</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="dashboard.php">Dashboard</a></li>
					<li class="active"><a href="properties.php">My Properties</a></li>
					<li><a href="settings.php">Settings</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li style="color:white"><?php echo "User: $user"; ?></li>
				</ul>
			</div><!--/.nav-collapse -->
		  </div>
		</div>
		
		<div class="jumbotron">
			<div class="container">
				<h1>Specific Property</h1>
				<p>This page will show a chosen property, probably the webGL and provide the edit button</p>
			</div>
		</div>
		
		<?php
		$query = "SELECT idRoom, name, roomURL FROM Room Where idProperty = $prop_id";
		$result = mysqli_query($dblink, $query);
		?>
		
		<div class="container">
			<table class="table">
				<thead>
					<th>Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<?php
					while ($rows = mysqli_fetch_array($result))
					{
						$room_id = $rows['idRoom'];
						$room_name = $rows['name'];
						$room_url = $rows['roomURL'];
						
						echo "<td>$room_name</td>\n";
						echo "<td>\n";
						echo "  <button type='button' class='btn btn-default btn-lg' data-toggle='modal' data-target='#modal-edit'>\n";
						echo "    <span class='glyphicon glyphicon-pencil'></span>\n";
						echo "  </button>\n";
						//Edit Modal
						echo "  <div class='modal fade' id='modal-edit' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
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
											//Probably going to need to do something with connections here
						echo "          </div>\n";
						echo "          <div class='modal-footer'>\n";
						echo "            <button type='button' class='btn btn-default' data-dismiss='modalCancel</button>\n";
						echo "			  <button type='button' class='btn btn-primary'>Update</button>\n";
						echo "          </div>\n";
						echo "        </form>\n";
						echo "      </div>\n";
						echo "    </div>\n";
						echo "  </div>\n";
						//Edit Modal -- End
						
						echo "</td>\n";
						echo "<td>\n";
						echo "<td>\n"
						echo "  <button type='button' class='btn btn-default btn-lg' data-toggle='modal' data-target='#modal-delete'>\n";
						echo "    <span class='glyphicon glyphicon-remove'></span>\n";
						echo "  </button>\n";
						//Delete Modal
						echo "  <div class='modal fade' id='modal-delete' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
						echo "    <div class='modal-dialog'>\n";
						echo "      <div class='modal-content'>\n";
						echo "        <div class='modal-header'>\n";
						echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
						echo "          <h4 class='modal-title' id='myModalLabel'>Delete Room</h4>\n";
						echo "        </div>\n";
						echo "        <form name='room_delete' method='post' action='room_del.php'>\n";
						echo "          <div class='modal-body'>\n";
						echo "            <p>Are you sure you want to delete $room_name from this property?</p>\n";
						echo "          </div>\n";
						echo "          <div class='modal-footer'>\n";
						echo "            <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>\n";
						echo "			  <button type='button' class='btn btn-primary'>Yes</button>\n";
						echo "          </div>\n";
						echo "        </form>\n";
						echo "      </div>\n";
						echo "    </div>\n";
						echo "  </div>\n";
						//Delete Modal -- End
						echo "</td>\n";
					}
					?>
				</tbody>
			</table>	
		</div>
		
      <footer>
        <p>&copy; MMMadScientists 2014</p>
      </footer>
    </div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="/firestrike/bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/firestrike/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>