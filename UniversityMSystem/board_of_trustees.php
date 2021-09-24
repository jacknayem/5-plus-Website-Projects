<!DOCTYPE html>
<html>
<head>
<?php 
	// connection with database
	include 'require/dbconnection.php';
?>
	<title>administrative_policies</title>
<?php
	// head tag
	include 'include/head.php';
	// First nav bar
	include 'include/firstnavbar.php';
	// Second vab bar
	include 'include/secondnavbar.php';
?>
<section class="container">
	<div class="carousel slide" data-ride="carousel" id="staff_welcome_carousel">
		<ol class="carousel-indicators">
			<li data-target="#staff_welcome_carousel" data-side-to="0" class="active"></li>
			<li data-target="#staff_welcome_carousel" data-side-to="1"></li>
			<li data-target="#staff_welcome_carousel" data-side-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="images/staff/Trustee_B_1.JPG" class="d-block h-100 w-100">
				<div class="carousel-caption d-none d-md-block">
					<h1 >Board of Trustees</h1>
					<h3>Heterogeneous BoDs with independent thinking enforce governance, and diversity strengthens creativity</h3>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/staff/Trustee_B_2.JPG" class="d-block h-100 w-100">
				<div class="carousel-caption d-none d-md-block">
					<h1 >Board of Trustees</h1>
					<h3>More often than not, a C.E.O is merely a puppet whose strings are pulled by a board of directors.</h3>
				</div>
			</div>
			<div class="carousel-item">
				<img src="images/staff/Trustee_B_3.JPG" class="d-block h-100 w-100">
				<div class="carousel-caption d-none d-md-block ">
					<h1 >Board of Trustees</h1>
					<h3>if we were 100 percent successful, What would our community look like? What would be different for whom.</h3>
				</div>
			</div>
		</div>
		<a class="carousel-control-prev" href="#staff_welcome_carousel"  role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">previous</span>
		</a>
		<a href="#staff_welcome_carousel" class="carousel-control-next" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</section>
