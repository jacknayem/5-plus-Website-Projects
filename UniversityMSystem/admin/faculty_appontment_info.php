
<!DOCTYPE html>
<html>
<head>
	<title>Apointment</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	// delete
	if (isset($_GET['delete']) && !empty($_GET['delete'])) {
		$delete_id = (int)$_GET['delete'];
		$sql_delete = "DELETE FROM faculty_appontment_info WHERE id = $delete_id";
		$appointment_delete = $connection->query($sql_delete);
		header('location: faculty_appontment_info.php');

	}
	
	// edit
	 $title_value = "";
	 $body_value = "";
	 $edit_id = 0;
	if (isset($_GET['edit']) && !empty($_GET['edit'])) {
		$edit_id = (int)$_GET['edit'];
		$sql_edit = "SELECT * FROM faculty_appontment_info WHERE id = $edit_id";
		$appointment_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($appointment_edit);
	// 	header('location: faculty_appontment_info.php');
	 }
	 if(isset($_GET['edit'])){
		$title_value = $edit_post_row['title'];
		$body_value = $edit_post_row['body'];
	}else{
		if(isset($_POST['appointment_post'])){
			$title_value = $_POST['appointment_title'];
			$body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['appointment_post'])){
		$title_value = $_POST['appointment_title'];
		$body_value = $_POST['editor'];
		$sql = "INSERT INTO faculty_appontment_info(title, body) VALUES ('$title_value','$body_value')";
		if(isset($_GET['edit'])){
			$sql = "UPDATE faculty_appontment_info SET title = '$title_value', body = '$body_value' WHERE id = $edit_id";
		}
		$appointment = $connection->query($sql);
		if(!$appointment){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: faculty_appontment_info.php');
	}
 ?>
<?php
	include 'include/head.php';
?>
<div class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Faculty Appointment
</div>
<?php
	// include 'require/dbconnection.php';
	include 'include/sidenavbar.php';
 ?>
 <section class="container my-3">
 	<div class="row justify-content-center">
 		<div class="col-sm-8">
 			<div>
 				<h2 class="text-center text-white">Appointment form</h2>
 			</div>
 			<form action="faculty_appontment_info.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
 				<div class="form-group">
 					<label for="appointment_title"><?=(isset($_GET['edit'])?'Edit':'');?> Appointment Title</label>
 					<input type="text" name="appointment_title" class="form-control" id="appointment_title" placeholder="Form Title" value="<?=$title_value?>">
 					<div class="d-flex justify-content-end">
 						<small class="appointment_title_error_message"></small>
 					</div>
 				</div>
 				<div class="form-group">
 					<label for="appo_title"><?=(isset($_GET['edit'])?'Edit':'');?> Post Body :</label>
 					<textarea class="ckeditor" name="editor" id="appointment_body"><?php echo $body_value?></textarea>
 					<div class="d-flex">
 						<small class="appointment_body_error_message"></small>
 					</div>
 				</div>
 				<div class="d-flex justify-content-between">
 					<?php if(isset($_GET['edit'])): ?>
 						<div><a href="faculty_appontment_info.php" class="btn btn-danger">Close</a></div>
 					<?php endif; ?>
 					<div><input type="submit" name="appointment_post" id="appointment_post" value="<?=((isset($_GET['edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
 				</div>
 			</form>
 		</div>
 	</div>
 </section>
 <section class="container my-3 accodion" id="accodion">
 	<h2 class="text-center text-white">Appointment info</h2>
<?php

	$sql = "SELECT * FROM faculty_appontment_info";
	$appointment_result = $connection->query($sql);
	if(!$appointment_result){
		echo "Fetch Failed :".$connection->error;
	}else{
		if(mysqli_num_rows($appointment_result) > 0){
			while ($row = mysqli_fetch_array($appointment_result)) {
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
