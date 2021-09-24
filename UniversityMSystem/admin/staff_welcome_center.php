<!DOCTYPE html>
<html>
<head>
	<title>Office of the President</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	// ==============Global variable===========
	$staff_posi_count = 0;
	$staff_position = "";

	//================Staff Instruction===============
	// Delete
	if (isset($_GET['instruction_delete']) && !empty($_GET['instruction_delete'])) {
		$instruction_delete_id = (int)$_GET['instruction_delete'];
		$sql_delete = "DELETE FROM past_president WHERE id = $instruction_delete_id";
		$instruction_delete = $connection->query($sql_delete);
		header('location: staff_welcome_center.php');
	}

	// edit
	 $instruction_category = "";
	 $instuc_title = "";
	 $instuc_body = "";
	 $instruction_edit_id = 0;
	if (isset($_GET['instruction_edit']) && !empty($_GET['instruction_edit'])) {
		$instruction_edit_id = (int)$_GET['instruction_edit'];
		$sql_edit = "SELECT * FROM staff_member_instruction WHERE id = $instruction_edit_id";
		$instruction_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($instruction_edit);
	 }

	 if(isset($_GET['instruction_edit'])){
	 	$instruction_category = $edit_post_row['category'];
		$instuc_title = $edit_post_row['title'];
		$instuc_body = $edit_post_row['body'];
	}else{
		if(isset($_POST['staff_member_instruc_post'])){
			$instruction_category = $_POST['staff_ins_category'];
			$instuc_title = $_POST['staff_title'];
			$instuc_body = $_POST['editor'];
		}
	}
	if(isset($_POST['staff_member_instruc_post'])){
		$instruction_category = $_POST['staff_ins_category'];
		$instuc_title = $_POST['staff_title'];
		$instuc_body = $_POST['editor'];


		$sql = "INSERT INTO staff_member_instruction(category, title, body) VALUES ('$instruction_category','$instuc_title', '$instuc_body')";
			if(isset($_GET['instruction_edit'])){
				$sql = "UPDATE staff_member_instruction SET category = '$instruction_category', title = '$instuc_title', body = '$instuc_body' WHERE id = $instruction_edit_id";
			}
			$staff_instu_exe = $connection->query($sql);
			if(!$staff_instu_exe){
				echo "Insert Failed :".$connection->error;
			}else{
				echo "Inserted";
			}
			header('location: staff_welcome_center.php');
	}

 ?>
<?php
	include 'include/head.php';
