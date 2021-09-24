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
			<h1>Gateway for Students</h1>
			<p class="pt-4">Links to resources, offices and services that support university Student</p>
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
						<p class="text-center py-2"><a href="#" role="button" data-toggle="modal" data-target="#staffSignUp">Create your Account</a></p>
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

	<!-- The modal for sign Up -->

	<div class="modal fade" id="staffSignUp">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Sign Up</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" class="staffsignupform">
						<div class="form-group">
							<label for="facDepartment">Select Your Department<sup class="text-danger font-weight-bold">*</sup>:</label>
							<select class="form-control" name="facDepartmentname" id="facDepartment">
								<option value="">--Select--</option>
								<option value="CSE">CSE</option>
								<option value="Law">Law</option>
								<option value="Pharmacy">Pharmacy</option>
								<option value="English">English</option>
								<option value="Microbiology">Microbiology</option>
								<option value="Civil Engineering">Civil Engineering</option>
								<option value="EEE">EEE</option>
								<option value="Architecture">Architecture</option>
								<option value="Environmental Science">Environmental Science</option>
								<option value="Film and Media Studies">Film and Media Studies</option>
								<option value="Economics">Economics</option>
								<option value="Journalism & Media Studies">Journalism & Media Studies</option>
								<option value="BBA">BBA</option>
							</select>
							<div class="d-flex justify-content-end">
								<span class="facdepartment-erro-message"></span>
							</div>
						</div>
						<div class="form-group">
							<label for="stffirstname">First Name<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="stffirstname" id="stffirstname" class="form-control" placeholder="Enter Your First Name">
							<div class="d-flex justify-content-end">
								<span class="stffname-erro-message"></span>
							</div>

							<label for="stflastname">Last Name<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="stflastname" id="stflastname" class="form-control" placeholder="Enter Your Last Name">
							<div class="d-flex justify-content-end">
								<span class=" stflname-erro-message"></span>
							</div>

							<label for="stfSignUpid">ID<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="stfid" id="stfSignUpid" class="form-control ">
							<div class="d-flex justify-content-end">
								<span class="stfId-erro-message"></span>
							</div>

							<label for="stfBirthDate">Date of Birth<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="date" name="stfbirthdate" id="stfBirthDate" class="form-control">
							<div class="d-flex justify-content-end">
								<span class="stfbirth-erro-message"></span>
							</div>

							<label for="stfSignUpEmail">Email<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="email" name="stfSignUpEmail" id="stfSignUpEmail" class="form-control" placeholder="Enter Your Email">
							<div class="d-flex justify-content-end">
								<span class="stfemail-erro-message"></span>
							</div>

							<label for="stfPassword">Password<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="password" name="stfpassword" id="stfPassword" class="form-control" placeholder="Enter Password">
							<div class="d-flex justify-content-between mt-1">
								<div class="progress w-50 sighup_pass_progressbar" >
									<div class="progress-bar passprogbar">
									</div>
								</div>
								<div class="msg">
									<span class="stfpass-error-message"></span>
								</div>
							</div>

							<label for="stfConfirmPassword">Confirm Password<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="password" name="stfconfirmpassword" id="stfConfirmPassword" class="form-control " placeholder="Enter Confirm Password">
							<div class="d-flex justify-content-end md-3">
								<div>
									<span id="conPassMsg" class="stfconpass-error-message"></span>
								</div>
							</div>
							
							<div class="alert alert-warning">
						    	<strong>Warning!</strong>You Must Complete full input field
						  </div>
							<button type="reset" class="btn btn-danger mt-2 mr-2 stfultysignupReset">Reset</button>
							<button type="submit" name="StaffSignUpSubmit" class="btn btn-info mt-2 ml-2">Submit</button>
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
                <h5 class="text-white text-center">Faculty Resources</h5>
                <ul class="list-group">
					<li class="list-group-item"><a href="#allStdUpd" class="nav-link active" data-toggle="tab" role="tab" aria-controls="allStdUpd">All Student Update</a></li>
					<li class="list-group-item"><a href="#stdBefArv" class="nav-link" data-toggle="tab" role="tab" aria-controls="stdBefArv">Before You Arrive</a></li>
					<li class="list-group-item"><a href="#LabSearch" class="nav-link" data-toggle="tab" role="tab" aria-controls="LabSearch">Libraries</a></li>
					<li class="list-group-item"><a href="#stdOutsClas" class="nav-link" data-toggle="tab" role="tab" aria-controls="stdOutsClas">Outside the Classroom</a></li>
					<li class="list-group-item"><a href="#RecfotDayLif" class="nav-link" data-toggle="tab" role="tab" aria-controls="RecfotDayLif">Resource for Daily Life</a></li>
				</ul>
            </div>
        </div>
        <div class="col-sm-8 content">
			<div class="tab-content">
				<div class="tab-pane fade show active" id="allStdUpd" role="tabpanel">
					<h1 class="text-center wow zoomIn" data-wow-duration="2s">Student Update</h1>
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
				</div>
				<div class="tab-pane fade" id="stdBefArv" role="tabpanel">
					<h1 class="text-center">Before you arrive</h1>
					<div class="row d-flex justify-content-around">
						<div class="col-md-5 div_color m-1">
							<h4 class="text-center">Undergraduate</h4>
							<p class="text-justify">	Access to your tutorial reports, course handbook and lecture lists, as well as information on what any change of your student status will mean to you.</p>
							<ul>
								<li class="list-item"><a href="">Admission Requirment</a></li>
								<li class="list-item"><a href="">Tution Fees</a></li>
								<li class="list-item"><a href="">International Student</a></li>
								<li class="list-item"><a href="">Explore Course</a></li>
							</ul>
						</div>
						<div class="col-md-5 div_color m-1">
							<h4 class="text-center">Graduate</h4>
							<p class="text-justify">Access to your tutorial reports, course handbook and lecture lists, as well as information on what any change of your student status will mean to you.</p>
							<ul>
								<li class="list-item"><a href="">Admission Requirment</a></li>
								<li class="list-item"><a href="">Tution Fees</a></li>
								<li class="list-item"><a href="">International Student</a></li>
								<li class="list-item"><a href="">Explore Course</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="tab-pane fade" id="LabSearch" role="tabpanel">
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
		        	<div class="row justify-content-around">
		        		<div class="col-md-5 col-sm-5 div_color">
		        			<a href="#">
		        			<h4 class="text-center">Online exhibits</h4>
		        			<p>Explore notable digital collections showcased by our librarians and curators.</p></a>
		        		</div>
		        		<div class="col-md-5 col-sm-5 div_color">
		        			<a href="#">
		        			<h4 class="text-center">Articles&#43;</h4>
		        			<p>Find books, media, journals, and more in Catalog; journal articles in Articles&#43;.</p></a>
		        		</div>
		        	</div>
				</div>
				<div class="tab-pane fade" id="stdOutsClas" role="tabpanel">
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
				</div>
				<div class="tab-pane fade" id="RecfotDayLif" role="tabpanel">
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
				</div>
			</div>
		</div>
	</div>
</section>
<?php
 	include 'include/footer.php';
?>