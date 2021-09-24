<!DOCTYPE html>
<html>
<head>
	<title>Apointment</title>
	<!-- <script src="ckeditor/ckeditor.js"></script> -->
<?php 

	include 'require/dbconnection.php';

	// delete
	if(isset($_GET['delete']) && !empty($_GET['delete'])){
		$delete_id = (int)$_GET['delete'];
		$sql_delete = "DELETE FROM faculty_development_info WHERE id = $delete_id";
		$delete_exicute = $connection->query($sql_delete);
		header('location:faculty_development_info.php');
	}

	// edit
	$title_value = "";
	$body_value = "";
	if(isset($_GET['edit']) && !empty($_GET['edit'])){
		$edit_id = (int)$_GET['edit'];
		$sql_edit = "SELECT * FROM faculty_development_info WHERE id = $edit_id";
		$sql_exicute = $connection->query($sql_edit);
		$development_edit_row = mysqli_fetch_array($sql_exicute);
	}
	if(isset($_GET['edit'])){
		$title_value = $development_edit_row['title'];
		$body_value = $development_edit_row['body'];
	}else{
		if(isset($_POST['development_submit'])){
			$title_value = $_POST['development_title'];
			$body_value = $_POST['editor'];
		}
	}

	// insert and update
	if(isset($_POST['development_submit'])){
		$title_value = $_POST['development_title'];
		$body_value = $_POST['editor'];

		if($title_value == "" && $body_value == ""){
			echo "<script>alert('Check your input Field');</script>";
		}else{
			$sql = "INSERT INTO faculty_development_info(title, body) VALUES ('$title_value','$body_value')";
			if(isset($_GET['edit'])){
				$sql = "UPDATE faculty_development_info SET title= '$title_value', body = '$body_value' WHERE id = $edit_id";
			}
			$retirment= $connection->query($sql);
			if(!$retirment){
				echo "<script>alert('Failed')</script>";
			}else{
				echo "<script>alert('Success')</script>";
			}
			header('location:faculty_development_info.php');
		}
	}


 ?>
<?php
	include 'include/head.php';
?>
<header class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Faculty Development
</header>
<?php
	include 'include/sidenavbar.php';
 ?>
 <section class="container my-3">
 	<div class="row justify-content-center">
 		<div class="col-sm-8 ">
 			<header>
 				<h2 class="text-center text-white">Insert Development Information</h2>
 			</header>
 			<form action="faculty_development_info.php<?=((isset($_GET['edit']))?'?edit='.$edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
 				<div class="form-group">
 					<label for="development_title"><?=(isset($_GET['edit'])?'Edit':'')?> Title</label>
 					<input type="text" name="development_title" id="development_title" class="form-control" placeholder="Post title" value="<?=$title_value?>">
 					<div class="d-flex justify-content-end">
 						<small class="development_title_error_message"></small>
 					</div>
 				</div>

 				<div class="form-group">
 					<label for="development_body"><?=(isset($_GET['edit'])?'Edit':'');?> Body</label>
 					<textarea name="editor" class="ckeditor" id="development_body"><?=$body_value; ?></textarea>
 				</div>

 				<div class="form-group">
 					<div class="d-flex justify-content-between">
 						<?php if(isset($_GET['edit'])): ?>
 							<a href="faculty_development_info.php" class="btn btn-danger">Close</a>
 						<?php endif ?>
 						<div></div>
 						<input type="submit" name="development_submit" value="<?=(isset($_GET['edit'])?'Edit':'Add');?> Post" class="btn btn-success" id="development_submit">
 					</div>
 				</div>
 			</form>
 		</div>
 	</div>
 </section>
 <section class="container my-3 accodion" id="accodion">
 	<h2 class="text-center text-white">Retirnment info</h2>
<?php 
 		$sql = "SELECT * FROM faculty_development_info";
 		$retirement_result = $connection->query($sql);
 		if(!$retirement_result){
 			echo "Fetch Failed :".$connection->error;
 		}else{
 			if(mysqli_num_rows($retirement_result) > 0){
 				while ($row = mysqli_fetch_array($retirement_result)) {
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