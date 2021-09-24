
<!DOCTYPE html>
<html>
<head>
	<title>Office of the Provost</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	//================News and Update===============
	// delete
	if (isset($_GET['pro_news_delete']) && !empty($_GET['pro_news_delete'])) {
		$pro_news_delete_id = (int)$_GET['pro_news_delete'];
		$sql_dpro_news_delete = "DELETE FROM provost_news WHERE id = $pro_news_delete_id";
		$pro_news_delete = $connection->query($sql_dpro_news_delete);
		header('location: staff_office_of_the_provost.php');

	}
	
	// edit
	 $pro_news_title_value = "";
	 $pro_news_body_value = "";
	 $pro_pro_news_edit_id = 0;
	if (isset($_GET['pro_news_edit']) && !empty($_GET['pro_news_edit'])) {
		$pro_pro_news_edit_id = (int)$_GET['pro_news_edit'];
		$sql_edit = "SELECT * FROM provost_news WHERE id = $pro_pro_news_edit_id";
		$p_pro_news_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($p_pro_news_edit);
	// 	header('location: faculty_appontment_info.php');
	 }
	 if(isset($_GET['pro_news_edit'])){
		$pro_news_title_value = $edit_post_row['title'];
		$pro_news_body_value = $edit_post_row['body'];
	}else{
		if(isset($_POST['staff_prov_news_post'])){
			$pro_news_title_value = $_POST['news_title'];
			$pro_news_body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['staff_prov_news_post'])){
		$pro_news_title_value = $_POST['news_title'];
		$pro_news_body_value = $_POST['editor'];

		$sql = "INSERT INTO provost_news(title, body) VALUES ('$pro_news_title_value','$pro_news_body_value')";
		if(isset($_GET['pro_news_edit'])){
			$sql = "UPDATE provost_news SET title = '$pro_news_title_value', body = '$pro_news_body_value' WHERE id = $pro_pro_news_edit_id";
		}
		$p_news = $connection->query($sql);
		if(!$p_news){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: staff_office_of_the_provost.php');
	}

	//================Biography===============

	// edit
	 $provost_name = "";
	 $bio_body_value = "";
	 $pro_bio_edit_id = 0;
	if (isset($_GET['pro_bio_edit']) && !empty($_GET['pro_bio_edit'])) {
		$pro_bio_edit_id = (int)$_GET['pro_bio_edit'];
		$sql_edit = "SELECT * FROM provost_biography WHERE id = $pro_bio_edit_id";
		$p_pro_bio_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($p_pro_bio_edit);
	 }

	 if(isset($_GET['pro_bio_edit'])){
		$provost_name = $edit_post_row['name'];
		$bio_body_value = $edit_post_row['biography'];
	}else{
		if(isset($_POST['provost_details_post'])){
			$provost_name = $_POST['provost_name'];
			$bio_body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['provost_details_post'])){
		$provost_name = $_POST['provost_name'];
		$bio_body_value = $_POST['editor'];


		$sql = "UPDATE provost_biography SET name = '$provost_name', biography = '$bio_body_value' WHERE id = 1";
		$sql = "INSERT INTO provost_biography(name, biography) VALUES ('$provost_name','$bio_body_value')";

		if(isset($_GET['pro_bio_edit'])){
			$sql = "UPDATE provost_biography SET name = '$provost_name', biography = '$bio_body_value' WHERE id = $pro_bio_edit_id";
		}
		$p_news = $connection->query($sql);
		if(!$p_news){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: staff_office_of_the_provost.php');
	}

	// =================Provost Speeches=====================

	// Delete
	if (isset($_GET['prov_spees_delete']) && !empty($_GET['prov_spees_delete'])) {
		$spees_delete_id = (int)$_GET['prov_spees_delete'];

		$prov_video_info = "SELECT * FROM provost_spc_writ WHERE id = $spees_delete_id";
		$prov_video_info_result = $connection->query($prov_video_info);
		if ($prov_video_info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($prov_video_info_result)){
			$thmimg_del = $row['img_thum_path'];
			unlink("../".$thmimg_del);
		}

		$sql_spees_delete = "DELETE FROM provost_spc_writ WHERE id = $spees_delete_id";
		$pro_news_delete = $connection->query($sql_spees_delete);
		header('location: staff_office_of_the_provost.php');
	}

	// Delete path
	$thmimg_del = "";
	// pro_thm_delete
	if (isset($_GET['pro_thm_delete'])){
		$spees_delete_id = (int)$_GET['pro_thm_delete'];
		$pro_thum_img_info = "SELECT * FROM provost_spc_writ WHERE id = $spees_delete_id";
		$pro_thum_img__info_result = $connection->query($pro_thum_img_info);
		if ($pro_thum_img__info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($pro_thum_img__info_result)){
			$thmimg_del = $row['img_thum_path'];
			unlink("../".$thmimg_del);
		}

		$sql_spees_delete = "UPDATE provost_spc_writ SET img_thum_path = '' WHERE id = $spees_delete_id";
		$pro_news_delete = $connection->query($sql_spees_delete);
		header('location: staff_office_of_the_provost.php?pro_spees_edit='.$spees_delete_id);

	}

	// edit
	$destination = "";
	$destination_path = "";
	$pro_video_url = "";
	$pro_spess_edit_id = 0;
	if (isset($_GET['pro_spees_edit']) && !empty($_GET['pro_spees_edit'])) {
		$pro_spess_edit_id = (int)$_GET['pro_spees_edit'];
		$sql_edit = "SELECT * FROM provost_spc_writ WHERE id = $pro_spess_edit_id";
		$pro_spees_res = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($pro_spees_res);
	 }

	 if(isset($_GET['pro_spees_edit'])){
	 	$destination_path = $edit_post_row['img_thum_path'];
		$pro_video_url = $edit_post_row['vdo_url'];
	}else{
		if(isset($_POST['provost_speeches_post'])){
			$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['thm_img']['name']);
			$destination = "../images/staff/".$file_name;
			$destination_path = "images/staff/".$file_name;
			$filename = $_FILES['thm_img']['tmp_name'];

			$pro_video_url = mysqli_real_escape_string($connection, $_POST['video_src']);

			if(move_uploaded_file($filename, $destination)){
			$sql = "INSERT INTO provost_spc_writ(img_thum_path,vdo_url) VALUES ('$destination_path','$pro_video_url')";
			$p_news = $connection->query($sql);
			}
		}
	}
	if(isset($_POST['provost_speeches_post'])){

		$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['thm_img']['name']);
		$destination = "../images/staff/".$file_name;
		$destination_path = "images/staff/".$file_name;
		$filename = $_FILES['thm_img']['tmp_name'];

		$pro_video_url = mysqli_real_escape_string($connection, $_POST['video_src']);


		if(isset($_GET['pro_spees_edit'])){
			$sql = "UPDATE provost_spc_writ SET img_thum_path = '$destination_path', vdo_url = '$pro_video_url' WHERE id = $pro_spess_edit_id";
			if(move_uploaded_file($filename, $destination)){
			$sql = "UPDATE provost_spc_writ SET img_thum_path = '$destination_path', vdo_url = '$pro_video_url' WHERE id = $pro_spess_edit_id";
			}
			$p_news = $connection->query($sql);
		}
		header('location: staff_office_of_the_provost.php');
	}

	//========================= Past Provost========================
	// Delete
	if (isset($_GET['past_pro_delete']) && !empty($_GET['past_pro_delete'])) {
		$past_pro_delete_id = (int)$_GET['past_pro_delete'];

		$past_pre_info = "SELECT * FROM past_provost WHERE id = $past_pro_delete_id";
		$past_pro_info_result = $connection->query($past_pre_info);
		if ($past_pro_info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($past_pro_info_result)){
			$thmimg_del = $row['image'];
			unlink("../".$thmimg_del);
		}

		$sql_delete = "DELETE FROM past_provost WHERE id = $past_pro_delete_id";
		$past_pro_delete = $connection->query($sql_delete);
		header('location: staff_office_of_the_provost.php');
	}

	// Delete path
	$thmimg_del = "";
	// pro_thm_delete
	if (isset($_GET['past_pro_thm_delete'])){
		$past_pro_delete_id = (int)$_GET['past_pro_thm_delete'];
		echo $past_pro_delete_id;
		$past_pro_img_info = "SELECT * FROM past_provost WHERE id = $past_pro_delete_id";
		$past_pro_img__info_result = $connection->query($past_pro_img_info);
		if ($past_pro_img__info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($past_pro_img__info_result)){
			$thmimg_del = $row['image'];
			unlink("../".$thmimg_del);
		}

		$sql_past_pro_delete = "UPDATE past_provost SET image = '' WHERE id = $past_pro_delete_id";
		$past_pro_delete = $connection->query($sql_past_pro_delete);
		header('location: staff_office_of_the_provost.php?past_pro_edit='.$past_pro_delete_id);

	}

	// edit
	$past_pro_img_destination = "";
	$past_pro_img_destination_path = "";
	$past_pro_name = "";
	$past_pro_from = "";
	$past_pro_to = "";
	$past_pro_description = "";
	$past_pro_edit_id = 0;
	if (isset($_GET['past_pro_edit']) && !empty($_GET['past_pro_edit'])) {
		$past_pro_edit_id = (int)$_GET['past_pro_edit'];
		$sql_edit = "SELECT * FROM past_provost WHERE id = $past_pro_edit_id";
		$past_pro_res = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($past_pro_res);
	 }

	 if(isset($_GET['past_pro_edit'])){
		$past_pro_name = $edit_post_row['name'];
		$past_pro_from = $edit_post_row['from_year'];
		$past_pro_to = $edit_post_row['to_year'];
		$past_pro_img_destination_path = $edit_post_row['image'];
		$past_pro_description = $edit_post_row['description'];

	}else{
		if(isset($_POST['past_pro_post'])){
			$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['past_pro_img']['name']);
			$past_pro_img_destination = "../images/staff/".$file_name;
			$past_pro_img_destination_path = "images/staff/".$file_name;
			$filename = $_FILES['past_pro_img']['tmp_name'];

			$past_pro_name = $_POST['past_pro_name'];
			$past_pro_from = $_POST['from_years'];
			$past_pro_to = $_POST['to_years'];
			$past_pro_description = $_POST['editor'];

			if(move_uploaded_file($filename, $past_pro_img_destination)){
				echo "This is upload<br>";
			echo $past_pro_name.'<br>';
			echo $past_pro_from.'<br>';
			echo $past_pro_to.'<br>';
			echo $past_pro_img_destination_path.'<br>';
			echo $past_pro_description.'<br>';
			$sql = "INSERT INTO past_provost(name,from_year,to_year,image,description) VALUES ('$past_pro_name', '$past_pro_from', '$past_pro_to', '$past_pro_img_destination_path', '$past_pro_description')";
			$p_news = $connection->query($sql);
			}
		}
	}
	if(isset($_POST['past_pro_post'])){

		$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['past_pro_img']['name']);
		$past_pro_img_destination = "../images/staff/".$file_name;
		$past_pro_img_destination_path = "images/staff/".$file_name;
		$filename = $_FILES['past_pro_img']['tmp_name'];

		$past_pro_name = $_POST['past_pro_name'];
		$past_pro_from = $_POST['from_years'];
		$past_pro_to = $_POST['to_years'];
		$past_pro_description = $_POST['editor'];


		if(isset($_GET['past_pro_edit'])){
			echo $past_pro_name.'<br>';
			echo $past_pro_from.'<br>';
			echo $past_pro_to.'<br>';
			echo $past_pro_img_destination_path.'<br>';
			echo $past_pro_description.'<br>';
			$sql = "UPDATE past_provost SET name = '$past_pro_name', from_year = '$past_pro_from', to_year ='$past_pro_to', image = '$past_pro_img_destination_path', description = '$past_pro_description' WHERE id = $past_pro_edit_id";
			if(move_uploaded_file($filename, $past_pro_img_destination)){
				$sql = "UPDATE past_provost SET name = '$past_pro_name', from_year = '$past_pro_from', to_year ='$past_pro_to', image = '$past_pro_img_destination_path', description = '$past_pro_description' WHERE id = $past_pro_edit_id";
			}
			$p_news = $connection->query($sql);
		}
		header('location: staff_office_of_the_provost.php');
	}

 ?>
