
<!DOCTYPE html>
<html>
<head>
	<title>Board_of Trustes</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	//================News and Update===============
	// delete
	if (isset($_GET['trust_news_delete']) && !empty($_GET['trust_news_delete'])) {
		$trust_news_delete_id = (int)$_GET['trust_news_delete'];
		$sql_trust_news_delete = "DELETE FROM board_of_trustes_news WHERE id = $trust_news_delete_id";
		$trust_news_delete = $connection->query($sql_trust_news_delete);
		header('location: staff_board_of_trustes.php');

	}
	
	// edit
	 $trust_news_title_value = "";
	 $trust_news_body_value = "";
	 $trust_news_edit_id = 0;
	if (isset($_GET['trust_news_edit']) && !empty($_GET['trust_news_edit'])) {
		$trust_news_edit_id = (int)$_GET['trust_news_edit'];
		$sql_edit = "SELECT * FROM board_of_trustes_news WHERE id = $trust_news_edit_id";
		$trust_news_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($trust_news_edit);
	// 	header('location: faculty_appontment_info.php');
	 }
	 if(isset($_GET['trust_news_edit'])){
		$trust_news_title_value = $edit_post_row['title'];
		$trust_news_body_value = $edit_post_row['body'];
	}else{
		if(isset($_POST['trust__news_post'])){
			$trust_news_title_value = $_POST['news_title'];
			$trust_news_body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['trust__news_post'])){
		$trust_news_title_value = $_POST['news_title'];
		$trust_news_body_value = $_POST['editor'];

		$sql = "INSERT INTO board_of_trustes_news(title, body) VALUES ('$trust_news_title_value','$trust_news_body_value')";
		if(isset($_GET['trust_news_edit'])){
			$sql = "UPDATE board_of_trustes_news SET title = '$trust_news_title_value', body = '$trust_news_body_value' WHERE id = $trust_news_edit_id";
		}
		$trust_news = $connection->query($sql);
		if(!$trust_news){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: staff_board_of_trustes.php');
	}

	// =================President Speeches=====================

	// Delete
	if (isset($_GET['prov_spees_delete']) && !empty($_GET['prov_spees_delete'])) {
		$spees_delete_id = (int)$_GET['prov_spees_delete'];

		$prov_video_info = "SELECT * FROM board_of_trustes_member WHERE id = $spees_delete_id";
		$prov_video_info_result = $connection->query($prov_video_info);
		if ($prov_video_info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($prov_video_info_result)){
			$thmimg_del = $row['image'];
			unlink("../".$thmimg_del);
		}

		$sql_spees_delete = "DELETE FROM board_of_trustes_member WHERE id = $spees_delete_id";
		$trust_news_delete = $connection->query($sql_spees_delete);
		header('location: staff_board_of_trustes.php');
	}

	// Delete path
	$thmimg_del = "";
	// trust_board_mem_delete
	if (isset($_GET['trust_board_mem_delete'])){
		$spees_delete_id = (int)$_GET['trust_board_mem_delete'];
		$pro_thum_img_info = "SELECT * FROM board_of_trustes_member WHERE id = $spees_delete_id";
		$pro_thum_img__info_result = $connection->query($pro_thum_img_info);
		if ($pro_thum_img__info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($pro_thum_img__info_result)){
			$thmimg_del = $row['image'];
			unlink("../".$thmimg_del);
		}

		$sql_spees_delete = "UPDATE board_of_trustes_member SET image = '' WHERE id = $spees_delete_id";
		$trust_news_delete = $connection->query($sql_spees_delete);
		header('location: staff_board_of_trustes.php?trust_board_mem_edit='.$spees_delete_id);

	}

	// edit
	$destination = "";
	$destination_path = "";
	$trust_board_mem_name = "";
	$trust_board_mem_position = "";
	$trust_board_mem_address = "";
	$trust_board_mem_edit_id = 0;
	if (isset($_GET['trust_board_mem_edit']) && !empty($_GET['trust_board_mem_edit'])) {
		$trust_board_mem_edit_id = (int)$_GET['trust_board_mem_edit'];
		$sql_edit = "SELECT * FROM board_of_trustes_member WHERE id = $trust_board_mem_edit_id";
		$trust_board_mem_res = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($trust_board_mem_res);
	 }

	 if(isset($_GET['trust_board_mem_edit'])){
	 	$trust_board_mem_name = $edit_post_row['name'];
	 	$destination_path = $edit_post_row['image'];
	 	$trust_board_mem_position = $edit_post_row['position'];
		$trust_board_mem_address = $edit_post_row['address'];
	}else{
		if(isset($_POST['trust_board_mem_post'])){
			$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['trust_board_mem_img']['name']);
			$destination = "../images/staff/".$file_name;
			$destination_path = "images/staff/".$file_name;
			$filename = $_FILES['trust_board_mem_img']['tmp_name'];

			$trust_board_mem_name = $_POST['trust_board_mem_name'];
			$trust_board_mem_position = $_POST['trust_board_mem_position'];
			$trust_board_mem_address = $_POST['trust_board_mem_address'];
			if(move_uploaded_file($filename, $destination)){
			$sql = "INSERT INTO board_of_trustes_member(name,image,position,address) VALUES ('$trust_board_mem_name', '$destination_path', '$trust_board_mem_position', '$trust_board_mem_address')";
			$trust_news = $connection->query($sql);
			}
		}
	}
	if(isset($_POST['trust_board_mem_post'])){

		$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['trust_board_mem_img']['name']);
		$destination = "../images/staff/".$file_name;
		$destination_path = "images/staff/".$file_name;
		$filename = $_FILES['trust_board_mem_img']['tmp_name'];

		$trust_board_mem_name = $_POST['trust_board_mem_name'];
		$trust_board_mem_position = $_POST['trust_board_mem_position'];
		$trust_board_mem_address = $_POST['trust_board_mem_address'];


		if(isset($_GET['trust_board_mem_edit'])){
			$sql = "UPDATE board_of_trustes_member SET name = '$trust_board_mem_name', image = '$destination_path', position = '$trust_board_mem_position',  address = '$trust_board_mem_address' WHERE id = $trust_board_mem_edit_id";
			if(move_uploaded_file($filename, $destination)){
			$sql = "UPDATE board_of_trustes_member SET name = '$trust_board_mem_name', image = '$destination_path', position = '$trust_board_mem_position',  address = '$trust_board_mem_address' WHERE id = $trust_board_mem_edit_id";
			}
			$trust_news = $connection->query($sql);
		}
		header('location: staff_board_of_trustes.php');
	}

	//========================= Contact========================
	// Delete
	if (isset($_GET['trust_contact_delete']) && !empty($_GET['trust_contact_delete'])) {
		$trust_contact_delete_id = (int)$_GET['trust_contact_delete'];
		$sql_delete = "DELETE FROM board_of_trustes_contact WHERE id = $trust_contact_delete_id";
		$trust_contact_delete = $connection->query($sql_delete);
		header('location: staff_board_of_trustes.php');
	}

	// edit
	$trust_office_name = "";
	$trust_office_address = "";
	$trust_office_phone = "";
	$trust_office_email = "";
	$trust_contact_edit_id = 0;
	if (isset($_GET['trust_contact_edit']) && !empty($_GET['trust_contact_edit'])) {
		$trust_contact_edit_id = (int)$_GET['trust_contact_edit'];
		$sql_edit = "SELECT * FROM board_of_trustes_contact WHERE id = $trust_contact_edit_id";
		$past_trust_res = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($past_trust_res);
	 }

	 if(isset($_GET['trust_contact_edit'])){
	 	$trust_office_name = $edit_post_row['office_name'];
		$trust_office_address = $edit_post_row['office_address'];
		$trust_office_phone = $edit_post_row['office_phone'];
		$trust_office_email = $edit_post_row['office_email'];

	}else{
		if(isset($_POST['trust_contact_post'])){

			$trust_office_name = $_POST['trust_office_name'];
			$trust_office_address = $_POST['trust_office_address'];
			$trust_office_phone = mysqli_real_escape_string($connection, $_POST['trust_office_phone']);
			$trust_office_email = $_POST['trust_office_email'];
			$sql = "INSERT INTO board_of_trustes_contact(office_name,office_address,office_phone,office_email) VALUES ('$trust_office_name', '$trust_office_address', '$trust_office_phone', '$trust_office_email')";
			$trust_contact = $connection->query($sql);
		}
	}
	if(isset($_POST['trust_contact_post'])){

		$trust_office_name = $_POST['trust_office_name'];
		$trust_office_address = $_POST['trust_office_address'];
		$trust_office_phone = mysqli_real_escape_string($connection, $_POST['trust_office_phone']);
		$trust_office_email = $_POST['trust_office_email'];


		if(isset($_GET['trust_contact_edit'])){
			$sql = "UPDATE board_of_trustes_contact SET office_name = '$trust_office_name', office_address = '$trust_office_address', office_phone ='$trust_office_phone', office_email = '$trust_office_email'  WHERE id = $trust_contact_edit_id";
			$trust_news = $connection->query($sql);
		}
		// header('location: staff_board_of_trustes.php');
	}

 ?>
