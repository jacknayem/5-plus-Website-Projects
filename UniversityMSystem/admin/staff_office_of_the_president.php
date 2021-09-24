
<!DOCTYPE html>
<html>
<head>
	<title>Office of the President</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	//================News and Update===============
	// delete
	if (isset($_GET['news_delete']) && !empty($_GET['news_delete'])) {
		$news_delete_id = (int)$_GET['news_delete'];
		$sql_dnews_delete = "DELETE FROM president_news WHERE id = $news_delete_id";
		$news_delete = $connection->query($sql_dnews_delete);
		header('location: staff_office_of_the_president.php');

	}
	
	// edit
	 $news_title_value = "";
	 $news_body_value = "";
	 $news_edit_id = 0;
	if (isset($_GET['news_edit']) && !empty($_GET['news_edit'])) {
		$news_edit_id = (int)$_GET['news_edit'];
		$sql_edit = "SELECT * FROM president_news WHERE id = $news_edit_id";
		$p_news_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($p_news_edit);
	// 	header('location: faculty_appontment_info.php');
	 }
	 if(isset($_GET['news_edit'])){
		$news_title_value = $edit_post_row['title'];
		$news_body_value = $edit_post_row['body'];
	}else{
		if(isset($_POST['staff_news_post'])){
			$news_title_value = $_POST['news_title'];
			$news_body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['staff_news_post'])){
		$news_title_value = $_POST['news_title'];
		$news_body_value = $_POST['editor'];

		$sql = "INSERT INTO president_news(title, body) VALUES ('$news_title_value','$news_body_value')";
		if(isset($_GET['news_edit'])){
			$sql = "UPDATE president_news SET title = '$news_title_value', body = '$news_body_value' WHERE id = $news_edit_id";
		}
		$p_news = $connection->query($sql);
		if(!$p_news){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: staff_office_of_the_president.php');
	}

	//================Biography===============

	// edit
	 $president_name = "";
	 $bio_body_value = "";
	 $bio_edit_id = 0;
	if (isset($_GET['bio_edit']) && !empty($_GET['bio_edit'])) {
		$bio_edit_id = (int)$_GET['bio_edit'];
		$sql_edit = "SELECT * FROM president_biography WHERE id = $bio_edit_id";
		$p_bio_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($p_bio_edit);
	 }

	 if(isset($_GET['bio_edit'])){
		$president_name = $edit_post_row['name'];
		$bio_body_value = $edit_post_row['biography'];
	}else{
		if(isset($_POST['presedent_details_post'])){
			$president_name = $_POST['presedent_name'];
			$bio_body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['presedent_details_post'])){
		$president_name = $_POST['presedent_name'];
		$bio_body_value = $_POST['editor'];


		$sql = "UPDATE president_biography SET name = '$president_name', biography = '$bio_body_value' WHERE id = 1";

		if(isset($_GET['bio_edit'])){
			$sql = "UPDATE president_biography SET name = '$president_name', biography = '$bio_body_value' WHERE id = $bio_edit_id";
		}
		$p_news = $connection->query($sql);
		if(!$p_news){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: staff_office_of_the_president.php');
	}

	// =================President Speeches=====================

	// Delete
	if (isset($_GET['pre_spees_delete']) && !empty($_GET['pre_spees_delete'])) {
		$spees_delete_id = (int)$_GET['pre_spees_delete'];

		$pre_video_info = "SELECT * FROM president_spc_writ WHERE id = $spees_delete_id";
		$pre_video_info_result = $connection->query($pre_video_info);
		if ($pre_video_info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($pre_video_info_result)){
			$thmimg_del = $row['img_thum_path'];
			unlink("../".$thmimg_del);
		}

		$sql_spees_delete = "DELETE FROM president_spc_writ WHERE id = $spees_delete_id";
		$news_delete = $connection->query($sql_spees_delete);
		header('location: staff_office_of_the_president.php');
	}

	// Delete path
	$thmimg_del = "";
	// pre_thm_delete
	if (isset($_GET['pre_thm_delete'])){
		$spees_delete_id = (int)$_GET['pre_thm_delete'];
		$pre_thum_img_info = "SELECT * FROM president_spc_writ WHERE id = $spees_delete_id";
		$pre_thum_img__info_result = $connection->query($pre_thum_img_info);
		if ($pre_thum_img__info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($pre_thum_img__info_result)){
			$thmimg_del = $row['img_thum_path'];
			unlink("../".$thmimg_del);
		}

		$sql_spees_delete = "UPDATE president_spc_writ SET img_thum_path = '' WHERE id = $spees_delete_id";
		$news_delete = $connection->query($sql_spees_delete);
		header('location: staff_office_of_the_president.php?pre_spees_edit='.$spees_delete_id);

	}

	// edit
	$destination = "";
	$destination_path = "";
	$pre_video_url = "";
	$pre_spess_edit_id = 0;
	if (isset($_GET['pre_spees_edit']) && !empty($_GET['pre_spees_edit'])) {
		$pre_spess_edit_id = (int)$_GET['pre_spees_edit'];
		$sql_edit = "SELECT * FROM president_spc_writ WHERE id = $pre_spess_edit_id";
		$pre_spees_res = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($pre_spees_res);
	 }

	 if(isset($_GET['pre_spees_edit'])){
	 	$destination_path = $edit_post_row['img_thum_path'];
		$pre_video_url = $edit_post_row['vdo_url'];
	}else{
		if(isset($_POST['presedent_speeches_post'])){
			$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['thm_img']['name']);
			$destination = "../images/staff/".$file_name;
			$destination_path = "images/staff/".$file_name;
			$filename = $_FILES['thm_img']['tmp_name'];

			$pre_video_url = mysqli_real_escape_string($connection, $_POST['video_src']);

			if(move_uploaded_file($filename, $destination)){
			$sql = "INSERT INTO president_spc_writ(img_thum_path,vdo_url) VALUES ('$destination_path','$pre_video_url')";
			$p_news = $connection->query($sql);
			}
		}
	}
	if(isset($_POST['presedent_speeches_post'])){

		$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['thm_img']['name']);
		$destination = "../images/staff/".$file_name;
		$destination_path = "images/staff/".$file_name;
		$filename = $_FILES['thm_img']['tmp_name'];

		$pre_video_url = mysqli_real_escape_string($connection, $_POST['video_src']);


		if(isset($_GET['pre_spees_edit'])){
			$sql = "UPDATE president_spc_writ SET img_thum_path = '$destination_path', vdo_url = '$pre_video_url' WHERE id = $pre_spess_edit_id";
			if(move_uploaded_file($filename, $destination)){
			$sql = "UPDATE president_spc_writ SET img_thum_path = '$destination_path', vdo_url = '$pre_video_url' WHERE id = $pre_spess_edit_id";
			}
			$p_news = $connection->query($sql);
		}
		header('location: staff_office_of_the_president.php');
	}

	//========================= Past President========================
	// Delete
	if (isset($_GET['past_pre_delete']) && !empty($_GET['past_pre_delete'])) {
		$past_pre_delete_id = (int)$_GET['past_pre_delete'];

		$past_pre_info = "SELECT * FROM past_president WHERE id = $past_pre_delete_id";
		$past_pre_info_result = $connection->query($past_pre_info);
		if ($past_pre_info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($past_pre_info_result)){
			$thmimg_del = $row['image'];
			unlink("../".$thmimg_del);
		}

		$sql_delete = "DELETE FROM past_president WHERE id = $past_pre_delete_id";
		$past_pre_delete = $connection->query($sql_delete);
		header('location: staff_office_of_the_president.php');
	}

	// Delete path
	$thmimg_del = "";
	// pre_thm_delete
	if (isset($_GET['past_pre_thm_delete'])){
		$past_pre_delete_id = (int)$_GET['past_pre_thm_delete'];
		echo $past_pre_delete_id;
		$past_pre_img_info = "SELECT * FROM past_president WHERE id = $past_pre_delete_id";
		$past_pre_img__info_result = $connection->query($past_pre_img_info);
		if ($past_pre_img__info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($past_pre_img__info_result)){
			$thmimg_del = $row['image'];
			unlink("../".$thmimg_del);
		}

		$sql_past_pre_delete = "UPDATE past_president SET image = '' WHERE id = $past_pre_delete_id";
		$past_pre_delete = $connection->query($sql_past_pre_delete);
		header('location: staff_office_of_the_president.php?past_pre_edit='.$past_pre_delete_id);

	}

	// edit
	$past_pre_img_destination = "";
	$past_pre_img_destination_path = "";
	$past_pre_name = "";
	$past_pre_from = "";
	$past_pre_to = "";
	$past_pre_description = "";
	$past_pre_edit_id = 0;
	if (isset($_GET['past_pre_edit']) && !empty($_GET['past_pre_edit'])) {
		$past_pre_edit_id = (int)$_GET['past_pre_edit'];
		$sql_edit = "SELECT * FROM past_president WHERE id = $past_pre_edit_id";
		$past_pre_res = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($past_pre_res);
	 }

	 if(isset($_GET['past_pre_edit'])){
		$past_pre_name = $edit_post_row['name'];
		$past_pre_from = $edit_post_row['from_year'];
		$past_pre_to = $edit_post_row['to_years'];
		$past_pre_img_destination_path = $edit_post_row['image'];
		$past_pre_description = $edit_post_row['description'];

	}else{
		if(isset($_POST['past_pre_post'])){
			$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['past_pre_img']['name']);
			$past_pre_img_destination = "../images/staff/".$file_name;
			$past_pre_img_destination_path = "images/staff/".$file_name;
			$filename = $_FILES['past_pre_img']['tmp_name'];

			$past_pre_name = $_POST['past_pre_name'];
			$past_pre_from = $_POST['from_years'];
			$past_pre_to = $_POST['to_years'];
			$past_pre_description = $_POST['editor'];

			if(move_uploaded_file($filename, $past_pre_img_destination)){
				echo "This is upload<br>";
			$sql = "INSERT INTO past_president(name,from_year,to_years,image,description) VALUES ('$past_pre_name', '$past_pre_from', '$past_pre_to', '$past_pre_img_destination_path', '$past_pre_description')";
			$p_news = $connection->query($sql);
			}
		}
	}
	if(isset($_POST['past_pre_post'])){

		$file_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['past_pre_img']['name']);
		$past_pre_img_destination = "../images/staff/".$file_name;
		$past_pre_img_destination_path = "images/staff/".$file_name;
		$filename = $_FILES['past_pre_img']['tmp_name'];

		$past_pre_name = $_POST['past_pre_name'];
		$past_pre_from = $_POST['from_years'];
		$past_pre_to = $_POST['to_years'];
		$past_pre_description = $_POST['editor'];


		if(isset($_GET['past_pre_edit'])){
			echo $past_pre_name.'<br>';
			echo $past_pre_from.'<br>';
			echo $past_pre_to.'<br>';
			echo $past_pre_img_destination_path.'<br>';
			echo $past_pre_description.'<br>';
			$sql = "UPDATE past_president SET name = '$past_pre_name', from_year = '$past_pre_from', to_years ='$past_pre_to', image = '$past_pre_img_destination_path', description = '$past_pre_description' WHERE id = $past_pre_edit_id";
			if(move_uploaded_file($filename, $past_pre_img_destination)){
				$sql = "UPDATE past_president SET name = '$past_pre_name', from_year = '$past_pre_from', to_years ='$past_pre_to', image = '$past_pre_img_destination_path', description = '$past_pre_description' WHERE id = $past_pre_edit_id";
			}
			$p_news = $connection->query($sql);
		}
		header('location: staff_office_of_the_president.php');
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
					<li class="nav-item div_color rounded-top"><a href="#newsUpdate" class="nav-link active" data-toggle="tab">News &amp; Update</a></li>
					<li class="nav-item div_color rounded-top"><a href="#biography" class="nav-link" data-toggle="tab">Biography</a></li>
					<li class="nav-item div_color rounded-top"><a href="#speechesWritings" class="nav-link" data-toggle="tab">Speeches &amp; Writings</a></li>
					<li class="nav-item div_color rounded-top"><a href="#pastPresident" class="nav-link" data-toggle="tab">Past President</a></li>
				</ul>
				<div class="tab-content">
					<div class="py-3 big_div_color tab-pane fade show active" id="newsUpdate">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Update & News</h2>
					 			</div>
					 			<form action="staff_office_of_the_president.php<?=((isset($_GET['news_edit']))?'?news_edit='.$news_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['news_edit'])?'Edit':'');?> News Title</label>
					 					<input type="text" name="news_title" class="form-control" id="news_title" placeholder="News Title" value="<?=$news_title_value?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['news_edit'])?'Edit':'');?> Post Body :</label>
					 					<textarea class="ckeditor" name="editor" id="news_body"><?php echo $news_body_value?></textarea>
					 					<div class="d-flex">
					 						<small class="staff_news_body_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['news_edit'])): ?>
					 						<div><a href="staff_office_of_the_president.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="staff_news_post" id="staff_news_post" value="<?=((isset($_GET['news_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">All News list</h2>
								<?php

									$sql = "SELECT * FROM president_news";
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
												 				<a href="?news_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?news_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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
					 			<form action="staff_office_of_the_president.php<?=((isset($_GET['bio_edit']))?'?bio_edit='.$bio_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="presedent_name"><?=(isset($_GET['bio_edit'])?'Edit':'');?> Presedent Name</label>
					 					<input type="text" name="presedent_name" class="form-control" id="presedent_name" placeholder="Presedent Name" value="<?=$president_name?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="presedent_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="presedent_details"><?=(isset($_GET['bio_edit'])?'Edit':'');?> Post Body :</label>
					 					<textarea class="ckeditor" name="editor" id="presedent_details"><?php echo $bio_body_value?></textarea>
					 					<div class="d-flex">
					 						<small class="presedent_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['bio_edit'])): ?>
					 						<div><a href="staff_office_of_the_president.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="presedent_details_post" id="presedent_details_post" value="<?=((isset($_GET['bio_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>

					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">President Biography</h2>
								<?php

									$sql = "SELECT * FROM president_biography";
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
												 				<a href="?bio_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
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
					 				<h2 class="text-center text-white">President speeches</h2>
					 			</div>
					 			<form action="staff_office_of_the_president.php<?=((isset($_GET['pre_spees_edit']))?'?pre_spees_edit='.$pre_spess_edit_id:'');?>" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">

					 				<div class="form-group">
					 					<label for="thm_img"><?=(isset($_GET['pre_spees_edit'])?'Edit':'');?> Thum image</label>
					 					<input type="file" name="thm_img" class="form-control" id="thm_img">
					 					<div class="d-flex justify-content-end">
					 						<small class="thm_img_error_message"></small>
					 					</div>
					 					<?php 
						 					if(isset($_GET['pre_spees_edit'])){
						 					$pre_spess_edit_id = (int)$_GET['pre_spees_edit'];
											$sql_edit = "SELECT * FROM president_spc_writ WHERE id = $pre_spess_edit_id";
											$pre_spees_res = $connection->query($sql_edit);
											$edit_post_row = mysqli_fetch_array($pre_spees_res);
											if($edit_post_row['img_thum_path'] == ''){}else{
										?>
										<div class="form-group" id="pre_img_hide">
					 						<div class="d-flex justify-content-start">
						 						<div><img src="../<?=$destination_path?>" width="150px" height="100px"></div>
						 						<div>
						 							<a href="?pre_thm_delete=<?=$_GET['pre_spees_edit']?>" class="btn aDesign" id="pre_thm_delete"><i class="fas fa-trash-alt"></i></a>
						 						</div>
					 						</div>
						 				</div>
										<?php
												}
											}
					 					  ?>
					 				</div>
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['pre_spees_edit'])?'Edit':'');?> Link</label>
					 					<input type="text" name="video_src" class="form-control" id="video_src" placeholder="Enter video source link" value="<?=$pre_video_url?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['pre_spees_edit'])): ?>
					 						<div><a href="staff_office_of_the_president.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="presedent_speeches_post" id="presedent_speeches_post" value="<?=((isset($_GET['pre_spees_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
							</div>
						</div>
						<div class="m-2">
						 	<div class="tableScroller div_color rounded p-3">
						 		<?php 
								 		// Select all video
									$faculty_info = "SELECT * FROM president_spc_writ";
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
							 				<td><a href="?pre_spees_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a></td>
							 				<td><?= $row['id'];?></td>
							 				<td><img src="../<?= $row['img_thum_path']; ?>" width="200px" height="100px"></td>
							 				<td><iframe class="embed-responsive-item" src="<?= $row['vdo_url']; ?>" width="200" height="100" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe></td>
									        <td><a href="?pre_spees_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a></td>
							 			</tr>
							 			<?php } ?>
							 		</tbody>
							 	</table>
						 	</div>
						</div>
					</div>

					<div class="px-3 big_div_color tab-pane fade" id="pastPresident">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Past President</h2>
					 			</div>
					 			<form action="staff_office_of_the_president.php<?=((isset($_GET['past_pre_edit']))?'?past_pre_edit='.$past_pre_edit_id:'');?>" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">

					 				<div class="form-group">
					 					<label for="past_pre_name"><?=(isset($_GET['past_pre_edit'])?'Edit':'');?> Name: </label>
					 					<input type="text" name="past_pre_name" class="form-control" id="past_pre_name" placeholder="President Name" value="<?=$past_pre_name?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>


					 				<div class="form-group">
					 					<div class="row justify-content-between">
					 						<div class="col-md-6">
					 							<label for="news_title"><?=(isset($_GET['past_pre_edit'])?'Edit':'');?> From years: </label>
					 							<input type="number" name="from_years" class="form-control" id="from_years" placeholder="Starting Years" value="<?=$past_pre_from?>">
					 						</div>
					 						<div class="col-md-6">
					 							<label for="to_years"><?=(isset($_GET['past_pre_edit'])?'Edit':'');?> To: </label>
					 							<input type="number" name="to_years" class="form-control" id="to_years" placeholder="Ending Years" value="<?=$past_pre_to?>"></div>
					 					</div>
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="form-group">
					 					<label for="past_pre_img"><?=(isset($_GET['past_pre_edit'])?'Edit':'');?> Thum image</label>
					 					<input type="file" name="past_pre_img" class="form-control" id="past_pre_img">
					 					<div class="d-flex justify-content-end">
					 						<small class="thm_img_error_message"></small>
					 					</div>
					 					<?php 
						 					if(isset($_GET['past_pre_edit'])){
						 					$past_pre_edit_id = (int)$_GET['past_pre_edit'];
											$sql_edit = "SELECT * FROM past_president WHERE id = $past_pre_edit_id";
											$past_pre_res = $connection->query($sql_edit);
											$edit_post_row = mysqli_fetch_array($past_pre_res);
											if($edit_post_row['image'] == ''){}else{
										?>
										<div class="form-group" id="pre_img_hide">
					 						<div class="d-flex justify-content-start">
						 						<div><img src="../<?=$past_pre_img_destination_path?>" width="150px" height="100px"></div>
						 						<div>
						 							<a href="?past_pre_thm_delete=<?=$_GET['past_pre_edit']?>" class="btn aDesign" id="past_pre_thm_delete"><i class="fas fa-trash-alt"></i></a>
						 						</div>
					 						</div>
						 				</div>
										<?php
												}
											}
					 					  ?>
					 				</div>

					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['past_pre_edit'])?'Edit':'');?> Description :</label>
					 					<textarea class="ckeditor" name="editor" id="past_pre_description"><?php echo $past_pre_description?></textarea>
					 					<div class="d-flex">
					 						<small class="staff_news_body_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['past_pre_edit'])): ?>
					 						<div><a href="staff_office_of_the_president.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="past_pre_post" id="past_pre_post" value="<?=((isset($_GET['past_pre_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
							</div>
						</div>
						<div class="my-3 accodion" id="accodion">
							 <h2 class="text-center text-white">Past President</h2>
							<?php

								$past_pre_info = "SELECT * FROM past_president";
								$past_pre_result = $connection->query($past_pre_info);
								if ($past_pre_result == false) {
									echo "Selection Faield". $connection->error;
								}else{
									if(mysqli_num_rows($past_pre_result) > 0){
										while ($row = mysqli_fetch_array($past_pre_result)) {
							?>
										 	<div class="my-1">
										 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
										 			<div>
										 				<a href="?past_pre_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
										 				<a href="?past_pre_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
										 			</div>
											 		<div><?=$row['name'];?></div>
											 		<div><i class="fas fa-plus px-2"></i></div>
											 	</div>
											 	<div class="collapse mx-5 div_collaple  p-3" id="bio_<?= $row['id']; ?>">
											 		<div class="row">
											 			<div class="col-md-12">
					 										<h2><i><?= $row['from_year'];?>-<?= $row['to_years'];?></i></h2>
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
