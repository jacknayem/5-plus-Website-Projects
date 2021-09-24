<!DOCTYPE html>
<html>
<head>
	<title>Office of the President</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	// ==============Global variable===========
	$student_dep_count = 0;
	$student_department = "";

	// Insert Student Information
	if(isset($_POST['Studentinfosubmit'])){
		$stdsignupID = strtoupper($_POST['stuSignupInfoID']);
		$sql = "INSERT INTO student_info (department_id, date_of_birth, email) VALUES ('$stdsignupID', '$_POST[stdBirthDateInfo]', '$_POST[stdEmailInfo]')";
		$stdInfoInsert = $connection->query($sql);

		if(!$stdInfoInsert){
			echo "Insert Faield:".$connection->error;
		}else{
			echo "<script type='text/javascript'>alert('Inserted');</script>";
		}
		header('location: student_info.php');

	}


 ?>
<?php
	include 'include/head.php';
?>
<div class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Student Information
</div>
<?php
	include 'include/sidenavbar.php';
 ?>
<section class="container">
 	<div class="row justify-content-around text-white">
		<div class="col-sm-6 p-0">
		 	<div class="row p-0 m-0">
		 		<div class="col-md-5 p-0 m-2">
		 			<?php 
 						// select Total membe
						$member = "SELECT * FROM student_info";
						$numberOfmember = $connection->query($member);
						$totalrowcount=mysqli_num_rows($numberOfmember);
 					 ?>
		 			<div class="card div_color">
		 				<div class="card-body">
		 					<h4>Total Member</h4>
		 					<div class="d-flex justify-content-around">
		 						<h1><i class="fas fa-users"></i></h1>
		 						<h1 class="text-right"><?php echo $totalrowcount; ?></h1>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 		<div class="col-md-5 p-0 m-2">
		 			<div class="card div_color">
		 				<div class="card-body">
		 					<h4>Faculty Member</h4>
		 					<h1 class="text-right">45</h1>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		 	<div class="row p-0 m-0">
		 		<div class="col-sm-10 p-0 my-2 mx-3">
		 			<div class="card div_color">
		 				<div class="card-body">
		 					<?php 
		 						// select by department
								if(isset($_POST['stdnum'])){
									$dep = $_POST['Departmentname'];
									if($student_department == ""){
										$student_dep_count = 0;
										echo "<script>alert('Select Department please');</script>";
									}else{
										$dep_member = "SELECT * FROM student_info WHERE department = '$student_department'";
										$depStdMemRes = $connection->query($dep_member);
									$student_dep_count = mysqli_num_rows($depStdMemRes);
									}
								}
		 					 ?>
		 					<form action="student_info.php" method="post" id="SearchDepOfStudent">
		 						<div class="input-group">
		 							<select class="form-control" name="Departmentname" id="Departmentname">
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
		 							<div class="input-group-append">
		 								<input type="submit" name="stdnum" class="btn" value="Search" id="FacSearch">
		 							</div>
		 						</div>
		 					</form>
		 					<h4>Faculty member by the Depeartment</h4>
		 					<h6><?php if($student_department != ""){echo $student_department." :";} ?></h6>
		 					<div class="d-flex justify-content-between mt-4">
		 						<h1><i class="fas fa-chart-pie"></i></h1>
		 						<h1 class="text-right"><?php echo $student_dep_count; ?></h1>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		</div>
		<div class="col-sm-5 m-3 div_color rounded">
		 	<h4 class="py-2 text-center">Initial infomation of Student</h4>
		 	<form action="student_info.php" method="post" class="p-3" id="stuSignUpInfoform">
				<div class="form-group">
					<label for="stuSignupInfoID">Student ID</label>
					<input type="text" name="stuSignupInfoID" id="stuSignupInfoID" class="form-control">
					<div class="d-flex justify-content-end">
						<div class="mb-2 stuSignupInfoID_error_message"></div>
					</div>

					<label for="stdBirthDateInfo">Birth of Date</label>
					<input type="date" name="stdBirthDateInfo" id="stdBirthDateInfo" class="form-control">
					<div class="d-flex justify-content-end">
						<div class="mb-2 stdSignupBirth_error_message"></div>
					</div>

					<label for="stdEmailInfo">Email</label>
					<input type="email" name="stdEmailInfo" id="stdEmailInfo" class="form-control">
					<div class="d-flex justify-content-end">
						<div class="mb-2 stdEmailInfo_error_message"></div>
					</div>
					<div class="d-flex justify-content-end my-2">
						<button type="submit" name="Studentinfosubmit" class="btn btn-info">Save Info</button>
					</div>
				</div>
		 	</form>
		</div>
 	</div>
</section>
<section class="container">
 	<div class="tableScroller div_color rounded p-3">
 		<h3 class="text-white mx-2 text-center my-0"><input type="text" name="" class="div_color" id="searchInfo" placeholder="Enter ID"> <label for="searchInfo">to get information about Faculty member</label></h3>
 		<p class="searchWarming my-0"></p>
 		<?php 
		 		// Select all member
			$Student_info = "SELECT * FROM student_info";
			$stdInfo_result = $connection->query($Student_info);
			if ($stdInfo_result == false) {
				echo "Selection Faield". $connection->error;
			}
 		 ?>
 		<table class="table table-dark table-bordered table-striped rounded my-3" id="table">
	 		<thead>
	 			<tr>
	 				<td></td>
	 				<th>Department</th>
	 				<th>Department ID</th>
	 				<th>First Name</th>
	 				<th>Last Name</th>
	 				<th>Date of Birth</th>
	 				<th>Email</th>
	 				<th>Password</th>
	 			</tr>
	 		</thead>
	 		<tbody>
	 			<?php while ($row = mysqli_fetch_array($stdInfo_result)) {
 				 ?>
	 			<tr>
	 				<td></td>
	 				<td><?= $row['department'];?></td>
	 				<td><?= $row['department_id'];?></td>
	 				<td><?= $row['fname'];?></td>
			        <td><?= $row['lname'];?></td>
			        <td><?= $row['date_of_birth'];?></td>
			        <td><?= $row['email'];?></td>
			        <td><?= $row['password'];?></td>
	 			</tr>
	 			<?php } ?>
	 		</tbody>
	 	</table>
 	</div>
</section>
</body>
</html>