?>
<div class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Office of the President
</div>
<?php
	include 'include/sidenavbar.php';
 ?>
 <section class="container">
 	<div class="row justify-content-center">
 		<div class="col-sm-12">
 			<div class="my-3" id="president_tabs">
				<ul class="nav nav-tabs justify-content-around">
					<li class="nav-item div_color rounded-top"><a href="#staff_member" class="nav-link active" data-toggle="tab">Staff Member info</a></li>
					<li class="nav-item div_color rounded-top"><a href="#staff_instruction" class="nav-link" data-toggle="tab">Staff instruction</a></li>
				</ul>

				<div class="tab-content">
					<div class="py-3 big_div_color tab-pane fade show active" id="staff_member">
					 	<div class="row justify-content-around text-white">
							<div class="col-sm-6 p-0">
							 	<div class="row p-0 m-0">
							 		<div class="col-md-5 p-0 m-2">
							 			<?php 
					 						// select Total membe
											$member = "SELECT * FROM staff_member_info";
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
							 					<h4>Staff Member</h4>
							 					<h1 class="text-right">40</h1>
							 				</div>
							 			</div>
							 		</div>
							 	</div>
							 	<div class="row p-0 m-0">
							 		<div class="col-sm-10 p-0 my-2 mx-3">
							 			<div class="card div_color">
							 				<div class="card-body">
							 					<?php 
							 						// select by position
													if(isset($_POST['staffnum'])){
														$staff_position = $_POST['staff_position'];
														if($staff_position == ""){
															$staff_posi_count = 0;
															echo "<script>alert('Select Position please');</script>";
														}else{
															$staff_posi_member = "SELECT * FROM staff_member_info WHERE position = '$staff_position'";
															$staff_posi_member_res = $connection->query($staff_posi_member);
														$staff_posi_count = mysqli_num_rows($staff_posi_member_res);
														}
													}
							 					 ?>
							 					<form action="staff_welcome_center.php" method="post" id="SearchDepFacMember">
							 						<div class="input-group">
							 							<select class="form-control" name="staff_position" id="staff_position">
															<option value="">--Select--</option>
															<option value="Registrar">Registrar</option>
															<option value="Deputy Registrar">Deputy Registrar</option>
															<option value="Deputy Registrar, Admission">Deputy Registrar, Admission</option>
															<option value="Senior Asst. Registrar">Senior Asst. Registrar</option>
															<option value="Manager">Manager</option>
															<option value="Civil Engineering">Civil Engineering</option>
															<option value="Deputy Manager">Deputy Manager</option>
															<option value="Assistant Manager">Assistant Manager</option>
															<option value="Admission & Registration Officer">Admission & Registration Officer</option>
															<option value="Admission Officer">Admission Officer</option>
															<option value="Economics">Other</option>
														</select>
							 							<div class="input-group-append">
							 								<input type="submit" name="staffnum" class="btn" value="Search" id="StaffSearch">
							 							</div>
							 						</div>
							 					</form>
							 					<h4>Staff member by the Position</h4>
							 					<h6><?php if($staff_position != ""){echo $staff_position." :";} ?></h6>
							 					<div class="d-flex justify-content-between mt-4">
							 						<h1><i class="fas fa-chart-pie"></i></h1>
							 						<h1 class="text-right"><?php echo $staff_posi_count; ?></h1>
							 					</div>
							 				</div>
							 			</div>
							 		</div>
							 	</div>
							</div>

							<!-------------- Insert initial information of Staff -------------->
							<div class="col-sm-5 m-3 div_color rounded">
							 	<h4 class="py-2 text-center">Initial infomation of staff</h4>
							 	<form action="staff_welcome_center.php" method="post" class="p-3" id="staffSignUpInfoform">

							 		<label for="staffsignupInfoID">Staff ID</label>
							 		<div class="input-group mb-2">
								        <div class="input-group-prepend">
								          <div class="input-group-text">USID -</div>
								        </div>
								        <input type="text" name="staffSignupInfo" id="staffSignupInfo" class="form-control">
										<div class="d-flex justify-content-end">
											<div class="mb-2 staffSignupID_error_message"></div>
										</div>
								    </div>
									<div class="form-group">
										<label for="staffsignupInfoPosition">Position</label>
										<select class="form-control" name="staffsignupInfoPosition" id="staffsignupInfoPosition">
											<option value="">--Select--</option>
											<option value="Registrar">Registrar</option>
											<option value="Deputy Registrar">Deputy Registrar</option>
											<option value="Deputy Registrar, Admission">Deputy Registrar, Admission</option>
											<option value="Senior Asst. Registrar">Senior Asst. Registrar</option>
											<option value="Manager">Manager</option>
											<option value="Civil Engineering">Civil Engineering</option>
											<option value="Deputy Manager">Deputy Manager</option>
											<option value="Assistant Manager">Assistant Manager</option>
											<option value="Admission & Registration Officer">Admission & Registration Officer</option>
											<option value="Admission Officer">Admission Officer</option>
											<option value="Economics">Other</option>
										</select>
										<div class="d-flex justify-content-end">
											<div class="mb-2 staffSignupID_error_message"></div>
										</div>

										<label for="staffBirthDateInfo">Birth of Date</label>
										<input type="date" name="staffBirthDateInfo" id="staffBirthDateInfo" class="form-control">
										<div class="d-flex justify-content-end">
											<div class="mb-2 facSignupBirth_error_message"></div>
										</div>

										<label for="facEmailInfo">Email</label>
										<input type="email" name="staffSignupEmailInfo" id="staffSignupEmailInfo" class="form-control">
										<div class="d-flex justify-content-end">
											<div class="mb-2 facSignupEmail_error_message"></div>
										</div>
										<div class="d-flex justify-content-end my-2">
											<button type="submit" name="StaffInfosubmit" class="btn btn-info">Save Info</button>
										</div>
									</div>
							 	</form>
							 	<?php
							 		if(isset($_POST['StaffInfosubmit'])){
							 			$staffSignupID = strtoupper($_POST['staffSignupInfo']);
							 		$sql = "INSERT INTO staff_member_info (staff_id, position, date_of_birth, email) VALUES ('USID-$staffSignupID','$_POST[staffsignupInfoPosition]', '$_POST[staffBirthDateInfo]', '$_POST[staffSignupEmailInfo]')";
							 		$staffInfoInsert = $connection->query($sql);

							 		if(!$staffInfoInsert){
							 			echo "Insert Faield:".$connection->error;
							 		}else{
							 			echo "<script type='text/javascript'>alert('Inserted');</script>";
							 		}
							 		}
							 	 ?>
							</div>
					 	</div>
					 	<div class="tableScroller div_color rounded p-3">
					 		<h3 class="text-white mx-2 text-center my-0"><input type="text" name="" class="div_color" id="searchInfo" placeholder="Enter ID"> <label for="searchInfo">to get information about Faculty member</label></h3>
					 		<p class="searchWarming my-0"></p>
					 		<?php 
							 	// Select all member
								$staff_info = "SELECT * FROM staff_member_info";
								$staff_result = $connection->query($staff_info);
								if ($staff_result == false) {
									echo "Selection Faield". $connection->error;
								}
					 		 ?>
					 		<table class="table table-dark table-bordered table-striped rounded my-3" id="table">
						 		<thead>
						 			<tr>
						 				<td></td>
						 				<th>Staff ID</th>
						 				<th>First Name</th>
						 				<th>Last Name</th>
						 				<th>Position</th>
						 				<th>Date of Birth</th>
						 				<th>Email</th>
						 				<th>Password</th>
						 			</tr>
						 		</thead>
						 		<tbody>
						 			<?php while ($row = mysqli_fetch_array($staff_result)) {
					 				 ?>
						 			<tr>
						 				<td></td>
						 				<td><?= $row['staff_id'];?></td>
						 				<td><?= $row['fname'];?></td>
						 				<td><?= $row['lname'];?></td>
								        <td><?= $row['position'];?></td>
								        <td><?= $row['date_of_birth'];?></td>
								        <td><?= $row['email'];?></td>
								        <td><?= $row['password'];?></td>
						 			</tr>
						 			<?php } ?>
						 		</tbody>
						 	</table>
					 	</div>
					</div>

					<div class="px-3 big_div_color tab-pane fade" id="staff_instruction">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Stuff Instruction</h2>
					 			</div>
					 			<form action="staff_welcome_center.php<?=((isset($_GET['instruction_edit']))?'?instruction_edit='.$instruction_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="staff_ins_category"><?=(isset($_GET['instruction_edit'])?'Edit':'');?> Instruction Cetegory</label>
			 							<select class="form-control" name="staff_ins_category" id="staff_ins_category">
											<?php 
												if (isset($_GET['instruction_edit']) && !empty($_GET['instruction_edit'])) { ?>
												<option value="<?=$instruction_category?>"><?=$instruction_category?> <small>(selected)</small></option>
											<?php
												}else{ ?>
													<option value="">--Select--</option>
											<?php
												}
											 ?>
											<option value="Before You Arrive">Before You Arrive</option>
											<option value="Your First Day">Your First Day</option>
											<option value="Day Two and Beyond">Day Two &amp; Beyond</option>
											<option value="Training and Compliance">Training &amp; Compliance</option>
										</select>
			 						</div>
					 				<div class="form-group">
					 					<label for="staff_title"><?=(isset($_GET['instruction_edit'])?'Edit':'');?> Title</label>
					 					<input type="text" name="staff_title" class="form-control" id="staff_title" placeholder="Enter Title" value="<?=$instuc_title	?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="Staff_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="editor"><?=(isset($_GET['instruction_edit'])?'Edit':'');?> Body :</label>
					 					<textarea class="ckeditor" name="editor" id="staff_body"><?php echo $instuc_body?></textarea>
					 					<div class="d-flex">
					 						<small class="Staff_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['instruction_edit'])): ?>
					 						<div><a href="staff_member_instruction.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="staff_member_instruc_post" id="staff_member_instruc_post" value="<?=((isset($_GET['instruction_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>

								 <!-- Select Before You Arrive -->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Before You Arrive</h2>
								<?php

									$sql = "SELECT * FROM staff_member_instruction WHERE category = 'Before You Arrive'";
									$taff_member_instruction_result = $connection->query($sql);
									if(!$taff_member_instruction_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($taff_member_instruction_result) > 0){
											while ($row = mysqli_fetch_array($taff_member_instruction_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?instruction_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?instruction_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>"><?= $row['body']; ?></div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>
								 <!-- Select Your First Day -->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Your First Day</h2>
								<?php

									$sql = "SELECT * FROM staff_member_instruction WHERE category = 'Your First Day'";
									$taff_member_instruction_result = $connection->query($sql);
									if(!$taff_member_instruction_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($taff_member_instruction_result) > 0){
											while ($row = mysqli_fetch_array($taff_member_instruction_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?instruction_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?instruction_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>"><?= $row['body']; ?></div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>

								 <!-- Select Day Two and Beyond -->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Day Two and Beyond</h2>
								<?php

									$sql = "SELECT * FROM staff_member_instruction WHERE category = 'Day Two and Beyond'";
									$taff_member_instruction_result = $connection->query($sql);
									if(!$taff_member_instruction_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($taff_member_instruction_result) > 0){
											while ($row = mysqli_fetch_array($taff_member_instruction_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?instruction_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?instruction_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>"><?= $row['body']; ?></div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>

								 <!-- Select Training and Compliance-->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Training and Compliance</h2>
								<?php

									$sql = "SELECT * FROM staff_member_instruction WHERE category = 'Training and Compliance'";
									$taff_member_instruction_result = $connection->query($sql);
									if(!$taff_member_instruction_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($taff_member_instruction_result) > 0){
											while ($row = mysqli_fetch_array($taff_member_instruction_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?instruction_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?instruction_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>"><?= $row['body']; ?></div>
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
 </section>
</body>
</html>
