<!DOCTYPE html>
<html>
<head>
<?php 
	// connection with database
	include 'require/dbconnection.php';
?>
	<title>Staff</title>
<?php
	// head tag
	include 'include/head.php';
	// First nav bar
	include 'include/firstnavbar.php';
	// Second vab bar
	include 'include/secondnavbar.php';
?>
<section class="container">

	<!-- Staff Carousel -->
	<div class="carousel slide" data-ride="carousel" id="staff_carousel">
		<ol class="carousel-indicators">
			<li data-target="#staff_carousel" data-side-to = "0" class="active"></li>
			<li data-target="#staff_carousel" data-side-to = "1"></li>
			<li data-target="#staff_carousel" data-side-to = "2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100 h-100" src="images/staff/staff_slider1.jpg" alt="This is First">
				<div class="carousel-caption d-none d-md-block">
					<h1 >Strong Unity</h1>
					<p >Unity to be real must stand the severest strain without breaking.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100 h-100" src="images/staff/staff_slider2.jpg" alt="This is Second">
				<div class="carousel-caption d-none d-md-block">
					<h1 >Staff Group</h1>
					<p >Whether you think you can, or you think you can’t – you’re right.</p>
				</div>
			</div>
			<div class="carousel-item">
				<img class="d-block w-100 h-100" src="images/staff/staff_slider3.jpg" alt="This is Theird">
				<div class="carousel-caption d-none d-md-block">
					<h1 >Entertainment</h1>
					<p >A am a great friend of public amusements, they keep people from vice.</p>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#staff_carousel" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">previous</span>
		</a>
		<a class="carousel-control-next" href="#staff_carousel" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="big_div_color py-3 my-4">
		<h2 class="text-center">University Administration</h2>
		<div class="d-flex justify-content-around">
			<div id="staff_icon_hidden">
				<img src="images/staff/staff_icon.png" class="rounded-circle img-fluid" alt="staff icon" id="staff_icon">
			</div>
			<div>
				<div class="border border-1 border-dark rounded p-2 my-1 staff_info" id="president_info">
					<h5><a href="office_of_the_president.php">Office of the President</a></h5>
				</div>
				<div class="border border-1 border-dark rounded p-2 my-1 staff_info" id="provost_info">
					<h5><a href="office_of_the_provost.php">Office of the Provost</a></h5>
				</div>
				<div class="border border-1 border-dark rounded p-2 my-1 staff_info" id="board_info">
					<h5><a href="board_of_trustees.php">Board of Trustees</a></h5>
				</div>
			</div>
		</div>
	</div>
	<div class="row justify-content-around">
		<div class="col-md-5 big_div_color m-2">
			<div>
				<img src="images/staff/administrative_icon.png" alt="New Staff icon" class="img-fluid rounded-circle">
			</div>
			<div class="d-flex justify-content-center m-2">
				<h5 class="border border-1 border-dark p-2 staff_info"><a href="administrative_policies.php">Administrative Policies</a></h5>
			</div>
		</div>
		<div class="col-md-5 big_div_color m-2">
			<div>
				<img src="images/staff/new_staff_icon.png" alt="New Staff icon" class="img-fluid rounded-circle">
			</div>
			<div class="d-flex justify-content-center  m-2">
				<h5 class="border border-1 border-dark p-2 staff_info"><a href="staff_wellcome_center.php">Staff welcome Center</a></h5>
			</div>
		</div>
	</div>
</section>

<?php
 	include 'include/footer.php';
?>