 <?php
 	

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Faculty Member info</title>
<?php
	include 'include/head.php';
?>
<header class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Faculty infomation right here</h1>
</header>
<?php
	include 'require/dbconnection.php';
	include 'include/sidenavbar.php';
	$defFacCon = 0;
	$dep = "";
 ?>
<section class="container">
 	<div class="row justify-content-around text-white">
		<div class="col-sm-6 p-0">
		 	<div class="row p-0 m-0">
		 		<div class="col-md-5 p-0 m-2">
		 			<?php 
 						// select Total membe
						$member = "SELECT * FROM faculty_member_info";
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
								if(isset($_POST['facnum'])){
									$dep = $_POST['Departmentname'];
									if($dep == ""){
										$defFacCon = 0;
										echo "<script>alert('Select Department please');</script>";
									}else{
										$dep_member = "SELECT * FROM faculty_member_info WHERE department = '$dep'";
										$depFacMemRes = $connection->query($dep_member);
									$defFacCon = mysqli_num_rows($depFacMemRes);
									}
								}
		 					 ?>
		 					<form action="faculty_member_info.php" method="post" id="SearchDepFacMember">
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
		 								<input type="submit" name="facnum" class="btn" value="Search" id="FacSearch">
		 							</div>
		 						</div>
		 					</form>
		 					<h4>Faculty member by the Depeartment</h4>
		 					<h6><?php if($dep != ""){echo $dep." :";} ?></h6>
		 					<div class="d-flex justify-content-between mt-4">
		 						<h1><i class="fas fa-chart-pie"></i></h1>
		 						<h1 class="text-right"><?php echo $defFacCon; ?></h1>
		 					</div>
		 				</div>
		 			</div>
		 		</div>
		 	</div>
		</div>
		<div class="col-sm-5 m-3 div_color rounded">
		 	<h4 class="py-2 text-center">Initial infomation of faculty</h4>
		 	<form action="faculty_member_info.php" method="post" class="p-3" id="facSignUpInfoform">
				<div class="form-group">
					<label for="facsignupInfoID">Faculty ID</label>
					<input type="text" name="facsignupInfo" id="facsignupInfo" class="form-control">
					<div class="d-flex justify-content-end">
						<div class="mb-2 facSignupID_error_message"></div>
					</div>

					<label for="facBirthDateInfo">Birth of Date</label>
					<input type="date" name="facBirthDateInfo" id="facsignupBirthDateInfo" class="form-control">
					<div class="d-flex justify-content-end">
						<div class="mb-2 facSignupBirth_error_message"></div>
					</div>

					<label for="facEmailInfo">Email</label>
					<input type="email" name="facsignupEmailInfo" id="facsignupEmailInfo" class="form-control">
					<div class="d-flex justify-content-end">
						<div class="mb-2 facSignupEmail_error_message"></div>
					</div>
					<div class="d-flex justify-content-end my-2">
						<button type="submit" name="Facultyinfosubmit" class="btn btn-info">Save Info</button>
					</div>
				</div>
		 	</form>
		 	<?php
		 		if(isset($_POST['Facultyinfosubmit'])){
		 			$facsignupID = strtoupper($_POST['facsignupInfo']);
		 		$sql = "INSERT INTO faculty_member_info (department_id, date_of_birth, email) VALUES ('$facsignupID', '$_POST[facBirthDateInfo]', '$_POST[facsignupEmailInfo]')";
		 		$facinfoInsert = $connection->query($sql);

		 		if(!$facinfoInsert){
		 			echo "Insert Faield:".$connection->error;
		 		}else{
		 			echo "<script type='text/javascript'>alert('Inserted');</script>";
		 		}
		 		}
		 	 ?>
		</div>
 	</div>
</section>
<section class="container">
 	<div class="tableScroller div_color rounded p-3">
 		<h3 class="text-white mx-2 text-center my-0"><input type="text" name="" class="div_color" id="searchFacultyInfo" placeholder="Enter ID"> <label for="searchFacultyInfo">to get information about Faculty member</label></h3>
 		<p class="searchWarming my-0"></p>
 		<?php 
		 		// Select all member
			$faculty_info = "SELECT * FROM faculty_member_info";
			$facInfo_result = $connection->query($faculty_info);
			if ($facInfo_result == false) {
				echo "Selection Faield". $connection->error;
			}
 		 ?>
 		<table class="table table-dark table-bordered table-striped rounded my-3" id="factable">
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
	 			<?php while ($row = mysqli_fetch_array($facInfo_result)) {
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
<?php
	include 'include/footer.php';
 ?>