<section class="container">
	<div id="stfmainBody">
		<div class="d-flex flex-row">
		<ul class="nav nav-tabs" role="navigation">
			<li class="nav-item">
				<a href="#home" class="nav-link active" data-toggle="tab" role="tab" aria-controls="home">Home</a>
			</li>
			<li class="nav-item">
				<a href="#news" class="nav-link" data-toggle="tab" role="tab" aria-controls="news">News & Updates</a>
			</li>
			<li class="nav-item">
				<a href="#BordMem" class="nav-link" data-toggle="tab" role="tab" aria-controls="BordMem">Board Members</a>
			</li>
			<li class="nav-item">
				<a href="#contract" class="nav-link" data-toggle="tab" role="tab" aria-controls="contract">Contact</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade show active" id="home" role="tabpanel">
				<div>
					<h4 class="text-center">The Board of Trustees of the Leland Junior University</h4>					
					<p class="text-center">Under the provisions of the Founding Grant, the Board of Trustees is custodian of the endowment and all the properties of Stanford University. The board administers the invested funds, sets the annual budget and determines policies for operation and control of the university. Among the powers given to the trustees by the Founding Grant is the power to appoint a president. The board delegates broad authority to the president to operate the university and to the faculty on certain academic matters..</p>

					<h3 class="text-center">News & Updates</h3>
					<div class="d-flex justify-content-start div_color my-1 p-2">
						<div>
							<p class="m-0"><b>Board of Trustees elects four new members</b></p>
							<small>March 7, 2018</small>
							<p class="read-more">The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.</p>
						</div>
					</div>
					<div class="d-flex justify-content-start div_color my-1 p-2">
						<div>
							<p class="m-0"><b>Campus input sought on investment responsibility principles</b></p>
							<small>March 7, 2018</small>
							<p class="read-more">The Board of Trustees and the campus Advisory Panel on Investment Responsibility and Licensing are asking for the input of the campus community on Stanford’s policies and procedures regarding investment responsibility Lam and Jeffrey E. Stone.The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.</p>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade" id="news" role="tabpanel">
				<div>
					<h3 class="text-center">News &amp; Update</h3>
				</div>

				<div class="d-flex justify-content-start div_color my-1 p-2">
						<div>
							<p class="m-0"><b>Board of Trustees elects four new members</b></p>
							<small>March 7, 2018</small>
							<p class="read-more">The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.</p>
						</div>
					</div>
					<div class="d-flex justify-content-start div_color my-1 p-2">
						<div>
							<p class="m-0"><b>Campus input sought on investment responsibility principles</b></p>
							<small>March 7, 2018</small>
							<p class="read-more">The Board of Trustees and the campus Advisory Panel on Investment Responsibility and Licensing are asking for the input of the campus community on Stanford’s policies and procedures regarding investment responsibility Lam and Jeffrey E. Stone.The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.</p>
						</div>
					</div>

					<div class="d-flex justify-content-start div_color my-1 p-2">
						<div>
							<p class="m-0"><b>Board of Trustees elects four new members</b></p>
							<small>March 7, 2018</small>
							<p class="read-more">The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.</p>
						</div>
					</div>
					<div class="d-flex justify-content-start div_color my-1 p-2">
						<div>
							<p class="m-0"><b>Campus input sought on investment responsibility principles</b></p>
							<small>March 7, 2018</small>
							<p class="read-more">The Board of Trustees and the campus Advisory Panel on Investment Responsibility and Licensing are asking for the input of the campus community on Stanford’s policies and procedures regarding investment responsibility Lam and Jeffrey E. Stone.The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.</p>
						</div>
					</div>
			</div>
			<div class="tab-pane fade" id="BordMem" role="tabpanel">
				<h3 class="text-center">All Board Members</h3>
				<p class="text-center">Stanford requires completion of specific trainings, as well as provides you with a wealth of guides and resources to enhance your career and to remain compliant for the work that your perform at Stamford.</p>
				<div class="row text-white tursteesBordMem my-4" style="background-image: url(images/staff/trusteesboardMember1.JPG);">
					<div class="col-md-6">
						<address>
							Felix J. Bakerbr <br>
							Co-Founder and Managing Partner, <br>
							Baker Brothers Investments, <br>
							New York, NY
						</address>
					</div>
					<div class="col-md-6"></div>
				</div>

				<div class="row text-white tursteesBordMem my-4" style="background-image: url(images/staff/trusteesboardMember2.JPG);">
					<div class="col-md-6"></div>
					<div class="col-md-6 text-right">
						<address>
							Mary T. Barra,<br>Chief Executive Officer,<br>General Motors,<br>Detroit, MI
						</address>
					</div>
				</div>
				<div class="row text-white tursteesBordMem my-4" style="background-image: url(images/staff/trusteesboardMember3.JPG);">
					<div class="col-md-6">
						<address>
							Robert M. Bass,<br>
							President, Keystone Group LP,<br>
							Fort Worth, TX
						</address>
					</div>
					<div class="col-md-6"></div>
				</div>

				<div class="row text-white tursteesBordMem my-4" style="background-image: url(images/staff/trusteesboardMember4.JPG);">
					<div class="col-md-6"></div>
					<div class="col-md-6 text-right">
						<address>
							Michelle R. Clayman,<br>
							Managing Partner & Chief Investment Officer,<br>
							New Amsterdam Partners LLC,<br>
							New York, NY
						</address>
					</div>
				</div>

				<div class="row text-white tursteesBordMem my-4" style="background-image: url(images/staff/trusteesboardMember5.JPG);">
					<div class="col-md-6">
						<address>
							Christine U. Hazy,<br>
							Co-Founder and Managing Director,<br>
							Sketch Foundation,<br>
							Los Angeles, CA
						</address>
					</div>
					<div class="col-md-6"></div>
				</div>							
			</div>
			<div class="tab-pane fade" id="contract" role="tabpanel">
				<div>
					<h4 class="text-center">Contract Info</h4>
					<div class="row">
						<div class="col-sm-5 m-1 div_color">
							<address class="p-0 m-0">
								<b>The Honorable Spencer Abraham</b><br>
								Chairman and Chief Executive Officer<br>
								The Abraham Group LLC<br>
								<p class="m-0 p-0"><!-- <i class="fas fa-at"></i> -->Email: examname@university.com<br>
								<!-- <i class="fas fa-phone-volume"></i> -->Phone: +78924709</p>
							</address>
						</div>
						<div class="col-sm-5 m-1 div_color">
							<address>
								<b>Mr. Walter Kortschak (MS '82)</b><br>
								Senior Advisor and Former Managing Partner <br>
								Summit Partners, L.P <br>
								<p class="p-0 m-0"><!-- <i class="fas fa-at"></i> -->Email: examname@university.com <br>
								<!-- <i class="fas fa-phone-volume"> --></i>Phone: +78924709</p>
							</address>
						</div>

						<div class="col-sm-5 m-1 div_color">
							<address class="p-0 m-0">
								<b>Mr. William H. Ahmanson</b><br>
								President<br>
								The Ahmanson Foundation<br>
								<p class="m-0 p-0"><!-- <i class="fas fa-at"></i> -->Email: examname@university.com<br>
								<!-- <i class="fas fa-phone-volume"></i> -->Phone: +78924709</p>
							</address>
						</div>
						<div class="col-sm-5 m-1 div_color">
							<address>
								<b>Mr. Jon B. Kutler</b><br>
								Chairman and Chief Executive Officer <br>
								Admiralty Partners, Inc. <br>
								<p class="p-0 m-0"><!-- <i class="fas fa-at"></i> -->Email: examname@university.com <br>
								<!-- <i class="fas fa-phone-volume"></i> -->Phone: +78924709</p>
							</address>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div id="stfmainBody2">
		<div class="accordion">
	 		<div class="panel-group">
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#befArri" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div>Home</div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="befArri"><div>
					<div>
					<h4 class="text-center">The Board of Trustees of the Leland Junior University</h4>					
					<p class="text-center">Under the provisions of the Founding Grant, the Board of Trustees is custodian of the endowment and all the properties of Stanford University. The board administers the invested funds, sets the annual budget and determines policies for operation and control of the university. Among the powers given to the trustees by the Founding Grant is the power to appoint a president. The board delegates broad authority to the president to operate the university and to the faculty on certain academic matters..</p>

					<h3 class="text-center">News & Updates</h3>
					<div class="d-flex justify-content-start div_color my-1 p-2">
						<div>
							<p class="m-0"><b>Board of Trustees elects four new members</b></p>
							<small>March 7, 2018</small>
							<p class="read-more">The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.</p>
						</div>
					</div>
					<div class="d-flex justify-content-start div_color my-1 p-2">
						<div>
							<p class="m-0"><b>Campus input sought on investment responsibility principles</b></p>
							<small>March 7, 2018</small>
							<p class="read-more">The Board of Trustees and the campus Advisory Panel on Investment Responsibility and Licensing are asking for the input of the campus community on Stanford’s policies and procedures regarding investment responsibility Lam and Jeffrey E. Stone.The new trustees, selected through the alumni nominations process, begin their five-year terms on April 1, 2018. The new members are Michelle R. Clayman, James D. Halper, Carol C. Lam and Jeffrey E. Stone.</p>
						</div>
					</div>
				</div>
				</div>
			</div>
			    </div>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#firDay" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div>News & Updates</div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="firDay">firDay</div>
			    </div>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#daytobeyond" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div>Board Member</div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="daytobeyond">daytobeyond</div>
			    </div>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#triCom" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div>Contract</div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="triCom">triCom</div>
			    </div>
			</div>
	 	</div>
	</div>
</section>


<?php
 	include 'include/footer.php';
?>