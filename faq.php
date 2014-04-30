<!DOCTYPE html>
<html lang="en">
<?php
include('internal/connect.php');
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
			<div class="navbar-collapse collapse">
			  <form class="navbar-form navbar-right" name="login" method="post" action="verify.php">
				<div class="form-group">
				  <input id="username" name="username" type="text" placeholder="Username" class="form-control">
				</div>
				<div class="form-group">
				  <input id="password" name="password" type="password" placeholder="Password" class="form-control">
				</div>
				<button type="submit" class="btn btn-register">Sign in</button>
				<a class="btn btn-register" href="register.php">Register</a>
			  </form>
			</div><!--/.navbar-collapse -->
		  </div>
		</div>
		
		<div class="jumbotron">
			<div class="container">
				<h1>FAQ</h1>
				<p>The questions you always wanted answered about Promenade Virtual Tours.</p>
			</div>
		</div>
		<div class="container">
		  <h4>How can I add photos of my property?</h4>
		  <p>Inside the Android App you will be able to upload Photospheres to our servers.</p>
		  <br/>
		  <h4>How do I connect rooms in my tour together?</h4>
		  <p>BInside the properties page, each room has a button to create connections between rooms.</p>
		  <br/>
		  <h4>My Photospheres are coming out poorly. Is there a better way to take them?</h4>
		  <p>We have found using a tripod with a phone mount is the best way to take high quality Photospheres. We recommend this <a href='http://www.amazon.com/Professional-Panasonic-Camcorders-MicroFiber-Cleaning/dp/B002ONSZPI/ref=sr_1_1?ie=UTF8&qid=1392239129&sr=8-1&keywords=Professional+72-inch+TRIPOD+FOR+All'>Tripod</a> and this <a src='http://www.amazon.com/ChargerCity-Exclusive-Adjustment-Easy-Adjust-Smartphone/dp/B008VI7ORA/ref=sr_1_2?s=wireless&ie=UTF8&qid=1391977801&sr=1-2&keywords=tripod+mount'>Phone Mount</a></p>
		  <br/>
		  <h4>Can I add these tours to my website?</h4>
		  <p>Of course you can! The properties listing will have a button that will bring up an embed link for you to use.</p>
		  <br/>
		  <h4>Where can I find the Android Application?</h4>
		  <p>To be announced...</p>
		  <br/>
    <footer>
      <p>&copy; Promenade Virtual Tours 2014</p>
    </footer>
  <div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>