<?php
	include 'include/head.php';
?>
<div class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Office of the Provost
</div>
<?php
	include 'include/sidenavbar.php';
 ?>
 <section class="container">
 	<div class="row justify-content-center">
 		<div class="col-sm-12">
 			<div class="my-3" id="Provost_tabs">
				<ul class="nav nav-tabs justify-content-around">
					<li class="nav-item div_color rounded-top"><a href="#newsUpdate" class="nav-link active" data-toggle="tab">News &amp; Update</a></li>
					<li class="nav-item div_color rounded-top"><a href="#biography" class="nav-link" data-toggle="tab">Biography</a></li>
					<li class="nav-item div_color rounded-top"><a href="#speechesWritings" class="nav-link" data-toggle="tab">Speeches &amp; Writings</a></li>
					<li class="nav-item div_color rounded-top"><a href="#pastProvost" class="nav-link" data-toggle="tab">Past Provost</a></li>
				</ul>
				<div class="tab-content">
					<div class="py-3 big_div_color tab-pane fade show active" id="newsUpdate">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Update & News</h2>
					 			</div>
					 			<form action="staff_office_of_the_provost.php<?=((isset($_GET['pro_news_edit']))?'?pro_news_edit='.$pro_pro_news_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['pro_news_edit'])?'Edit':'');?> News Title</label>
					 					<input type="text" name="news_title" class="form-control" id="news_title" placeholder="News Title" value="<?=$pro_news_title_value?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['pro_news_edit'])?'Edit':'');?> Post Body :</label>
					 					<textarea class="ckeditor" name="editor" id="news_body"><?php echo $pro_news_body_value?></textarea>
					 					<div class="d-flex">
					 						<small class="staff_news_body_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['pro_news_edit'])): ?>
					 						<div><a href="staff_office_of_the_provost.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="staff_prov_news_post" id="staff_prov_news_post" value="<?=((isset($_GET['pro_news_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">All News list</h2>
								<?php

									$sql = "SELECT * FROM provost_news";
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
												 				<a href="?pro_news_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?pro_news_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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

					<div class="px-3 big_div_color tab-pane fade" id="biography">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Biography</h2>
					 			</div>
					 			<form action="staff_office_of_the_provost.php<?=((isset($_GET['pro_bio_edit']))?'?pro_bio_edit='.$pro_bio_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="provost_name"><?=(isset($_GET['pro_bio_edit'])?'Edit':'');?> Presedent Name</label>
					 					<input type="text" name="provost_name" class="form-control" id="provost_name" placeholder="Presedent Name" value="<?=$provost_name?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="presedent_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="presedent_details"><?=(isset($_GET['pro_bio_edit'])?'Edit':'');?> Post Body :</label>
					 					<textarea class="ckeditor" name="editor" id="presedent_details"><?php echo $bio_body_value?></textarea>
					 					<div class="d-flex">
					 						<small class="presedent_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['pro_bio_edit'])): ?>
					 						<div><a href="staff_office_of_the_provost.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="provost_details_post" id="provost_details_post" value="<?=((isset($_GET['pro_bio_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>

					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Provost Biography</h2>
								<?php

									$sql = "SELECT * FROM provost_biography";
									$pre_result = $connection->query($sql);
									if(!$pre_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($pre_result) > 0){
											while ($row = mysqli_fetch_array($pre_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?pro_bio_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?bio_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['name'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>"><?= $row['biography']; ?></div>
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

					<div class="p-3 big_div_color tab-pane fade" id="speechesWritings">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Provost speeches</h2>
					 			</div>
					 			<form action="staff_office_of_the_provost.php<?=((isset($_GET['pro_spees_edit']))?'?pro_spees_edit='.$pro_spess_edit_id:'');?>" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">

					 				<div class="form-group">
					 					<label for="thm_img"><?=(isset($_GET['pro_spees_edit'])?'Edit':'');?> Thum image</label>
					 					<input type="file" name="thm_img" class="form-control" id="thm_img">
					 					<div class="d-flex justify-content-end">
					 						<small class="thm_img_error_message"></small>
					 					</div>
					 					<?php 
						 					if(isset($_GET['pro_spees_edit'])){
						 					$pro_spess_edit_id = (int)$_GET['pro_spees_edit'];
											$sql_edit = "SELECT * FROM provost_spc_writ WHERE id = $pro_spess_edit_id";
											$pro_spees_res = $connection->query($sql_edit);
											$edit_post_row = mysqli_fetch_array($pro_spees_res);
											if($edit_post_row['img_thum_path'] == ''){}else{
										?>
										<div class="form-group" id="pre_img_hide">
					 						<div class="d-flex justify-content-start">
						 						<div><img src="../<?=$destination_path?>" width="150px" height="100px"></div>
						 						<div>
						 							<a href="?pro_thm_delete=<?=$_GET['pro_spees_edit']?>" class="btn aDesign" id="pro_thm_delete"><i class="fas fa-trash-alt"></i></a>
						 						</div>
					 						</div>
						 				</div>
										<?php
												}
											}
					 					  ?>
					 				</div>
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['pro_spees_edit'])?'Edit':'');?> Link</label>
					 					<input type="text" name="video_src" class="form-control" id="video_src" placeholder="Enter video source link" value="<?=$pro_video_url?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['pro_spees_edit'])): ?>
					 						<div><a href="staff_office_of_the_provost.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="provost_speeches_post" id="provost_speeches_post" value="<?=((isset($_GET['pro_spees_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
							</div>
						</div>
						<div class="m-2">
						 	<div class="tableScroller div_color rounded p-3">
						 		<?php 
								 		// Select all video
									$faculty_info = "SELECT * FROM provost_spc_writ";
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
							 				<th>Image Thumbnail</th>
							 				<th>Video</th>
							 				<th></th>
							 			</tr>
							 		</thead>
							 		<tbody>
							 			<?php while ($row = mysqli_fetch_array($facInfo_result)) {
						 				 ?>
							 			<tr>
							 				<td><a href="?pro_spees_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a></td>
							 				<td><?= $row['id'];?></td>
							 				<td><img src="../<?= $row['img_thum_path']; ?>" width="200px" height="100px"></td>
							 				<td><iframe class="embed-responsive-item" src="<?= $row['vdo_url']; ?>" width="200" height="100" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td>
									        <td><a href="?prov_spees_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a></td>
							 			</tr>
							 			<?php } ?>
							 		</tbody>
							 	</table>
						 	</div>
						</div>
					</div>

					<div class="px-3 big_div_color tab-pane fade" id="pastProvost">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Past Provost</h2>
					 			</div>
					 			<form action="staff_office_of_the_provost.php<?=((isset($_GET['past_pro_edit']))?'?past_pro_edit='.$past_pro_edit_id:'');?>" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">

					 				<div class="form-group">
					 					<label for="past_pro_name"><?=(isset($_GET['past_pro_edit'])?'Edit':'');?> Name: </label>
					 					<input type="text" name="past_pro_name" class="form-control" id="past_pro_name" placeholder="Provost Name" value="<?=$past_pro_name?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>


					 				<div class="form-group">
					 					<div class="row justify-content-between">
					 						<div class="col-md-6">
					 							<label for="news_title"><?=(isset($_GET['past_pro_edit'])?'Edit':'');?> From years: </label>
					 							<input type="number" name="from_years" class="form-control" id="from_years" placeholder="Starting Years" value="<?=$past_pro_from?>">
					 						</div>
					 						<div class="col-md-6">
					 							<label for="to_years"><?=(isset($_GET['past_pro_edit'])?'Edit':'');?> To: </label>
					 							<input type="number" name="to_years" class="form-control" id="to_years" placeholder="Ending Years" value="<?=$past_pro_to?>"></div>
					 					</div>
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="form-group">
					 					<label for="past_pro_img"><?=(isset($_GET['past_pro_edit'])?'Edit':'');?> Thum image</label>
					 					<input type="file" name="past_pro_img" class="form-control" id="past_pro_img">
					 					<div class="d-flex justify-content-end">
					 						<small class="thm_img_error_message"></small>
					 					</div>
					 					<?php 
						 					if(isset($_GET['past_pro_edit'])){
						 					$past_pro_edit_id = (int)$_GET['past_pro_edit'];
											$sql_edit = "SELECT * FROM past_provost WHERE id = $past_pro_edit_id";
											$past_pro_res = $connection->query($sql_edit);
											$edit_post_row = mysqli_fetch_array($past_pro_res);
											if($edit_post_row['image'] == ''){}else{
										?>
										<div class="form-group" id="pre_img_hide">
					 						<div class="d-flex justify-content-start">
						 						<div><img src="../<?=$past_pro_img_destination_path?>" width="150px" height="100px"></div>
						 						<div>
						 							<a href="?past_pro_thm_delete=<?=$_GET['past_pro_edit']?>" class="btn aDesign" id="past_pro_thm_delete"><i class="fas fa-trash-alt"></i></a>
						 						</div>
					 						</div>
						 				</div>
										<?php
												}
											}
					 					  ?>
					 				</div>

					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['past_pro_edit'])?'Edit':'');?> Description :</label>
					 					<textarea class="ckeditor" name="editor" id="past_pro_description"><?php echo $past_pro_description?></textarea>
					 					<div class="d-flex">
					 						<small class="staff_news_body_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['past_pro_edit'])): ?>
					 						<div><a href="staff_office_of_the_provost.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="past_pro_post" id="past_pro_post" value="<?=((isset($_GET['past_pro_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
							</div>
						</div>
						<div class="my-3 accodion" id="accodion">
							 <h2 class="text-center text-white">Past Provost</h2>
							<?php

								$past_pre_info = "SELECT * FROM past_provost";
								$past_pro_result = $connection->query($past_pre_info);
								if ($past_pro_result == false) {
									echo "Selection Faield". $connection->error;
								}else{
									if(mysqli_num_rows($past_pro_result) > 0){
										while ($row = mysqli_fetch_array($past_pro_result)) {
							?>
										 	<div class="my-1">
										 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
										 			<div>
										 				<a href="?past_pro_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
										 				<a href="?past_pro_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
										 			</div>
											 		<div><?=$row['name'];?></div>
											 		<div><i class="fas fa-plus px-2"></i></div>
											 	</div>
											 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>">
											 		<div class="row">
											 			<div class="col-md-12">
					 										<h2><i><?= $row['from_year'];?>-<?= $row['to_year'];?></i></h2>
											 				<img src="../<?= $row['image']; ?>" class="rounded">
											 				<div><?= $row['description']; ?></div>
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
