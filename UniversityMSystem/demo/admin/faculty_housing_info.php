
<!DOCTYPE html>
<html>
<head>
	<title>Housing Info</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	// delete
	if (isset($_GET['delete']) && !empty($_GET['delete'])) {
		$delete_id = (int)$_GET['delete'];
		$sql_delete = "DELETE FROM faculty_housing_info WHERE id = $delete_id";
		$housing_delete = $connection->query($sql_delete);
		header('location: faculty_housing_info.php');

	}
	
	// edit
	 $title_value = "";
	 $body_value = "";
	 $edit_id = 0;
	if (isset($_GET['edit']) && !empty($_GET['edit'])) {
		$edit_id = (int)$_GET['edit'];
		$sql_edit = "SELECT * FROM faculty_housing_info WHERE id = $edit_id";
		$housing_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($housing_edit);
	// 	header('location: faculty_housing_info.php');
	 }
	 if(isset($_GET['edit'])){
		$title_value = $edit_post_row['title'];
		$body_value = $edit_post_row['body'];
	}else{
		if(isset($_POST['housing_post'])){
			$title_value = $_POST['housing_title'];
			$body_value = $_POST['editor'];
		}
	}

	// insert and update
	if(isset($_POST['housing_post'])){
		$title_value = $_POST['housing_title'];
		$body_value = $_POST['editor'];

		if($title_value == "" && $body_value == ""){
			echo "<script>alert('Check your input Field');</script>";
		}else{
			$sql = "INSERT INTO faculty_housing_info(title, body) VALUES ('$title_value','$body_value')";
			if(isset($_GET['edit'])){
				$sql = "UPDATE faculty_housing_info SET title= '$title_value', body = '$body_value' WHERE id = $edit_id";
			}
			$retirment= $connection->query($sql);
			if(!$retirment){
				echo "<script>alert('Failed')</script>";
			}else{
				echo "<script>alert('Success')</script>";
			}
			header('location:faculty_Retirement_info.php');
		}
	}
 ?>
<?php
	include 'include/head.php';
?>
<div class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Faculty Housing
</div>
<?php
	// include 'require/dbconnection.php';
	include 'include/sidenavbar.php';
 ?>
 <section class="container my-3">
 	<div class="row justify-content-center">
 		<div class="col-sm-8">
 			<div>
 				<h2 class="text-center text-white">Insert Housing Information</h2>
 			</div>
 			<form action="faculty_housing_info.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
 				<div class="form-group">
 					<label for="housing_title"><?=(isset($_GET['edit'])?'Edit':'');?> Title</label>
 					<input type="text" name="housing_title" class="form-control" id="housing_title" placeholder="Form Title" value="<?=$title_value?>">
 					<div class="d-flex justify-content-end">
 						<small class="housing_title_error_message"></small>
 					</div>
 				</div>
 				<div class="form-group">
 					<label for="housing_title"><?=(isset($_GET['edit'])?'Edit':'');?> Post Body :</label>
 					<textarea class="ckeditor" name="editor" id="housing_body"><?php echo $body_value?></textarea>
 					<div class="d-flex">
 						<small class="housing_body_error_message"></small>
 					</div>
 				</div>
 				<div class="d-flex justify-content-between">
 					<?php if(isset($_GET['edit'])): ?>
 						<div><a href="faculty_housing_info.php" class="btn btn-danger">Close</a></div>
 					<?php endif; ?>
 					<div><input type="submit" name="housing_post" id="housing_post" value="<?=((isset($_GET['edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
 				</div>
 			</form>
 		</div>
 	</div>
 </section>
 <section class="container my-3 accodion" id="accodion">
 	<h2 class="text-center text-white">Housing info</h2>
<?php

	$sql = "SELECT * FROM faculty_housing_info";
	$housing_result = $connection->query($sql);
	if(!$housing_result){
		echo "Fetch Failed :".$connection->error;
	}else{
		if(mysqli_num_rows($housing_result) > 0){
			while ($row = mysqli_fetch_array($housing_result)) {
?>
				 	<div class="my-1">
				 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#<?= $row['id']; ?>" data-parent=".accodion">
				 			<div>
				 				<a href="?edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
				 				<a href="?delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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
 </section>

</body>
</html>