<?php
	include 'include/head.php';
?>
<div class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Board of Trustes</h1>
</div>
<?php
	include 'include/sidenavbar.php';
 ?>
 <section class="container">
 	<div class="row justify-content-center">
 		<div class="col-sm-12">
 			<div class="my-3" id="president_tabs">
				<ul class="nav nav-tabs justify-content-around">
					<li class="nav-item div_color rounded-top"><a href="#newsUpdate" class="nav-link active" data-toggle="tab">News &amp; Update</a></li>
					<li class="nav-item div_color rounded-top"><a href="#board_members" class="nav-link" data-toggle="tab">Board Members</a></li>
					<li class="nav-item div_color rounded-top"><a href="#contact" class="nav-link" data-toggle="tab">Past President</a></li>
				</ul>
				<div class="tab-content">
					<div class="py-3 big_div_color tab-pane fade show active" id="newsUpdate">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Update & News</h2>
					 			</div>
					 			<form action="staff_board_of_trustes.php<?=((isset($_GET['trust_news_edit']))?'?trust_news_edit='.$trust_news_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['trust_news_edit'])?'Edit':'');?> News Title</label>
					 					<input type="text" name="news_title" class="form-control" id="news_title" placeholder="News Title" value="<?=$trust_news_title_value?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['trust_news_edit'])?'Edit':'');?> Post Body :</label>
					 					<textarea class="ckeditor" name="editor" id="news_body"><?php echo $trust_news_body_value?></textarea>
					 					<div class="d-flex">
					 						<small class="staff_news_body_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['trust_news_edit'])): ?>
					 						<div><a href="staff_board_of_trustes.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="trust__news_post" id="trust__news_post" value="<?=((isset($_GET['trust_news_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">All News list</h2>
								<?php

									$sql = "SELECT * FROM board_of_trustes_news";
									$pre_result = $connection->query($sql);
									if(!$pre_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($pre_result) > 0){
											while ($row = mysqli_fetch_array($pre_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?trust_news_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?trust_news_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="<?= $row['id']; ?>"><?= $row['body']; ?></div>
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

					<div class="p-3 big_div_color tab-pane fade" id="board_members">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Board Members</h2>
					 			</div>
					 			<form action="staff_board_of_trustes.php<?=((isset($_GET['trust_board_mem_edit']))?'?trust_board_mem_edit='.$trust_board_mem_edit_id:'');?>" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">

					 				<div class="form-group">
					 					<label for="trust_board_mem_name"><?=(isset($_GET['trust_board_mem_edit'])?'Edit':'');?> Name</label>
					 					<input type="text" name="trust_board_mem_name" class="form-control" id="trust_board_mem_name" placeholder="Enter Name" value="<?=$trust_board_mem_name?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_name_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="form-group">
					 					<label for="trust_board_mem_img"><?=(isset($_GET['trust_board_mem_edit'])?'Edit':'');?> image</label>
					 					<input type="file" name="trust_board_mem_img" class="form-control" id="trust_board_mem_img">
					 					<div class="d-flex justify-content-end">
					 						<small class="trust_board_mem_img_error_message"></small>
					 					</div>
					 					<?php 
						 					if(isset($_GET['trust_board_mem_edit'])){
						 					$trust_board_mem_edit_id = (int)$_GET['trust_board_mem_edit'];
											$sql_edit = "SELECT * FROM board_of_trustes_member WHERE id = $trust_board_mem_edit_id";
											$trust_board_mem_res = $connection->query($sql_edit);
											$edit_post_row = mysqli_fetch_array($trust_board_mem_res);
											if($edit_post_row['image'] == ''){}else{
										?>
										<div class="form-group" id="pre_img_hide">
					 						<div class="d-flex justify-content-start">
						 						<div><img src="../<?=$destination_path?>" width="150px" height="100px"></div>
						 						<div>
						 							<a href="?trust_board_mem_delete=<?=$_GET['trust_board_mem_edit']?>" class="btn aDesign" id="trust_board_mem_delete"><i class="fas fa-trash-alt"></i></a>
						 						</div>
					 						</div>
						 				</div>
										<?php
												}
											}
					 					  ?>
					 				</div>

					 				<div class="form-group">
					 					<label for="trust_board_mem_position"><?=(isset($_GET['trust_board_mem_edit'])?'Edit':'');?> Position</label>
					 					<input type="text" name="trust_board_mem_position" class="form-control" id="trust_board_mem_position" placeholder="Enter Position" value="<?=$trust_board_mem_position?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_position_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="form-group">
					 					<label for="trust_board_mem_address"><?=(isset($_GET['trust_board_mem_edit'])?'Edit':'');?> Link</label>
					 					<input type="text" name="trust_board_mem_address" class="form-control" id="trust_board_mem_address" placeholder="Enter Address" value="<?=$trust_board_mem_address?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_address_title_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['trust_board_mem_edit'])): ?>
					 						<div><a href="staff_board_of_trustes.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="trust_board_mem_post" id="trust_board_mem_post" value="<?=((isset($_GET['trust_board_mem_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
							</div>
						</div>
						<div class="m-2">
						 	<div class="tableScroller div_color rounded p-3">
						 		<?php 
								 		// Select all video
									$faculty_info = "SELECT * FROM board_of_trustes_member";
									$facInfo_result = $connection->query($faculty_info);
									if ($facInfo_result == false) {
										echo "Selection Faield". $connection->error;
									}
						 		 ?>
						 		<table class="table table-dark table-bordered table-striped rounded my-3 class="text-center"" id="pre_spc_table">
							 		<thead>
							 			<tr>
							 				<td></td>
							 				<th>ID</th>
							 				<th>Name</th>
							 				<th>Image</th>
							 				<th>Position</th>
							 				<th>Address</th>
							 				<th></th>
							 			</tr>
							 		</thead>
							 		<tbody>
							 			<?php while ($row = mysqli_fetch_array($facInfo_result)) {
						 				 ?>
							 			<tr>
							 				<td><a href="?trust_board_mem_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a></td>
							 				<td><?= $row['id'];?></td>
							 				<td><?= $row['name']; ?></td>
							 				<td><img src="../<?= $row['image']; ?>" width="200px" height="100px"></td>
							 				<td><?= $row['position']; ?></td>
							 				<td><?= $row['address']; ?></td>
									        <td><a href="?prov_spees_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a></td>
							 			</tr>
							 			<?php } ?>
							 		</tbody>
							 	</table>
						 	</div>
						</div>
					</div>

					<div class="px-3 big_div_color tab-pane fade" id="contact">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Contact</h2>
					 			</div>
					 			<form action="staff_board_of_trustes.php<?=((isset($_GET['trust_contact_edit']))?'?trust_contact_edit='.$trust_contact_edit_id:'');?>" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">

					 				<div class="form-group">
					 					<label for="trust_office_name"><?=(isset($_GET['trust_contact_edit'])?'Edit':'');?> Office Name: </label>
					 					<input type="text" name="trust_office_name" class="form-control" id="trust_office_name" placeholder="Office Name" value="<?=$trust_office_name?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="form-group">
					 					<label for="trust_office_address"><?=(isset($_GET['trust_contact_edit'])?'Edit':'');?> Office Address: </label>
					 					<input type="text" name="trust_office_address" class="form-control" id="trust_office_address" placeholder="Office Address" value="<?=$trust_office_address?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="form-group">
					 					<div class="row justify-content-between">
					 						<div class="col-md-6">
					 							<label for="trust_office_phone"><?=(isset($_GET['trust_contact_edit'])?'Edit':'');?> Phone Number: </label>
							 					<input type="tel" name="trust_office_phone" class="form-control" id="trust_office_phone" placeholder="Phone Number" required value="<?=$trust_office_phone?>">
							 					<div class="d-flex justify-content-end">
							 						<small class="staff_news_title_error_message"></small>
							 					</div>
							 				</div>
					 						<div class="col-md-6">
					 							<label for="trust_office_email"><?=(isset($_GET['trust_contact_edit'])?'Edit':'');?> Email: </label>
							 					<input type="email" name="trust_office_email" class="form-control" id="trust_office_email" placeholder="Enter Email" value="<?=$trust_office_email?>">
							 					<div class="d-flex justify-content-end">
							 						<small class="staff_news_title_error_message"></small>
							 					</div>
					 						</div>
					 					</div>
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>


					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['trust_contact_edit'])): ?>
					 						<div><a href="staff_board_of_trustes.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="trust_contact_post" id="trust_contact_post" value="<?=((isset($_GET['trust_contact_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
							</div>
						</div>
						<div class="my-3 accodion" id="accodion">
							 <h2 class="text-center text-white">Contact Information</h2>
							<?php

								$trust_contact_info = "SELECT * FROM board_of_trustes_contact";
								$past_trust_result = $connection->query($trust_contact_info);
								if ($past_trust_result == false) {
									echo "Selection Faield". $connection->error;
								}else{
									if(mysqli_num_rows($past_trust_result) > 0){
										while ($row = mysqli_fetch_array($past_trust_result)) {
							?>
										 	<div class="my-1">
										 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
										 			<div>
										 				<a href="?trust_contact_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
										 				<a href="?trust_contact_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
										 			</div>
											 		<div><?=$row['office_name'];?></div>
											 		<div><i class="fas fa-plus px-2"></i></div>
											 	</div>
											 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>">
											 		<div class="row">
											 			<div class="col-md-12">
											 				<address>
						 										<p class="m-0 p-1"><b>Address: </b><?= $row['office_address'];?></p>
						 										<p class="m-0 p-1"><b>Phone Number: </b><?= $row['office_phone'];?></p>
						 										<p class="m-0 p-1"><b>Email: </b><?= $row['office_email'];?></p>
						 									</address>
											 			</div>
											 		</div>
											 	</div>
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
</body>
</html>
