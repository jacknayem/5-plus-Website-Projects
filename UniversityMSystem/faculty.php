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
							<label for="facfirstname">First Name<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="facfirstname" id="facfirstname" class="form-control" placeholder="Enter Your First Name">
							<div class="d-flex justify-content-end">
								<span class="facfname-erro-message"></span>
							</div>

							<label for="faclastname">Last Name<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="faclastname" id="faclastname" class="form-control" placeholder="Enter Your Last Name">
							<div class="d-flex justify-content-end">
								<span class=" faclname-erro-message"></span>
							</div>

							<label for="facSignUpid">ID<sup class="text-danger font-weight-bold">*</sup>: </label>
							<input type="text" name="facid" id="facSignUpid" class="form-control ">
							<div class="d-flex justify-content-end">
								<span class="facId-erro-message"></span>
							</div>

							<label for="facBirthDate">Date of Birth<sup class="text-danger font-weight-bold">*</sup>:</label>
							<input type="date" name="facbirthdate" id="facBirthDate" class="form-control">
							<div class="d-flex justify-content-end">
								<span class="facbirth-erro-message"></span>
							</div>

							<label for="facSignUpEmail">Email<sup class="text-danger font-weight-bold">*</sup>:</label>
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
	<div id="facultyInfoSideBar2">
		<div class="d-flex div_color p-2 mt-1 mb-0">
			<div class="flex-fill"><a href="#appointment" class="nav_a">Appontment</a></div>
			<div class="flex-fill"><a href="#retirment" class="nav_a">Retirment</a></div>
			<div class="flex-fill"><a href="#housing" class="nav_a">Housing</a></div>
		</div>
		<div class="d-flex div_color p-2 mb-1 mt-0">
			<div class="flex-fill"><a href="#development" class="nav_a">Development</a></div>
			<div class="flex-fill"><a href="#helth_care" class="nav_a">Helth Care</a></div>
		</div>
	</div>
<div>
    <div class="row py-3">
    	<div class="col-sm-4">
            <div class="sticky-top p-3 text-center div_color" id="facultyInfoSideBar1">
                <h5 class="text-white text-center">Faculty Resources</h5>
                <ul class="list-group">
					<li class="list-group-item"><a href="#appointment" class="university_a">Appontment</a></li>
					<li class="list-group-item"><a href="#retirment" class="university_a">Retirment</a></li>
					<li class="list-group-item"><a href="#housing" class="university_a">Housing</a></li>
					<li class="list-group-item"><a href="#development" class="university_a">Development</a></li>
					<li class="list-group-item"><a href="#helth_care" class="university_a">Halth Care</a></li>
				</ul>
            </div>
        </div>
        <div class="col-sm-8 content">
        	<h1 class="text-center wow zoomIn" data-wow-duration="2s">Team of Faculty</h1>
        	<form action="" method="post">
        		<div class="input-group mb-3">
				  <input type="search" name="facSearchField" id="facSearchField" class="form-control" placeholder="Search faculty mamber by First or Last name">
				  <div class="input-group-prepend">
				    <div class="input-group-text">
				    	<button type="submit" name="facSearchName" id="facSearchName" class="btn btn-info"data-toggle="modal" data-target ="#searchReasult"><i class="fas fa-search"></i>Search</button>
				    </div>
				  </div>
				</div>
        	</form>
        	<div class="row">
        	<?php 
        	// Searching any faculty Member
        		if(isset($_POST["facSearchName"])){
        			$facMamberName = ucfirst($_POST["facSearchField"]);

        			$sql = "SELECT fname, lname, email FROM faculty_member_info WHERE fname LIKE '%$facMamberName%' OR lname LIKE '%$facMamberName%'";
        			$searchResult = $connection->query($sql);
        			$row_num = mysqli_num_rows($searchResult);
        			if($row_num > 0){
        				while($row = mysqli_fetch_array($searchResult)){
        				?>
			        		<div class="col-sm-4 card">
			        			<div class="card-header">
			        				<p><b>Name: <?php echo $row["fname"].' '.$row["lname"]; ?></b></p> 
			        			</div>
			        			<div class="card-body">
			        				<img src="images/faculty/default-profile.png" alt="Profile picture" class="img-thumbnail">
			        			</div>
			        			<div class="card-footer">
			        				<p><b>Email: </b><?php echo $row["email"];?></p>
			        			</div>
			        		</div>
        				<?php
        				}
        			}else{
        				echo "<script>alert('Ther is no search result, Please try again');</script>";
        			}
        		}
        	 ?>
        	 </div>
        	 <div>
		</div>
 <div class="container">
 	 <div class="big_div_color p-2 my-2" id="appointment">
 	<h1 class="text-center wow zoomIn" data-wow-duration="2s">Faculty Appointment</h1>
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
 <div class="big_div_color p-2 my-2">
 	<h1 class="text-center wow zoomIn" data-wow-duration = "2s">Retirment</h1>
 	<p>Your retirement represents so many things to you and to Stanford University. We want your retirement experience to be a positive one, but you are an important component of your retirement process. We need your help to make it work. Set forth below are resources and your personal retirement project plan. Starting the process early will ensure that your retirement savings plans and health care insurance transition into retirement with you smoothly.
	</p>
 	<div class="accordion">
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
<div class="big_div_color p-2 my-2">
 	<h1 class="text-center wow zoomIn" data-wow-duration = "2s">Housing</h1>
 	<p>Your retirement represents so many things to you and to Stanford University. We want your retirement experience to be a positive one, but you are an important component of your retirement process. We need your help to make it work.
	</p>
 	<div class="accordion">
 		<div class="panel-group">
 			<?php 
		 		$sql = "SELECT * FROM faculty_housing_info";
		 		$housing_result = $connection->query($sql);
		 		if(!$housing_result){
		 			echo "Fetch Failed :".$connection->error;
		 		}else{
		 			if(mysqli_num_rows($housing_result) > 0){
		 				while ($row = mysqli_fetch_array($housing_result)) {
			?>
		    <div class="panel panel-default my-1">
		      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_housing" data-parent=".accordion">
		      	<div class="d-flex justify-content-between">
		      		<div><?=$row['title'];?></div>
		      	<div class="text-right"><i class="fas fa-plus"></i></div>
		      	</div>
		      </div>
		      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_housing"><?= $row['body'];?></div>
		    </div>
		    <?php					
			 				}
			 			}
			 		}
			?>
		</div>
 	</div>
