<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('internal/connect.php');
$user = $_SESSION['user'];
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
				<h1> <img src='bootstrap/img/properties.png' width="150" height="150"> <font color=#F2F5F6>My Properties</font> </h1>
				<p> <font color=#080808>Select A Property To View, Edit, Delete or Add To</font> </p>
			</div>
		</div>
		
		<?php
		$query = "SELECT idProperty, address, houseURL FROM Property WHERE username = '$user'";
		$result = mysqli_query($dblink, $query);
		?>
		
		<div class="container">
			<table class="table">
				<thead>
					<th>Go To</th>
					<th>Address</th>
					<th>Delete</th>
				</thead>
				<tbody>
					<?php
					while ($rows = mysqli_fetch_array($result))
					{
						$prop_id = $rows['idProperty'];
						$address = $rows['address'];
						$house_url = $rows['houseURL'];
						
						echo "<tr>\n";
						echo "<td>\n";
						echo "  <form name='properties' method='post' action='properties2.php'>\n";
						echo "    <input type='hidden' id='prop_id' name='prop_id' value='$prop_id'>\n";
						echo "    <input type='hidden' id='address' name='address' value='$address'>\n";
						echo "    <button type='submit' class='btn btn-success'>Go!</button>\n";
						echo "  </form>\n";
						echo "</td>\n";
						echo "<td>$address</td>\n";
						echo "<td>\n";
						echo "  <button type='button' class='btn btn-default btn-lg' data-toggle='modal' data-target='#modal-delete".$prop_id."'>\n";
						echo "    <span class='glyphicon glyphicon-remove'></span>\n";
						echo "  </button>\n";
						//Delete Modal
						echo "  <div class='modal fade' id='modal-delete".$prop_id."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
						echo "    <div class='modal-dialog'>\n";
						echo "      <div class='modal-content'>\n";
						echo "        <div class='modal-header'>\n";
						echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
						echo "          <h4 class='modal-title' id='myModalLabel'>Delete Property</h4>\n";
						echo "        </div>\n";
						echo "        <form name='room_delete' method='post' action=property_del.php'>\n";
						echo "          <div class='modal-body'>\n";
						echo "            <p>Are you sure you want to delete $address from your profile?</p>\n";
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
						echo "</tr>\n";
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
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>