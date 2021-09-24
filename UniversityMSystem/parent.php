<?php 
	// connection with database
	include 'require/dbconnection.php';

	// Login Page faculty
	session_start();
	if(isset($_POST['facultyLoginsubmit'])){
		$facLoginID = strtoupper($_POST['facloginid']);
		$facLoginpassword = $_POST['facloginpassword'];

		$Loginsql = "SELECT department_id, password FROM faculty_member_info WHERE department_id = '$facLoginID'";
		$loginresult = $connection->query($Loginsql);
		$loginrow = mysqli_fetch_array($loginresult);

		if ($loginrow['department_id'] == $facLoginID) {
			if(!empty($_POST["remamber"])){
				setcookie('faculty_ID_number', $facLoginID, time() + (86400 * 30));
				setcookie('faculty_password', $facLoginpassword, time() + (86400 * 30));
			}else{
				if(isset($_COOKIE['faculty_ID_number'])){
					setcookie('faculty_ID_number', "");
				}
				if(isset($_COOKIE['faculty_password'])){
					setcookie('faculty_password', "");
				}
			}
			echo "<script>alert('Log In Succes');</script>";
		}else{
			echo "<script>alert('Invalid ID or Password');</script>";
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Faculty</title>
<?php
	// head tag
	include 'include/head.php';
	// First nav bar
	include 'include/firstnavbar.php';
	// Second vab bar
	include 'include/secondnavbar.php';
?> 
<section class="container facultysection1">
	<div class="row ">
		<div class="col-md-4 faculty-message text-white pt-5 text-center">
			<h1>Gateway for Faculty</h1>
			<p class="pt-4">Links to resources, offices and services that support our university faculty</p>
		</div>
		<div class="col-md-8 facultylogin">
			<div class="row">
				<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<form action="" method="post" class="p-2 px-3 my-3" >
						<div class="error-message"><?php if(isset($message)) { echo $message; } ?></div>
						<div class="form-group">
							<label>Faculty ID</label>
							<input type="text" name="facloginid" id="facloginid" class="form-control" placeholder="Enter your ID" required value="<?php if(isset($_COOKIE['faculty_ID_number'])){ echo $_COOKIE['faculty_ID_number'];} ?>">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="Password" name="facloginpassword" id="facloginpassword" class="form-control" placeholder="Enter Your Password" required value="<?php if(isset($_COOKIE["faculty_password"])){echo $_COOKIE["faculty_password"];}?>">
						</div>
						<div class="d-flex felx-row">
							<div class="form-group form-check flex-fill">
								<input type="checkbox" name="remamber" class="form-check-input" <?php if(isset($_COOKIE["faculty_ID_number"])) { ?> checked <?php } ?> />Remamber me
							</div>

							<div class="flex-fill">
								<a href="#" role="button" data-toggle="modal" data-target="#facultyForgatePass">Forget Password</a>
							</div>
						</div>
						<button type="submit" class="btn btn-primary" name="facultyLoginsubmit" id="facultyLoginsubmit">Log In</button>
						<p class="text-center py-2"><a href="#" role="button" data-toggle="modal" data-target="#facultysignup">Create your Account</a></p>
					</form>
				</div>
				<div class="col-sm-2"></div>
			</div>
		</div>
	</div>
	<!-- The Modal for Forget Password -->
	<div class="modal fade" id="facultyForgatePass">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Forgoten Password</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" class="p-2" id="facForgetpassFrom">
						<div class="form-group">
							<label for="facForgatedID" class="text-white">ID:</label>
							<input type="text" name="facForgatedID" id="facForgatedID" class="form-control mb-3">
							<div class="d-flex justify-content-end">
								<div id="facForgetID_error_message"></div>
							</div>

							<label for="facForgetedemail" class="text-white">Email: </label>
							<input type="email" name="facForgetedemail" class="form-control mb-3" id="facForgetedemail">
							<div class="d-flex justify-content-end">
								<div id="facForgetEmail_error_message"></div>
							</div>

							<div class="d-flex justify-content-end">
								<button type="submit" class="btn btn-primary mt-3" name="facForgetSubmit" id="facForgetSubmit">Submit</button>
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
	<?php 
		// require 'mailer/faculty_mail_sender.php';
	 ?>
	<!-- The Model for Sign Up -->
	<div class="modal fade" id="facultysignup">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Sign Up</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<form action="" method="post" class="facultysignupform">
						<div class="form-group">
							<label for="facSignUpid">Student ID<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="facid" id="facSignUpid" class="form-control ">
							<div class="d-flex justify-content-end">
								<span class="facId-erro-message"></span>
							</div>

							<label for="facBirthDate">Student Date of Birth<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="date" name="facbirthdate" id="facBirthDate" class="form-control">
							<div class="d-flex justify-content-end">
								<span class="facbirth-erro-message"></span>
							</div>

							<label for="facfirstname"> Your First Name<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="facfirstname" id="facfirstname" class="form-control" placeholder="Enter Your First Name">
							<div class="d-flex justify-content-end">
								<span class="facfname-erro-message"></span>
							</div>

							<label for="faclastname"> Your Last Name<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="faclastname" id="faclastname" class="form-control" placeholder="Enter Your Last Name">
							<div class="d-flex justify-content-end">
								<span class=" faclname-erro-message"></span>
							</div>

							<label for="facSignUpEmail">Your Email<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="email" name="facSignUpEmail" id="facSignUpEmail" class="form-control" placeholder="Enter Your Email">
							<div class="d-flex justify-content-end">
								<span class="facemail-erro-message"></span>
							</div>

							<label for="facPassword">Password<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="password" name="facpassword" id="facPassword" class="form-control" placeholder="Enter Password">
							<div class="d-flex justify-content-between mt-1">
								<div class="progress w-50 sighup_pass_progressbar" >
									<div class="progress-bar passprogbar">
									</div>
								</div>
								<div class="msg">
									<span class="facpass-error-message"></span>
								</div>
							</div>

							<label for="facConfirmPassword">Confirm Password<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="password" name="facconfirmpassword" id="facConfirmPassword" class="form-control " placeholder="Enter Confirm Password">
							<div class="d-flex justify-content-end md-3">
								<div>
									<span id="conPassMsg" class="facconpass-error-message"></span>
								</div>
							</div>
							
							<div class="alert alert-warning">
						    	<strong>Warning!</strong>You Must Complete full input field
						  </div>
							<button type="reset" class="btn btn-danger mt-2 mr-2 facultysignupReset">Reset</button>
							<button type="submit" name="faultySignUpSubmit" class="btn btn-info mt-2 ml-2">Submit</button>
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
	<div class="big_div_color m-1">
		<h2 class="text-center">Latest News</h2>
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

    <div class="m-1 big_div_color">
    	<h2 class="text-center">Get Involved</h2>
    	<p class="text-center">New Student Orientation and Family Weekend are among the events with specific programming for Stanford parents and guardians. The Stanford Parents’ Program and the Parents’ Club are among the organizations that give parents and guardians a chance to become more involved with the university.
		</p>
		<div class="accordion m-1">
	 		<div class="panel-group">
	 			<?php 
			 		$sql = "SELECT * FROM faculty_retirment_info";
			 		$retirment_result = $connection->query($sql);
			 		if(!$retirment_result){
			 			echo "Fetch Failed :".$connection->error;
			 		}else{
			 			if(mysqli_num_rows($retirment_result) > 0){
			 				while ($row = mysqli_fetch_array($retirment_result)) {
				?>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_retirment" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div><?=$row['title'];?></div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_retirment"><?= $row['body'];?></div>
			    </div>
			    <?php					
				 				}
				 			}
				 		}
				?>
			</div>
	 	</div>
    </div>

    <div class="m-1 big_div_color">
    	<h2 class="text-center">How Do I Pay?</h2>
    	<div class="row">
    		<div class="col-md-8 col-sm-6 text-center p-5">
    			<p>By accepting Stanford’s offer of admission and enrolling in classes, students accept responsibility for paying all debts to the university for which they are liable, including tuition and fees. Stanford assumes that students understand and will honor this financial obligation. While the university acknowledges parents’ and guardians’ financial support, payment is the responsibility of the student. Students may authorize others to access their Stanford account and make payments on their behalf through Axess, the student database system.</p>
    		</div>
    		<div class="col-md-4 col-sm-6">
    			<img src="images/student/stdnews1.jpg" class="img-fluid">
    		</div>
    	</div>
    	<div class="accordion m-1">
	 		<div class="panel-group">
	 			<?php 
			 		$sql = "SELECT * FROM faculty_retirment_info";
			 		$retirment_result = $connection->query($sql);
			 		if(!$retirment_result){
			 			echo "Fetch Failed :".$connection->error;
			 		}else{
			 			if(mysqli_num_rows($retirment_result) > 0){
			 				while ($row = mysqli_fetch_array($retirment_result)) {
				?>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_retirment" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div><?=$row['title'];?></div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_retirment"><?= $row['body'];?></div>
			    </div>
			    <?php					
				 				}
				 			}
				 		}
				?>
			</div>
	 	</div>
    </div>
    <div class="m-1 big_div_color">
    	<h2 class="text-center">Vital Information</h2>
    	<div class="row">
    		<div class="col-md-8 col-sm-6 text-center p-5">
    			<p>Living at Stanford: Wondering what to bring or what the weather is like? How do students get around?Academics: How can parents and guardians help students succeed academically at Stanford?Pertinent policies: Stanford’s Fundamental Standard and Honor Code are just two of many policies that apply to students.Health Care: Visit the Vaden Health Center website.</p>
    		</div>
    		<div class="col-md-4 col-sm-6">
    			<img src="images/student/stdnews1.jpg" class="img-fluid">
    		</div>
    	</div>
    	<div class="accordion m-1">
	 		<div class="panel-group">
	 			<?php 
			 		$sql = "SELECT * FROM faculty_retirment_info";
			 		$retirment_result = $connection->query($sql);
			 		if(!$retirment_result){
			 			echo "Fetch Failed :".$connection->error;
			 		}else{
			 			if(mysqli_num_rows($retirment_result) > 0){
			 				while ($row = mysqli_fetch_array($retirment_result)) {
				?>
			    <div class="panel panel-default my-1">
			      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_retirment" data-parent=".accordion">
			      	<div class="d-flex justify-content-between">
			      		<div><?=$row['title'];?></div>
			      	<div class="text-right"><i class="fas fa-plus"></i></div>
			      	</div>
			      </div>
			      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_retirment"><?= $row['body'];?></div>
			    </div>
			    <?php					
				 				}
				 			}
				 		}
				?>
			</div>
	 	</div>
    </div>
</section>
<section class="container">
</section>
<script type="text/javascript" src="js/facultymain.js"></script>
<?php

 	include 'include/footer.php';

	// Forgot Password Recovery
	require 'mailer/faculty_mail_sender.php';
	// Faculty Suin Up Infomation
	$facultyid = "";
	$facDoB = "";
	$facemail = "";
	if(isset($_POST['faultySignUpSubmit'])){
		$facultyDeftName = $_POST['facDepartmentname'];
		$facultyID = strtoupper($_POST['facid']);
		$facultyfName = $_POST['facfirstname'];
		$facultylName = $_POST['faclastname'];
		$facultyDoB = $_POST['facbirthdate'];
		$facultyEmail = $_POST['facSignUpEmail'];
		$facultyPass = $_POST['facpassword'];
		$facultyConPass = $_POST['facconfirmpassword'];


		$sqlselect = "SELECT * FROM faculty_member_info";
		$result = $connection->query($sqlselect);

		while ($row = mysqli_fetch_array($result)) {
			if ( $row["department_id"] == $facultyID && $row["date_of_birth"] == $facultyDoB && $row["email"] == $facultyEmail) {
				$facultyid = $row["department_id"];
				$facDoB = $row["date_of_birth"];
				$facemail = $row["email"];
			}
		}

		if ( $facultyid == $facultyID && $facDoB == $facultyDoB && $facemail == $facultyEmail){
			$sqlupdate = "UPDATE faculty_member_info SET department='$facultyDeftName', fname = '$facultyfName', lname = '$facultylName', password = '$facultyPass' WHERE department_id = '$facultyid'";
			$facultysignupinfo = $connection->query($sqlupdate);

			if (!$facultysignupinfo) {
			echo "Insert Faield:".$connection->error;
			}else{
				echo "<script type='text/javascript'>alert('Congratulation, You account is Successfull');</script>";
			}
		}
		else{
				echo "<script type='text/javascript'>alert('Does not match your previous provided ID or Date of Birth or Email');</script>";
			}
	}
?>