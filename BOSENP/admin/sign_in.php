<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="DC.Description" lang="fr-FR" content="">
	<meta http-equiv="content-type" content="text/html">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="refresh" content="30">

	<title>Resturent Log In</title>
	<link rel="shortcut icon" href="ico/Food-Waiter.ico">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>
<video autoplay loop muted poster="screenshot.jpg" id="background_video">
    <source src="video/background.mp4" type="video/mp4">
</video>
<section id="#admin_login_page" class="container-fluid">
	<div class="row">
	  <div class="col-md-4 "></div>
	  <div class="col-md-4 p-5 shadow-lg rounded login_margin">
	  	<h1 class="text-center">Admin Login</h1>
	  	<form action="/action_page.php">
		    <div class="form-group">
		      <label for="email">Email:</label>
		      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
		    </div>
		    <div class="form-group">
		      <label for="pwd">Password:</label>
		      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
		    </div>
		    <div class="form-check">
		      <label class="form-check-label">
		        <input class="form-check-input" type="checkbox" name="remember"> Remember me
		      </label>
		    </div>
		    <button type="submit" class="btn btn-primary">Login</button>
		 </form>
	  </div>
	  <div class="col-md-4 float-md-right float-sm-right">
			  <button id="myBtn" class="p-2 float-md-right float-sm-right font-size border border-0 rounded" onclick="myFunction()">Pause Video</button>
	  </div>
	</div>  
</section>
<section class="container-fluid">

</section>



<script>
	var video = document.getElementById("background_video");
	var btn = document.getElementById("myBtn");

	function myFunction() {
	  if (video.paused) {
	    video.play();
	    btn.innerHTML = "Pause";
	  } else {
	    video.pause();
	    btn.innerHTML = "Play";
	  }
	}
</script>

</body>
</html>