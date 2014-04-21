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
				<p>The sexiest and laziest answers to your frequently asked questions!</p>
			</div>
		</div>
		<div class="container">
				<h4>What does MMMADScientists mean?</h4>
		  <p>Well pretty girl it means Michael Michael Michael Aaron Doug who all happen to be scientists in a computational nature!</p>
				<br/>
		  <h4>Why would I use your app?</h4>
		  <p>Because you'd be dumb not to...</p>
				<br/>
				<h4>My Photospheres are coming out all crazy! Why?</h4>
				<p>Probably because you suck at taking photos.</p>
				<br/>
				<h4>Can I add these tours to my website?</h4>
				<p>Of course you can! Within a property's page you will find <strong>some sort of method we decided to use</strong> for you to implement your tours directly to your site!</p>
				<br/>
				<h4>Why do you have so many exclamation marks in your answer?!</h4>
				<p>Because this is exciting!</p>
				<br/>
    <footer>
      <p>&copy; MMMadScientists 2014</p>
    </footer>
  <div> <!-- /container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>