</div>
 	<div class="big_div_color p-2 my-2">
 	<h5 class="wow pulse pl-3" data-wow-duration = "2s">Development</h5>
 	<div class="accordion">
 		<div class="panel-group">
 			<?php 
		 		$sql = "SELECT * FROM faculty_development_info";
		 		$development_result = $connection->query($sql);
		 		if(!$development_result){
		 			echo "Fetch Failed :".$connection->error;
		 		}else{
		 			if(mysqli_num_rows($development_result) > 0){
		 				while ($row = mysqli_fetch_array($development_result)) {
			?>
		    <div class="panel panel-default my-1">
		      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_development" data-parent=".accordion">
		      	<div class="d-flex justify-content-between">
		      		<div><?=$row['title'];?></div>
		      	<div class="text-right"><i class="fas fa-plus"></i></div>
		      	</div>
		      </div>
		      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_development"><?= $row['body'];?></div>
		    </div>
		    <?php					
			 				}
			 			}
			 		}
			?>
		</div>
 	</div>
 	<h5 class="wow pulse pl-3 " data-wow-duration = "2s">Helth Care</h5>
 	<div class="accordion">
 		<div class="panel-group">
 			<?php 
		 		$sql = "SELECT * FROM faculty_helth_care";
		 		$helth_care_result = $connection->query($sql);
		 		if(!$helth_care_result){
		 			echo "Fetch Failed :".$connection->error;
		 		}else{
		 			if(mysqli_num_rows($helth_care_result) > 0){
		 				while ($row = mysqli_fetch_array($helth_care_result)) {
			?>
		    <div class="panel panel-default my-1">
		      <div class="panel-heading div_color px-3 py-1" data-toggle="collapse" data-target="#<?= $row['id'];?>_helth_care" data-parent=".accordion">
		      	<div class="d-flex justify-content-between">
		      		<div><?=$row['title'];?></div>
		      	<div class="text-right"><i class="fas fa-plus"></i></div>
		      	</div>
		      </div>
		      <div class="panel-body collapse mx-1 p-4 div_collaple" id="<?= $row['id'];?>_helth_care"><?= $row['body'];?></div>
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