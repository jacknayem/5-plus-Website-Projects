<!DOCTYPE html>
<html>
<head>
<?php 
	// connection with database
	include 'require/dbconnection.php';
?>
	<title>Staff Welcome Center</title>
<?php
	// head tag
	include 'include/head.php';
	// First nav bar
	include 'include/firstnavbar.php';
	// Second vab bar
	include 'include/secondnavbar.php';
?>

<section class="container">
	<div class="row">
		<div class="col-md-4 faculty-message text-white pt-5 text-center">
			<h1>A Vision for Exmple Uni</h1>
			<p class="pt-4">President Tessier-Lavigne and Provost Drell unveil their vision for Stanford’s future.</p>
		</div>
		<div class="col-md-8 stafflogin">
			<div class="row">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form action="" method="post" class="p-2 px-3 my-3" >
						<div class="form-group">
							<label>Student ID</label>
							<input type="text" name="staffloginid" id="staffloginid" class="form-control" placeholder="Enter your ID" required value="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="Password" name="staffloginpassword" id="staffloginpassword" class="form-control" placeholder="Enter Your Password" required value="">
						</div>
						<div class="d-flex felx-row">
							<div class="form-group form-check flex-fill">
								<input type="checkbox" name="remamber" class="form-check-input" <?php if(isset($_COOKIE["staff_ID_number"])) { ?> checked <?php } ?> />Remamber me
							</div>

							<div class="flex-fill">
								<a href="#" role="button" data-toggle="modal" data-target="#staffForgatePass">Forget Password</a>
							</div>
						</div>
						<button type="submit" class="btn btn-primary" name="facultyLoginsubmit" id="facultyLoginsubmit">Log In</button>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>
	<!-- The modal for forget password -->
	<div class="modal fade" id="staffForgatePass">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Password Recovery</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" class="p-2" id="stfForgetpassFrom">
						<div class="form-group">
							<label for="stfForgatedID" class="text-white">ID:</label>
							<input type="text" name="stfForgatedID" id="stfForgatedID" class="form-control mb-3">
							<div class="d-flex justify-content-end">
								<div id="stfForgetID_error_message"></div>
							</div>

							<label for="stfForgetedemail" class="text-white">Email: </label>
							<input type="email" name="stfForgetedemail" class="form-control mb-3" id="stfForgetedemail">
							<div class="d-flex justify-content-end">
								<div id="stfForgetEmail_error_message"></div>
							</div>

							<div class="d-flex justify-content-end">
								<button type="submit" class="btn btn-primary mt-3" name="stfForgetSubmit" id="stfForgetSubmit">Submit</button>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="container">
    <div class="row py-3">
    	<div class="col-sm-4">
            <div class="sticky-top p-3 text-center div_color" id="facultyInfoSideBar1">
                <h5 class="text-white text-center">Alumni Resources</h5>
                <ul class="list-group">
					<li class="list-group-item"><a href="#home" class="nav-link active" data-toggle="tab" role="tab" aria-controls="home">Home</a></li>
					<li class="list-group-item"><a href="#activity" class="nav-link" data-toggle="tab" role="tab" aria-controls="activity">Activities</a></li>
					<li class="list-group-item"><a href="#community" class="nav-link" data-toggle="tab" role="tab" aria-controls="community">Community</a></li>
					<li class="list-group-item"><a href="#resources" class="nav-link" data-toggle="tab" role="tab" aria-controls="resources">Resources</a></li>
					<!-- <li class="list-group-item"><a href="#volunteering" class="nav-link" data-toggle="tab" role="tab" aria-controls="volunteering">Volunteering</a></li> -->
					<li class="list-group-item"><a href="#news" class="nav-link" data-toggle="tab" role="tab" aria-controls="news">News</a></li>
				</ul>
            </div>
        </div>
        <div class="col-sm-8 content">
			<div class="tab-content">
				<div class="tab-pane fade show active" id="home" role="tabpanel">
					<h1 class="text-center wow zoomIn" data-wow-duration="2s">Magazines</h1>
					<div class="row">
				        <div class="col-md-4 col-sm-6 my-2">
				            <div class="service-box">
				                <div class="service-icon div_color">
				                    <div class="front-content">
				                        <img src="images/student/stdnews1.jpg" class="rounded img-fluid" alt="Ramadan">
				                    </div>
				                </div>
				                <div class="service-content div_color px-3">
				                    <p class="m-0 p-0"><b>Ramadan at University</b></p>
				                    <p class="m-0 p-0"><small>12-sep-2018</small></p>
				                    <a href="" role="button" class="btn btn-info float-right my-1">More</a>
				                </div>
				            </div>
				        </div>

				        <div class="col-md-4 col-sm-6 my-2">
				            <div class="service-box">
				                <div class="service-icon grey">
				                    <div class="front-content">
				                        <img src="images/student/stdnews2.jpg" class="rounded img-fluid" alt="Ramadan">
				                    </div>
				                </div>
				                <div class="service-content div_color px-3">
				                    <p class="m-0 p-0"><b>Apply Now</b></p>
				                    <p class="m-0 p-0"><small>12-sep-2018</small></p>
				                    <a href="" role="button" class="btn btn-info float-right my-1">More</a>
				                </div>
				            </div>
				        </div>

				        <div class="col-md-4 col-sm-6 my-2">
				            <div class="service-box">
				                <div class="service-icon grey">
				                    <div class="front-content">
				                        <img src="images/student/stdnews3.jpg" class="rounded img-fluid" alt="Ramadan">
				                    </div>
				                </div>
				                <div class="service-content div_color px-3">
				                    <p class="m-0 p-0"><b>Ramadan at Oxford</b></p>
				                    <p class="m-0 p-0"><small>12-sep-2018</small></p>
				                    <a href="" role="button" class="btn btn-info float-right my-1">More</a>
				                </div>
				            </div>
				        </div>

				        <div class="col-md-4 col-sm-6 my-2">
				            <div class="service-box">
				                <div class="service-icon grey">
				                    <div class="front-content">
				                        <img src="images/student/stdnews4.jpg" class="rounded img-fluid" alt="Ramadan">
				                    </div>
				                </div>
				                <div class="service-content div_color px-3">
				                    <p class="m-0 p-0"><b>Ramadan at Oxford</b></p>
				                    <p class="m-0 p-0"><small>12-sep-2018</small></p>
				                    <a href="" role="button" class="btn btn-info float-right my-1">More</a>
				                </div>
				            </div>
				        </div>
				    </div>
				    <h1 class="text-center wow zoomIn" data-wow-duration="2s">Top News</h1>
				    <div class="row m-1">
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<img src="images/student/stdnews1.jpg" class="rounded img-fluid" alt="Ramadan">
				    	</div>
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<p class="m-0 p-1"><b>Preuss School at UC San Diego Once Again Ranked Top High School in San Diego </b></p>
				    		<p><small class="float-left">12-9-2018</small></p>
				    		<p class="read-more">Charter school also received a Gold Award designation and was ranked the 6th best high school in California.</p>
				    	</div>
				    </div>
				    <div class="row m-1">
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<img src="images/student/stdnews2.jpg" class="rounded img-fluid" alt="Ramadan">
				    	</div>
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<p class="m-0 p-1"><b>Preuss School at UC San Diego Once Again Ranked Top High School in San Diego </b></p>
				    		<p><small class="float-left">12-9-2018</small></p>
				    		<p class="read-more">Charter school also received a Gold Award designation and was ranked the 6th best high school in California.</p>
				    	</div>
				    </div>
				    <div class="row m-1">
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<img src="images/student/stdnews3.jpg" class="rounded img-fluid" alt="Ramadan">
				    	</div>
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<p class="m-0 p-1"><b>Preuss School at UC San Diego Once Again Ranked Top High School in San Diego </b></p>
				    		<p><small class="float-left">12-9-2018</small></p>
				    		<p class="read-more">Charter school also received a Gold Award designation and was ranked the 6th best high school in California.</p>
				    	</div>
				    </div>
				    <h1 class="text-center wow zoomIn" data-wow-duration="2s">Alumni Instragram</h1>

				    <div class="big_div_color p-2 my-2" id="appointment">
					 	<h1 class="text-center wow zoomIn" data-wow-duration="2s">Event Calendar</h1>
					 	<div class="accordion">
					 		<div class="panel-group">
					 			<?php 
							 		$sql = "SELECT * FROM faculty_appontment_info";
							 		$appointment_result = $connection->query($sql);
							 		if(!$appointment_result){
							 			echo "Fetch Failed :".$connection->error;
							 		}else{
							 			if(mysqli_num_rows($appointment_result) > 0){
							 				while ($row = mysqli_fetch_array($appointment_result)) {
								?>
							    <div class="panel panel-default my-1">
							      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_appointment" data-parent=".accordion">
							      	<div class="d-flex justify-content-between">
							      		<div><small class="pr-5">12-9-2018</small><?=$row['title'];?></div>
							      		<div class="text-right"><i class="fas fa-plus"></i></div>
							      	</div>
							      </div>
							      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_appointment"><?= $row['body'];?></div>
							    </div>
							    <?php					
								 				}
								 			}
								 		}
								?>
							</div>
					 	</div>
					</div>				    
				</div>
				<div class="tab-pane fade" id="activity" role="tabpanel">
					<h1 class="text-center">Before you arrive</h1>
					<p class="text-center">Itching to get out and do something? Stop scratching and start clicking! Take your pick of things to do and places to see on campus, where you live or in a fascinating land far, far away.</p>
					<div class="row d-flex justify-content-around">
						<div class="col-md-6 div_color">
							<img src="images/student/stdnews1.jpg" class="rounded img-fluid" alt="Ramadan">
						</div>
						<div class="col-md-6 div_color">
							<p class="text-justify">What do you get when you mix the sight of sun-soaked sandstone with the sound of laughter and the feel of your brain whirring and stirring?Reunion Homecoming. Come home.</p>
							<a href="#" role="button" class="btn btn-info">Go</a>
						</div>
					</div>
					<div>
						<h1 class="text-center">Events & Programs</h1>
						<div class="accordion">
					 		<div class="panel-group">
					 			<?php 
							 		$sql = "SELECT * FROM faculty_appontment_info";
							 		$appointment_result = $connection->query($sql);
							 		if(!$appointment_result){
							 			echo "Fetch Failed :".$connection->error;
							 		}else{
							 			if(mysqli_num_rows($appointment_result) > 0){
							 				while ($row = mysqli_fetch_array($appointment_result)) {
								?>
							    <div class="panel panel-default my-1">
							      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_appointment" data-parent=".accordion">
							      	<div class="d-flex justify-content-between">
							      		<div><small class="pr-5">12-9-2018</small><?=$row['title'];?></div>
							      		<div class="text-right"><i class="fas fa-plus"></i></div>
							      	</div>
							      </div>
							      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_appointment"><?= $row['body'];?></div>
							    </div>
							    <?php					
								 				}
								 			}
								 		}
								?>
							</div>
					 	</div>
					</div>
				</div>
				<div class="tab-pane fade" id="community" role="tabpanel">
					<h6>The Example University alumni community is always close at hand. Socialize orintellectualize—online or in person—anytime, anywhere.</h6>

					<div class="div_color my-1">
						<h4>Find Classes, Groups And Clubs</h4>
						<form action="" method="post">
			        		<div class="input-group mb-3">
							  <input type="search" name="StdLibraries" id="StdLibraries" class="form-control" placeholder="Search Out collection By Name">
							  <div class="input-group-prepend">
							    <div class="input-group-text">
							    	<button type="submit" name="facSearchName" id="facSearchName" class="btn btn-info"data-toggle="modal" data-target ="#searchReasult"><i class="fas fa-search"></i>Search</button>
							    </div>
							  </div>
							</div>
			        	</form>
					</div>
					<div class="div_color my-1">
						<h4>Search Alumni</h4>
						<p>More than 200,000 Stanford alumni are just a click away. Find roommates, classmates and dormmates—or a few new 'mates—with savvy automated and advanced searches.</p>
						<form action="" method="post">
			        		<div class="input-group mb-3">
							  <input type="search" name="StdLibraries" id="StdLibraries" class="form-control" placeholder="Search Out collection By Name">
							  <div class="input-group-prepend">
							    <div class="input-group-text">
							    	<button type="submit" name="facSearchName" id="facSearchName" class="btn btn-info"data-toggle="modal" data-target ="#searchReasult"><i class="fas fa-search"></i>Search</button>
							    </div>
							  </div>
							</div>
			        	</form>
					</div>
					<div class="div_color my-1 p-1">
						<h4>Recent Alumni</h4>
						<p>More than 200,000 Stanford alumni are just a click away. Find roommates, classmates and dormmates—or a few new 'mates—with savvy automated and advanced searches.</p>
						<div class="row">
							<div class="col-md-4">
								<div class="card">
								  <img class="card-img-top img-fluid" src="images/student/stdnews1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <a href="#" class="btn btn-primary">See Profile</a>
								  </div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
								  <img class="card-img-top img-fluid" src="images/student/stdnews2.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <a href="#" class="btn btn-primary">See Profile</a>
								  </div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
								  <img class="card-img-top img-fluid" src="images/student/stdnews1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <a href="#" class="btn btn-primary">See Profile</a>
								  </div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
								  <img class="card-img-top img-fluid" src="images/student/stdnews2.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <a href="#" class="btn btn-primary">See Profile</a>
								  </div>
								</div>
							</div>
						</div>
					</div>
					<div class="div_color my-1 p-1">
						<h4>Faculty & Staff Alumni</h4>
						<p>The Staff and Faculty Alumni Group serves nearly 4,300 alumni who are now members of the staff or faculty at UC San Diego. Of the 10 UC campuses, we have the second largest population of alumni who work on campus.</p>
						<div class="row">
							<div class="col-md-4">
								<div class="card">
								  <img class="card-img-top img-fluid" src="images/student/stdnews1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <a href="#" class="btn btn-primary">See Profile</a>
								  </div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
								  <img class="card-img-top img-fluid" src="images/student/stdnews2.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <a href="#" class="btn btn-primary">See Profile</a>
								  </div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
								  <img class="card-img-top img-fluid" src="images/student/stdnews1.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <a href="#" class="btn btn-primary">See Profile</a>
								  </div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="card">
								  <img class="card-img-top img-fluid" src="images/student/stdnews2.jpg" alt="Card image cap">
								  <div class="card-body">
								    <h5 class="card-title">Card title</h5>
								    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
								    <a href="#" class="btn btn-primary">See Profile</a>
								  </div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="resources" role="tabpanel">
					<p>Make the most of your alumni experience by taking advantage of these special alumni resources for your career, campus visits and beyond.</p>
					<div class="accordion">
					 		<div class="panel-group">
							    <div class="panel panel-default my-1">
							      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#1_appointment" data-parent=".accordion">
							      	<div class="d-flex justify-content-between">
							      		<div><small class="pr-5">12-9-2018</small>Alumni Career Services</div>
							      		<div class="text-right"><i class="fas fa-plus"></i></div>
							      	</div>
							      </div>
							      <div class="panel-body collapse mx-1 p-4 div_collaple" id="1_appointment">
							      	<p>Want exclusive access to alum-to-alum job postings and a network of more than 200,000 Stanford alumni contacts? You got it. Get connected and stay connected with Alumni Career Services.</p>
							      </div>
							    </div>
							</div>
							<div class="panel-group">
							    <div class="panel panel-default my-1">
							      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#2_appointment" data-parent=".accordion">
							      	<div class="d-flex justify-content-between">
							      		<div><small class="pr-5">12-9-2018</small>Perks</div>
							      		<div class="text-right"><i class="fas fa-plus"></i></div>
							      	</div>
							      </div>
							      <div class="panel-body collapse mx-1 p-4 div_collaple" id="2_appointment">
							      	<p>Want exclusive access to alum-to-alum job postings and a network of more than 200,000 Stanford alumni contacts? You got it. Get connected and stay connected with Alumni Career Services.</p>
							      </div>
							    </div>
							</div>
							<div class="panel-group">
							    <div class="panel panel-default my-1">
							      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#3_appointment" data-parent=".accordion">
							      	<div class="d-flex justify-content-between">
							      		<div><small class="pr-5">12-9-2018</small>Alumni Center</div>
							      		<div class="text-right"><i class="fas fa-plus"></i></div>
							      	</div>
							      </div>
							      <div class="panel-body collapse mx-1 p-4 div_collaple" id="3_appointment">
							      	<p>You don't need a dorm room for Stanford to be home again. Instead of a bunk bed, you have a living room, library, business center, gardens and cafe to call your own.</p>
							      </div>
							    </div>
							</div>
					 	</div>
				</div>
				<div class="tab-pane fade" id="news" role="tabpanel">
					<div class="row m-1">
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<img src="images/student/stdnews1.jpg" class="rounded img-fluid" alt="Ramadan">
				    	</div>
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<p class="m-0 p-1"><b>Preuss School at UC San Diego Once Again Ranked Top High School in San Diego </b></p>
				    		<p><small class="float-left">12-9-2018</small></p>
				    		<p class="read-more">Charter school also received a Gold Award designation and was ranked the 6th best high school in California.</p>
				    	</div>
				    </div>
				    <div class="row m-1">
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<img src="images/student/stdnews2.jpg" class="rounded img-fluid" alt="Ramadan">
				    	</div>
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<p class="m-0 p-1"><b>Preuss School at UC San Diego Once Again Ranked Top High School in San Diego </b></p>
				    		<p><small class="float-left">12-9-2018</small></p>
				    		<p class="read-more">Charter school also received a Gold Award designation and was ranked the 6th best high school in California.</p>
				    	</div>
				    </div>
				    <div class="row m-1">
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<img src="images/student/stdnews3.jpg" class="rounded img-fluid" alt="Ramadan">
				    	</div>
				    	<div class="col-sm-6 col-md-6 div_color p-1">
				    		<p class="m-0 p-1"><b>Preuss School at UC San Diego Once Again Ranked Top High School in San Diego </b></p>
				    		<p><small class="float-left">12-9-2018</small></p>
				    		<p class="read-more">Charter school also received a Gold Award designation and was ranked the 6th best high school in California.</p>
				    	</div>
				    </div>
				</div>
				<!-- <div class="tab-pane fade" id="volunteering" role="tabpanel">
					<p><b>Volunteering</b></p>
					<p>At the heart of University's founding principles is "a desire to render the greatest possible service to mankind." That spirit of service lives on in our alumni. Each year, more than 11,000 Stanford alumni volunteer to serve the University from the foothills to the bay and beyond. Whether you're looking for a way to give of your time and talents on campus or closer to home, find your inspiration right here.</p>
					<div class="row">
						<div class="col-xs-12 ">
							<nav>
								<div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Student Life</a>
									<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Housing and Center</a>
									<a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Comunity Center</a>
									<a class="nav-item nav-link" id="nav-about-tab" data-toggle="tab" href="#nav-about" role="tab" aria-controls="nav-about" aria-selected="false">Public Service</a>
								</div>
							</nav>
							<div class="tab-content py-3 px-3 px-sm-0 big_div_color" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
									<div class="big_div_color p-2 my-2" id="appointment">
									 	<h1 class="text-center wow zoomIn" data-wow-duration="2s">Student Life</h1>
									 	<div class="accordion">
									 		<div class="panel-group">
									 			<?php 
											 		$sql = "SELECT * FROM faculty_appontment_info";
											 		$appointment_result = $connection->query($sql);
											 		if(!$appointment_result){
											 			echo "Fetch Failed :".$connection->error;
											 		}else{
											 			if(mysqli_num_rows($appointment_result) > 0){
											 				while ($row = mysqli_fetch_array($appointment_result)) {
												?>
											    <div class="panel panel-default my-1">
											      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_appointment" data-parent=".accordion">
											      	<div class="d-flex justify-content-between">
											      		<div><?=$row['title'];?></div>
											      		<div class="text-right"><i class="fas fa-plus"></i></div>
											      	</div>
											      </div>
											      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_appointment"><?= $row['body'];?></div>
											    </div>
											    <?php					
												 				}
												 			}
												 		}
												?>
											</div>
									 	</div>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
									<div class="big_div_color p-2 my-2" id="appointment">
									 	<h1 class="text-center wow zoomIn" data-wow-duration="2s">Student Life</h1>
									 	<div class="accordion">
									 		<div class="panel-group">
									 			<?php 
											 		$sql = "SELECT * FROM faculty_appontment_info";
											 		$appointment_result = $connection->query($sql);
											 		if(!$appointment_result){
											 			echo "Fetch Failed :".$connection->error;
											 		}else{
											 			if(mysqli_num_rows($appointment_result) > 0){
											 				while ($row = mysqli_fetch_array($appointment_result)) {
												?>
											    <div class="panel panel-default my-1">
											      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_appointment" data-parent=".accordion">
											      	<div class="d-flex justify-content-between">
											      		<div><?=$row['title'];?></div>
											      		<div class="text-right"><i class="fas fa-plus"></i></div>
											      	</div>
											      </div>
											      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_appointment"><?= $row['body'];?></div>
											    </div>
											    <?php					
												 				}
												 			}
												 		}
												?>
											</div>
									 	</div>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
									<div class="big_div_color p-2 my-2" id="appointment">
									 	<h1 class="text-center wow zoomIn" data-wow-duration="2s">Student Life</h1>
									 	<div class="accordion">
									 		<div class="panel-group">
									 			<?php 
											 		$sql = "SELECT * FROM faculty_appontment_info";
											 		$appointment_result = $connection->query($sql);
											 		if(!$appointment_result){
											 			echo "Fetch Failed :".$connection->error;
											 		}else{
											 			if(mysqli_num_rows($appointment_result) > 0){
											 				while ($row = mysqli_fetch_array($appointment_result)) {
												?>
											    <div class="panel panel-default my-1">
											      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_appointment" data-parent=".accordion">
											      	<div class="d-flex justify-content-between">
											      		<div><?=$row['title'];?></div>
											      		<div class="text-right"><i class="fas fa-plus"></i></div>
											      	</div>
											      </div>
											      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_appointment"><?= $row['body'];?></div>
											    </div>
											    <?php					
												 				}
												 			}
												 		}
												?>
											</div>
									 	</div>
									</div>
								</div>
								<div class="tab-pane fade" id="nav-about" role="tabpanel" aria-labelledby="nav-about-tab">
									<div class="big_div_color p-2 my-2" id="appointment">
									 	<h1 class="text-center wow zoomIn" data-wow-duration="2s">Student Life</h1>
									 	<div class="accordion">
									 		<div class="panel-group">
									 			<?php 
											 		$sql = "SELECT * FROM faculty_appontment_info";
											 		$appointment_result = $connection->query($sql);
											 		if(!$appointment_result){
											 			echo "Fetch Failed :".$connection->error;
											 		}else{
											 			if(mysqli_num_rows($appointment_result) > 0){
											 				while ($row = mysqli_fetch_array($appointment_result)) {
												?>
											    <div class="panel panel-default my-1">
											      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_appointment" data-parent=".accordion">
											      	<div class="d-flex justify-content-between">
											      		<div><?=$row['title'];?></div>
											      		<div class="text-right"><i class="fas fa-plus"></i></div>
											      	</div>
											      </div>
											      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_appointment"><?= $row['body'];?></div>
											    </div>
											    <?php					
												 				}
												 			}
												 		}
												?>
											</div>
									 	</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->
			</div>
		</div>
	</div>
</section>
<?php
 	include 'include/footer.php';
?>