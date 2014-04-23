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
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li style="color:white"><?php echo "Welcome $user"; ?></li>
					<a class="btn btn-logout" href="logout.php">Logout</a>
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

			<p>	
				<button type='button' class='btn btn-default btn-lg' data-toggle='modal' data-target='#modal-add'>
					<span class='glyphicon glyphicon-plus'></span>
				</button>
				Add A New Property
			</p>

			<!-- Add Model -->
			<?php
				echo "  <div class='modal fade' id='modal-add' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
				echo "    <div class='modal-dialog'>\n";
				echo "      <div class='modal-content'>\n";
				echo "        <div class='modal-header'>\n";
				echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
				echo "          <h4 class='modal-title' id='myModalLabel'>Add a New Property</h4>\n";
				echo "        </div>\n";
				echo "        <form name='property_add' method='post' action='property_add.php'>\n";
				echo "          <div class='modal-body'>\n";
				echo "            <label for='new_address'>Property Address:</label>\n";
				echo "       	    <input type='text' name='new_address' id='new_address' size='40' required>\n";
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
			?>


			<table class="table">
				<thead>
					<th>Go To</th>
					<th>Address</th>
					<th>Get Embed Script</th>
					<th>Edit</th>
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
						// GO Button
						echo "<td>\n";
						echo "  <form name='properties' method='post' action='rooms.php'>\n";
						echo "    <input type='hidden' id='prop_id' name='prop_id' value='$prop_id'>\n";
						echo "    <input type='hidden' id='address' name='address' value='$address'>\n";
						echo "    <input type='hidden' id='houseURL' name='houseURL' value='$house_url'>\n";
						echo "    <button type='submit' class='btn btn-success'>Go!</button>\n";
						echo "  </form>\n";
						echo "</td>\n";
						echo "<td>$address</td>\n";

						// Get Embed Code Button
						echo "<td>\n";
						echo "  <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#modal-embed_code".$prop_id."'>\n";
						echo "    <span class='glyphicon glyphicon-floppy-disk'></span>\n";
						echo "  </button>\n";
						//Get Embed Code Modal
						echo "  <div class='modal fade' id='modal-embed_code".$prop_id."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
						echo "    <div class='modal-dialog modal-lg'>\n";
						echo "      <div class='modal-content'>\n";
						echo "        <div class='modal-header'>\n";
						echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
						echo "          <h4 class='modal-title' id='myModalLabel'>Here Is Your Embed Code!</h4>\n";
						echo "        </div>\n";
						echo "          <div class='modal-body'>\n";
						echo "            <strong>This script will allow you to display your property tour on your website!</strong>\n";
						echo "            <br/>\n";
					 echo "            <br/>\n";
						$prop_tour = "http://54.186.153.0/API/embed_js.php?i=".$prop_id."&w=720&h=480";
						echo "            &ltscript&gt\n";
						echo "												<br/>\n";
						echo "              document.write(\"&lt\\x3Cscript src='".$prop_tour."' &gt&lt\\x3C/script&gt\");\n";
						echo "												<br/>\n";
						echo "            &lt/script&gt\n";
						echo "          </div>\n";
						echo "          <div class='modal-footer'>\n";
						echo "            <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>\n";
						echo "          </div>\n";
						echo "      </div>\n";
						echo "    </div>\n";
						echo "  </div>\n";
						//Edit Modal -- End
						echo "</td>\n";
						
						// Edit Button
						echo "<td>\n";
						echo "  <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#modal-edit".$prop_id."'>\n";
						echo "    <span class='glyphicon glyphicon-pencil'></span>\n";
						echo "  </button>\n";
						//Edit Modal
						echo "  <div class='modal fade' id='modal-edit".$prop_id."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>\n";
						echo "    <div class='modal-dialog'>\n";
						echo "      <div class='modal-content'>\n";
						echo "        <div class='modal-header'>\n";
						echo "          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>\n";
						echo "          <h4 class='modal-title' id='myModalLabel'>Edit Property Name</h4>\n";
						echo "        </div>\n";
						echo "        <form name='prop_edit' method='post' action='property_update.php'>\n";
						echo "          <div class='modal-body'>\n";
						echo "            <input type='hidden' name='prop_id' id='prop_id' value='$prop_id'>\n";
						echo "            <label for='address'>Name:</label>\n";
						echo "       	    <input type='text' name='address' id='address' value='$address' size='15'>\n";
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

						// Delete Button
						echo "<td>\n";
						echo "  <button type='button' class='btn btn-default btn-md' data-toggle='modal' data-target='#modal-delete".$prop_id."'>\n";
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
						echo "        <form name='prop_delete' method='post' action='property_del.php'>\n";
						echo "          <div class='modal-body'>\n";
						echo "            <input type='hidden' name='prop_id' id='prop_id' value='$prop_id'>\n";
						echo "            <p>Are you sure you want to delete $address from your profile?</p>\n";
						echo "          </div>\n";
						echo "          <div class='modal-footer'>\n";
						echo "            <button type='button' class='btn btn-default' data-dismiss='modal'>No</button>\n";
						echo "			         <button type='submit' class='btn btn-primary'>Yes</button>\n";
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