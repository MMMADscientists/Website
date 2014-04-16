<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include('connect.php');
$user = $_SESSION['user'];
?>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Promenade Virtual Tours</title>

    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="bootstrap/css/jumbotron.css" rel="stylesheet">
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
					<li><a href="properties.php">My Properties</a></li>
					<li class="active"><a href="settings.php">Settings</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li style="color:white"><?php echo "User: $user"; ?></li>
				</ul>
			</div><!--/.nav-collapse -->
		  </div>
		</div>
		
		<div class="jumbotron">
			<div class="container">
				<h1>Settings</h1>
				<p>Reformat me and fill me with settings!</p>
			</div>
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