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
					var prop_tour = "http://54.186.153.0/API/embed_js.php?i="+prop_id+"&w=1120&h=480";
					console.log(prop_tour);
					document.write("<\x3Cscript src='" + prop_tour + "'><\x3C/script>");
				</script>

				<?php				
					echo "<h1> <font color=#F2F5F6> $address Tour!</font> </h1>\n";
					echo "<p> <font color=#080808>Click and drag in any direction to see the entire room.</font> </p>";
				?>

			</div>
		</div>
		<div class="container">
				<h4>Want to embed this tour into your website? Just use the code below!</h4>
				<?php
				$prop_tour = "http://54.186.153.0/API/embed_js.php?i=".$prop_id."&w=720&h=480";
						echo "            &ltscript&gt\n";
						echo "												<br/>\n";
						echo "              document.write(\"&lt\\x3Cscript src='".$prop_tour."' &gt&lt\\x3C/script&gt\");\n";
						echo "												<br/>\n";
						echo "            &lt/script&gt\n";
				?>
				<br/>
				<br/>
				<h4>If the tour is showing up as a black screen, please refresh the page.</h4>
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