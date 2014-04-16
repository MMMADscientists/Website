<!DOCTYPE html>
<html lang="en">
<?php
include('connect.php');
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
			<div class="navbar-collapse collapse">
			  <form class="navbar-form navbar-right" name="login" method="post" action="verify.php">
				<div class="form-group">
				  <input id="username" name="username" type="text" placeholder="Username" class="form-control">
				</div>
				<div class="form-group">
				  <input id="password" name="password" type="password" placeholder="Password" class="form-control">
				</div>
				<button type="submit" class="btn btn-register">Sign in</button>
				<!--Added Register Button Paragraph DL -->
				<button type="register" class="btn btn-register">Register</button>
			  </form>
			  
			</div><!--/.navbar-collapse -->
		  </div>
		</div>
		
		<div class="jumbotron">
			<div class="container">
				<center> <img src='bootstrap/img/globe_logo.png'> </center>
				<center> <h1> <font color=#F2F5F6>Promenade Virtual Tours</font> </h1> </center>
				<center> <p> <font color=#080808>Making A Virtual Tour Of Your House, Simple and Easy</font> </p> <c/enter>
			</div>
		</div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>About</h2>
          <!-- <p>Just a group of three Michael's, a Doug, and an Aaron who are passionate about touring property. They are so passionate that they created this application that allows users to tour houses, apartments, and even mansions. Sadly though, there is a significant lack of firestrikes in the current build and most likely future builds of this application. </p> -->
        	
        	<!--Added This Paragraph DL -->
        	<p>In the world of housing, touring a new place to live can waste large amounts of time and effort.  With Promenade VT, we strive to make that 
        		easier and more convienient for anyone and everyone.  Simply put, with our software, you can create high quality 3D virtual tours of your home
        		to later imbed into your website.  Sign In or Register and get started today!
        	</p>

        </div>
        <div class="col-md-4">
          <h2>FAQ</h2>
          <h4>What does MMMADScientists mean?</h4>
		  <p>Well pretty girl it means Michael Michael Michael Aaron Doug who all happen to be scientists in a computational nature!</p>
		  <h4>Why would I use your app?</h4>
		  <p>Because you'd be dumb not to...</p>
          <p><a class="btn btn-default" href="faq.php" role="button">More &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Contact</h2>
          <p>123 Fake St.</p>
		  <p>Totally Real, 'Murica</p>
		  <p>someemail@email.com</p>
        </div>
      </div>

      <hr>

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