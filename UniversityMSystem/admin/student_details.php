
<!DOCTYPE html>
<html>
<head>
	<title>News update and Book store</title>
	<script src="ckeditor/ckeditor.js"></script>
	<?php 
	include 'require/dbconnection.php';
	//================Studet News===============
	// delete
	if (isset($_GET['std_news_delete']) && !empty($_GET['std_news_delete'])) {
		$std_news_delete_id = (int)$_GET['std_news_delete'];
		$sql_std_news_delete = "DELETE FROM student_news WHERE id = $std_news_delete_id";
		$std_news_delete = $connection->query($sql_std_news_delete);
		header('location: student_details.php');
	}
	
	// edit
	 $std_news_title_value = "";
	 $std_news_body_value = "";
	 $std_news_edit_id = 0;
	if (isset($_GET['std_news_edit']) && !empty($_GET['std_news_edit'])) {
		$std_news_edit_id = (int)$_GET['std_news_edit'];
		$sql_edit = "SELECT * FROM student_news WHERE id = $std_news_edit_id";
		$std_news_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($std_news_edit);
	 }
	 if(isset($_GET['std_news_edit'])){
		$std_news_title_value = $edit_post_row['title'];
		$std_news_body_value = $edit_post_row['body'];
	}else{
		if(isset($_POST['std_news_post'])){
			$std_news_title_value = $_POST['news_title'];
			$std_news_body_value = $_POST['editor'];
		}
	}
	if(isset($_POST['std_news_post'])){
		$std_news_title_value = $_POST['news_title'];
		$std_news_body_value = $_POST['editor'];

		$sql = "INSERT INTO student_news(title, body) VALUES ('$std_news_title_value','$std_news_body_value')";
		if(isset($_GET['std_news_edit'])){
			$sql = "UPDATE student_news SET title = '$std_news_title_value', body = '$std_news_body_value' WHERE id = $std_news_edit_id";
		}
		$p_news = $connection->query($sql);
		if(!$p_news){
			echo "Insert Failed :".$connection->error;
		}else{
			echo "Inserted";
		}
		header('location: student_details.php');
	}

	//========================= Libraries========================

	// Delete path global variable
	$book_file_del = "";
	$book_cover_page_del = "";
	// Delete
	if (isset($_GET['delete_book']) && !empty($_GET['delete_book'])) {
		$delete_book_id = (int)$_GET['delete_book'];

		$delete_book_info = "SELECT * FROM student_libraries WHERE id = $delete_book_id";
		$delete_book_info_result = $connection->query($delete_book_info);
		if ($delete_book_info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($delete_book_info_result)){
			$book_file_del = $row['image'];
			unlink("../".$book_file_del);
		}

		$sql_delete = "DELETE FROM student_libraries WHERE id = $delete_book_id";
		$delete_book = $connection->query($sql_delete);
		header('location: student_details.php');
	}

	// PDF book delete
	if (isset($_GET['book_pdf_delete'])){
		$delete_book_id = (int)$_GET['book_pdf_delete'];
		$pdf_file_info = "SELECT * FROM student_libraries WHERE id = $delete_book_id";
		$pdf_file_info_result = $connection->query($pdf_file_info);
		if ($pdf_file_info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($pdf_file_info_result)){
			$book_file_del = $row['file_path'];
			unlink("../".$book_file_del);
		}

		$sql_delete_book = "UPDATE student_libraries SET file_path = '' WHERE id = $delete_book_id";
		$delete_book = $connection->query($sql_delete_book);
		header('location: student_details.php?book_edit='.$delete_book_id);

	}

	// cover page delete
	if (isset($_GET['book_cover_delete'])){
		$delete_book_id = (int)$_GET['book_cover_delete'];
		$pdf_file_info = "SELECT * FROM student_libraries WHERE id = $delete_book_id";
		$book_cover_info_result = $connection->query($pdf_file_info);
		if ($book_cover_info_result == false) {
			echo "Selection Faield". $connection->error;
		}
		while ($row = mysqli_fetch_array($book_cover_info_result)){
			$book_cover_del = $row['c_page_path'];
			unlink("../".$book_cover_del);
		}

		$sql_delete_book = "UPDATE student_libraries SET c_page_path = '' WHERE id = $delete_book_id";
		$delete_book = $connection->query($sql_delete_book);
		header('location: student_details.php?book_edit='.$delete_book_id);

	}

	// edit
	$book_upload_destination = "";
	$book_destination_path = "";
	$book_cover_pg_destination = "";
	$book_cover_pg_destination_path = "";
	$book_name = "";
	$book_title = "";
	$book_author = "";
	$book_edition = "";
	$book_edition = "";
	$book_number_of_pages = "";
	$book_edit_id = 0;
	if (isset($_GET['book_edit']) && !empty($_GET['book_edit'])) {
		$book_edit_id = (int)$_GET['book_edit'];
		$sql_edit = "SELECT * FROM student_libraries WHERE id = $book_edit_id";
		$book_res = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($book_res);
	 }

	 if(isset($_GET['book_edit'])){
	 	$book_destination_path = $edit_post_row['file_path'];
	 	$book_cover_pg_destination_path =  $edit_post_row['c_page_path'];
		$book_name = $edit_post_row['b_name'];
		$book_title = $edit_post_row['b_title'];
		$book_author = $edit_post_row['b_author'];
		$book_edition = $edit_post_row['b_edition'];
		$book_edition = $edit_post_row['b_edition'];
		$book_number_of_pages = $edit_post_row['b_num_of_pg'];

	}else{
		if(isset($_POST['book_post'])){
			$book_file_name = str_replace(" ", "_", $_FILES['pdf_file']['name']);
			$book_upload_destination = "../pdf_file/".$book_file_name;
			$book_destination_path = "pdf_file/".$book_file_name;
			$book_pdf_name = $_FILES['pdf_file']['tmp_name'];
			$pdf = move_uploaded_file($book_pdf_name, $book_upload_destination);

			$b_cover_pg_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['book_cover_pg']['name']);
			$book_cover_pg_destination = "../pdf_file/cover_pg/".$b_cover_pg_name;
			$book_cover_pg_destination_path = "pdf_file/cover_pg/".$b_cover_pg_name;
			$book_cover_pg_name = $_FILES['book_cover_pg']['tmp_name'];
			$cover_page = move_uploaded_file($book_cover_pg_name, $book_cover_pg_destination);

			$book_name = $_POST['book_name'];
			$book_title = $_POST['book_title'];
			$book_author = $_POST['book_author'];
			$book_edition = $_POST['book_edition'];
			$book_number_of_pages = $_POST['num_of_pages'];

			if($pdf && $cover_page){
				echo "This is upload<br>";
			$sql = "INSERT INTO student_libraries(file_path, c_page_path, b_name, b_title, b_author, b_edition, b_num_of_pg) VALUES ('$book_destination_path', '$book_cover_pg_destination_path','$book_name', '$book_title', '$book_author', '$book_edition', '$book_number_of_pages')";
			$b_insert = $connection->query($sql);
			}
		}
	}
	if(isset($_POST['book_post'])){

		$book_file_name = str_replace(" ", "_", $_FILES['pdf_file']['name']);
		$book_upload_destination = "../pdf_file/".$book_file_name;
		$book_destination_path = "pdf_file/".$book_file_name;
		$book_pdf_name = $_FILES['pdf_file']['tmp_name'];

		$b_cover_pg_name = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['book_cover_pg']['name']);
		$book_cover_pg_destination = "../pdf_file/cover_pg/".$b_cover_pg_name;
		$book_cover_pg_destination_path = "pdf_file/cover_pg/".$b_cover_pg_name;
		$book_cover_pg_name = $_FILES['book_cover_pg']['tmp_name'];

		$book_name = $_POST['book_name'];
		$book_title = $_POST['book_title'];
		$book_author = $_POST['book_author'];
		$book_edition = $_POST['book_edition'];
		$book_number_of_pages = $_POST['num_of_pages'];
		$pdf_book = move_uploaded_file($book_pdf_name, $book_upload_destination);
		$pdf_book_cover = move_uploaded_file($book_cover_pg_name, $book_cover_pg_destination);

		echo $book_destination_path;
		echo $book_cover_pg_name;
		echo $book_name;
		echo $book_author;
		echo $book_edition;
		echo $book_number_of_pages;



		if(isset($_GET['book_edit'])){
			$sql = "UPDATE student_libraries SET file_path = '$book_destination_path', c_page_path = '$book_cover_pg_destination_path', b_name ='$book_name', b_title = '$book_title', b_author = '$book_author', b_edition = '$book_edition', b_num_of_pg = '$book_number_of_pages' WHERE id = $book_edit_id";
			if($pdf_book){
				$sql = "UPDATE student_libraries SET file_path = '$book_destination_path', c_page_path = '$book_cover_pg_destination_path', b_name ='$book_name', b_title = '$book_title', b_author = '$book_author', b_edition = '$book_edition', b_num_of_pg = '$book_number_of_pages' WHERE id = $book_edit_id";
			}
			if($pdf_book_cover){
				$sql = "UPDATE student_libraries SET file_path = '$book_destination_path', c_page_path = '$book_cover_pg_destination_path', b_name ='$book_name', b_title = '$book_title', b_author = '$book_author', b_edition = '$book_edition', b_num_of_pg = '$book_number_of_pages' WHERE id = $book_edit_id";
			}

			if($pdf_book && $pdf_book_cover){
				$sql = "UPDATE student_libraries SET file_path = '$book_destination_path', c_page_path = '$book_cover_pg_destination_path', b_name ='$book_name', b_title = '$book_title', b_author = '$book_author', b_edition = '$book_edition', b_num_of_pg = '$book_number_of_pages' WHERE id = $book_edit_id";
			}

			$p_news = $connection->query($sql);
		}
		header('location: student_details.php');
	}

	//================Outside of the classroom===============
	// Delete
	if (isset($_GET['std_daily_life_delete']) && !empty($_GET['std_daily_life_delete'])) {
		$std_daily_life_delete_id = (int)$_GET['std_daily_life_delete'];
		$sql_delete = "DELETE FROM resource_for_daily_life WHERE id = $std_daily_life_delete_id";
		$std_daily_life_delete = $connection->query($sql_delete);
		header('location: student_details.php');
	}

	// edit
	 $std_daily_life_category = "";
	 $std_daily_life_title = "";
	 $std_daily_life_body = "";
	 $daily_life_edit_id = 0;
	if (isset($_GET['daily_life_edit']) && !empty($_GET['daily_life_edit'])) {
		$daily_life_edit_id = (int)$_GET['daily_life_edit'];
		$sql_edit = "SELECT * FROM resource_for_daily_life WHERE id = $daily_life_edit_id";
		$daily_life_edit = $connection->query($sql_edit);
		$edit_post_row = mysqli_fetch_array($daily_life_edit);
	 }

	 if(isset($_GET['daily_life_edit'])){
	 	$std_daily_life_category = $edit_post_row['category'];
		$std_daily_life_title = $edit_post_row['title'];
		$std_daily_life_body = $edit_post_row['body'];
	}else{
		if(isset($_POST['resource_for_daily_life_post'])){
			$std_daily_life_category = $_POST['daily_life_category'];
			$std_daily_life_title = $_POST['std_daily_life_title'];
			$std_daily_life_body = $_POST['editor'];
		}
	}
	if(isset($_POST['resource_for_daily_life_post'])){
		$std_daily_life_category = $_POST['daily_life_category'];
		$std_daily_life_title = $_POST['std_daily_life_title'];
		$std_daily_life_body = $_POST['editor'];


		$sql = "INSERT INTO resource_for_daily_life(category, title, body) VALUES ('$std_daily_life_category','$std_daily_life_title', '$std_daily_life_body')";
			if(isset($_GET['daily_life_edit'])){
				$sql = "UPDATE resource_for_daily_life SET category = '$std_daily_life_category', title = '$std_daily_life_title', body = '$std_daily_life_body' WHERE id = $daily_life_edit_id";
			}
			$staff_instu_exe = $connection->query($sql);
			if(!$staff_instu_exe){
				echo "Insert Failed :".$connection->error;
			}else{
				echo "Inserted";
			}
			header('location: student_details.php');
	}
 ?>
<?php
	include 'include/head.php';
?>
<div class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Studet news update and Book store
</div>
<?php
	include 'include/sidenavbar.php';
 ?>
 <section class="container">
 	<div class="row justify-content-center">
 		<div class="col-sm-12">
 			<div class="my-3" id="std_tabs">
				<ul class="nav nav-tabs justify-content-around">
					<li class="nav-item div_color rounded-top"><a href="#stdNewsUpdate" class="nav-link active" data-toggle="tab">Student Update</a></li>
					<li class="nav-item div_color rounded-top"><a href="#libraries" class="nav-link" data-toggle="tab">Libraries</a></li>
					<li class="nav-item div_color rounded-top"><a href="#outside_the_classroom" class="nav-link" data-toggle="tab">Outside the Classroom</a></li>
					<li class="nav-item div_color rounded-top"><a href="#resource_for_daily_life" class="nav-link" data-toggle="tab">Resource for Daily Life</a></li>
				</ul>
				<div class="tab-content">
					<div class="py-3 big_div_color tab-pane fade show active" id="stdNewsUpdate">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Update & News</h2>
					 			</div>
					 			<form action="student_details.php<?=((isset($_GET['std_news_edit']))?'?std_news_edit='.$std_news_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['std_news_edit'])?'Edit':'');?> News Title</label>
					 					<input type="text" name="news_title" class="form-control" id="news_title" placeholder="News Title" value="<?=$std_news_title_value?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="news_title"><?=(isset($_GET['std_news_edit'])?'Edit':'');?> Post Body :</label>
					 					<textarea class="ckeditor" name="editor" id="news_body"><?php echo $std_news_body_value?></textarea>
					 					<div class="d-flex">
					 						<small class="staff_news_body_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['std_news_edit'])): ?>
					 						<div><a href="student_details.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="std_news_post" id="std_news_post" value="<?=((isset($_GET['std_news_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
					 			<div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">All News list</h2>
								<?php

									$sql = "SELECT * FROM student_news";
									$std_result = $connection->query($sql);
									if(!$std_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_result) > 0){
											while ($row = mysqli_fetch_array($std_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?std_news_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?std_news_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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

					<div class="px-3 big_div_color tab-pane fade" id="libraries">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">pdf Book Collection</h2>
					 			</div>
					 			<form action="student_details.php<?=((isset($_GET['book_edit']))?'?book_edit='.$book_edit_id:'');?>" method="post" enctype="multipart/form-data" class="div_color text-white p-4 rounded">

					 				<div class="form-group">
					 					<label for="pdf_file"><?=(isset($_GET['book_edit'])?'Edit':'');?> PDF File</label>
					 					<input type="file" name="pdf_file" class="form-control" id="pdf_file">
					 					<div class="d-flex justify-content-end">
					 						<small class="thm_img_error_message"></small>
					 					</div>
					 					<?php 
						 					if(isset($_GET['book_edit'])){
						 					$book_edit_id = (int)$_GET['book_edit'];
											$sql_edit = "SELECT * FROM student_libraries WHERE id = $book_edit_id";
											$book_res = $connection->query($sql_edit);
											$edit_post_row = mysqli_fetch_array($book_res);
											if($edit_post_row['file_path'] == ''){}else{
										?>
										<div class="form-group" id="pre_img_hide">
					 						<div class="d-flex justify-content-start">
						 						<div>
						 							<a href="?book_pdf_delete=<?=$_GET['book_edit']?>" class="btn aDesign" id="book_pdf_delete"><i class="fas fa-trash-alt"></i> Replace Book</a>
						 						</div>
					 						</div>
						 				</div>
										<?php
												}
											}
					 					  ?>
					 				</div>

					 				<div class="form-group">
					 					<label for="book_cover_pg"><?=(isset($_GET['book_edit'])?'Edit':'');?> Cover Page</label>
					 					<input type="file" name="book_cover_pg" class="form-control" id="book_cover_pg">
					 					<div class="d-flex justify-content-end">
					 						<small class="thm_img_error_message"></small>
					 					</div>
					 					<?php 
						 					if(isset($_GET['book_edit'])){
						 					$book_edit_id = (int)$_GET['book_edit'];
											$sql_edit = "SELECT * FROM student_libraries WHERE id = $book_edit_id";
											$book_res = $connection->query($sql_edit);
											$edit_post_row = mysqli_fetch_array($book_res);
											if($edit_post_row['c_page_path'] == ''){}else{
										?>
										<div class="form-group" id="pre_img_hide">
					 						<div class="d-flex justify-content-start">
						 						<div class="mt-1"><img src="../<?=$book_cover_pg_destination_path	?>" width="150px" height="100px"></div>
						 						<div>
						 							<a href="?book_cover_delete=<?=$_GET['book_edit']?>" class="btn aDesign" id="book_cover_delete"><i class="fas fa-trash-alt"></i></a>
						 						</div>
					 						</div>
						 				</div>
										<?php
												}
											}
					 					  ?>
					 				</div>

					 				<div class="form-group">
					 					<label for="book_name"><?=(isset($_GET['book_edit'])?'Edit':'');?> Name: </label>
					 					<input type="text" name="book_name" class="form-control" id="book_name" placeholder="Enter Book Name" value="<?=$book_name?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>


					 				<div class="form-group">
					 					<div class="row justify-content-between">
					 						<div class="col-md-6">
					 							<label for="book_title"><?=(isset($_GET['book_edit'])?'Edit':'');?> Title: </label>
					 							<input type="text" name="book_title" class="form-control" id="book_title" placeholder="Book Title" value="<?=$book_title?>">
					 						</div>
					 						<div class="col-md-6">
					 							<label for="book_author"><?=(isset($_GET['book_edit'])?'Edit':'');?> Author: </label>
					 							<input type="text" name="book_author" class="form-control" id="book_author" placeholder="Enter Book Author" value="<?=$book_author?>"></div>
					 					</div>
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="form-group">
					 					<div class="row justify-content-between">
					 						<div class="col-md-6">
					 							<label for="book_edition"><?=(isset($_GET['book_edit'])?'Edit':'');?> Edition: </label>
					 							<input type="text" name="book_edition" class="form-control" id="book_edition" placeholder="Editon of Book" value="<?=$book_title?>">
					 						</div>
					 						<div class="col-md-6">
					 							<label for="num_of_pages"><?=(isset($_GET['book_edit'])?'Edit':'');?> Number of Pages: </label>
					 							<input type="number" name="num_of_pages" class="form-control" id="num_of_pages" placeholder="Enter the number of page" value="<?=$book_author?>"></div>
					 					</div>
					 					<div class="d-flex justify-content-end">
					 						<small class="staff_news_title_error_message"></small>
					 					</div>
					 				</div>

					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['book_edit'])): ?>
					 						<div><a href="student_details.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="book_post" id="book_post" value="<?=((isset($_GET['book_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>
							</div>
						</div>
						<div class="my-3 accodion" id="accodion">
							 <h2 class="text-center text-white">Book Collection</h2>
							<?php

								$all_book_info = "SELECT * FROM student_libraries";
								$book_result = $connection->query($all_book_info);
								if ($book_result == false) {
									echo "Selection Faield". $connection->error;
								}else{
									if(mysqli_num_rows($book_result) > 0){
										while ($row = mysqli_fetch_array($book_result)) {
							?>
										 	<div class="my-1">
										 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#book_<?= $row['id']; ?>" data-parent=".accodion">
										 			<div>
										 				<a href="?book_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
										 				<a href="?delete_book=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
										 			</div>
											 		<div><?=$row['b_name'];?></div>
											 		<div><i class="fas fa-plus px-2"></i></div>
											 	</div>
											 	<div class="collapse mx-5 div_collaple  p-3" id="book_<?= $row['id']; ?>">
											 		<div class="row">
											 			<div class="col-md-12 text-center">
											 				<img src="../<?= $row['c_page_path']; ?>" class="img-thumbnail w-25 h-50">
											 				<p><b>Book Name: <?= $row['b_name']; ?></b></p>
											 				<p>Book Title: <?= $row['b_title']; ?></p>
											 				<p>Author: <?= $row['b_author']; ?></p>
											 				<p>Edition: <?= $row['b_edition']; ?></p>
											 				<p>Number of Page: <?= $row['b_num_of_pg']; ?></p>
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

					<div class="px-3 big_div_color tab-pane fade" id="outside_the_classroom">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Outside the Classroom</h2>
					 			</div>
					 			<form action="student_details.php<?=((isset($_GET['outuside_edit']))?'?outuside_edit='.$outuside_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="outside_category"><?=(isset($_GET['outuside_edit'])?'Edit':'');?> Instruction Cetegory</label>
			 							<select class="form-control" name="outside_category" id="outside_category">
											<?php 
												if (isset($_GET['outuside_edit']) && !empty($_GET['outuside_edit'])) { ?>
												<option value="<?=$outside_category?>"><?=$outside_category?> <small>(selected)</small></option>
											<?php
												}else{ ?>
													<option value="">--Select--</option>
											<?php
												}
											 ?>
											<option value="Student Life">Student Life</option>
											<option value="Housing and Dining">Housing and Dining</option>
											<option value="Community Centers">Community Centers</option>
											<option value="Public Service">Public Service</option>
										</select>
			 						</div>
					 				<div class="form-group">
					 					<label for="activity_title"><?=(isset($_GET['outuside_edit'])?'Edit':'');?> Title</label>
					 					<input type="text" name="activity_title" class="form-control" id="activity_title" placeholder="Enter Title" value="<?=$outside_title	?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="activity_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="editor"><?=(isset($_GET['outuside_edit'])?'Edit':'');?> Body :</label>
					 					<textarea class="ckeditor" name="editor" id="staff_body"><?php echo $outside_body?></textarea>
					 					<div class="d-flex">
					 						<small class="activity_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['outuside_edit'])): ?>
					 						<div><a href="student_details.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="stud_activity_post" id="stud_activity_post" value="<?=((isset($_GET['outuside_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>

								 <!-- Select Student Life -->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Student Life</h2>
								<?php

									$sql = "SELECT * FROM std_outside_the_classroom WHERE category = 'Student Life'";
									$std_activity_result = $connection->query($sql);
									if(!$std_activity_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_activity_result) > 0){
											while ($row = mysqli_fetch_array($std_activity_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#std_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?outuside_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?outside_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="std_<?= $row['id']; ?>"><?= $row['body']; ?></div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>
								 <!-- Select Your Housing and Dining -->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Housing and Dining</h2>
								<?php

									$sql = "SELECT * FROM std_outside_the_classroom WHERE category = 'Housing and Dining'";
									$std_activity_result = $connection->query($sql);
									if(!$std_activity_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_activity_result) > 0){
											while ($row = mysqli_fetch_array($std_activity_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#std_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?outuside_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?outside_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="std_<?= $row['id']; ?>"><?= $row['body']; ?></div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>

								 <!-- Select Community Centers -->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Community Centers</h2>
								<?php

									$sql = "SELECT * FROM std_outside_the_classroom WHERE category = 'Community Centers'";
									$std_activity_result = $connection->query($sql);
									if(!$std_activity_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_activity_result) > 0){
											while ($row = mysqli_fetch_array($std_activity_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#std_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?outuside_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?outside_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="std_<?= $row['id']; ?>"><?= $row['body']; ?></div>
												 	</div>
								<?php					
								 				}
								 			}
								 		}
								?>
								 </div>

								 <!-- Select Public Service-->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Public Service</h2>
								<?php

									$sql = "SELECT * FROM std_outside_the_classroom WHERE category = 'Public Service'";
									$std_activity_result = $connection->query($sql);
									if(!$std_activity_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_activity_result) > 0){
											while ($row = mysqli_fetch_array($std_activity_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#std_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?outuside_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?outside_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
												 			</div>
													 		<div><?=$row['title'];?></div>
													 		<div><i class="fas fa-plus px-2"></i></div>
													 	</div>
													 	<div class="collapse mx-5 div_collaple  p-3" id="std_<?= $row['id']; ?>"><?= $row['body']; ?></div>
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

					<div class="px-3 big_div_color tab-pane fade" id="resource_for_daily_life">
						<div class="row justify-content-center">
							<div class="col-sm-8">
					 			<div>
					 				<h2 class="text-center text-white">Resource for Daily Life</h2>
					 			</div>
					 			<form action="student_details.php<?=((isset($_GET['daily_life_edit']))?'?daily_life_edit='.$daily_life_edit_id:'');?>" method="post" class="div_color text-white p-4 rounded">
					 				<div class="form-group">
					 					<label for="daily_life_category"><?=(isset($_GET['daily_life_edit'])?'Edit':'');?> Daily Life Cetegory</label>
			 							<select class="form-control" name="daily_life_category" id="daily_life_category">
											<?php 
												if (isset($_GET['daily_life_edit']) && !empty($_GET['daily_life_edit'])) { ?>
												<option value="<?=$std_daily_life_category?>"><?=$std_daily_life_category?> <small>(selected)</small></option>
											<?php
												}else{ ?>
													<option value="">--Select--</option>
											<?php
												}
											 ?>
											<option value="helth and fitness">HEALTH & FITNESS</option>
											<option value="safety">SAFETY</option>
											<option value="geting around">GETTING AROUND</option>
											<option value="managing your finances">MANAGING YOUR FINANCES</option>
											<option value="computing">COMPUTING</option>
										</select>
			 						</div>
					 				<div class="form-group">
					 					<label for="std_daily_life_title"><?=(isset($_GET['daily_life_edit'])?'Edit':'');?> Title</label>
					 					<input type="text" name="std_daily_life_title" class="form-control" id="std_daily_life_title" placeholder="Enter Title" value="<?=$std_daily_life_title	?>">
					 					<div class="d-flex justify-content-end">
					 						<small class="Staff_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="form-group">
					 					<label for="editor"><?=(isset($_GET['daily_life_edit'])?'Edit':'');?> Body :</label>
					 					<textarea class="ckeditor" name="editor" id="staff_body"><?php echo $std_daily_life_body?></textarea>
					 					<div class="d-flex">
					 						<small class="Staff_error_message"></small>
					 					</div>
					 				</div>
					 				<div class="d-flex justify-content-between">
					 					<?php if(isset($_GET['daily_life_edit'])): ?>
					 						<div><a href="student_details.php" class="btn btn-danger">Close</a></div>
					 					<?php endif; ?>
					 					<div><input type="submit" name="resource_for_daily_life_post" id="resource_for_daily_life_post" value="<?=((isset($_GET['daily_life_edit']))?'Edit':'Add');?> Post" class="btn btn-success btn-block"></div>
					 				</div>
					 			</form>

								 <!-- Select Before You Arrive -->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Helth and Fitness</h2>
								<?php

									$sql = "SELECT * FROM resource_for_daily_life WHERE category = 'helth and fitness'";
									$std_daily_life_result = $connection->query($sql);
									if(!$std_daily_life_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_daily_life_result) > 0){
											while ($row = mysqli_fetch_array($std_daily_life_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?daily_life_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?std_daily_life_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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
								 	<h2 class="text-center text-white">Safety</h2>
								<?php

									$sql = "SELECT * FROM resource_for_daily_life WHERE category = 'safety'";
									$std_daily_life_result = $connection->query($sql);
									if(!$std_daily_life_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_daily_life_result) > 0){
											while ($row = mysqli_fetch_array($std_daily_life_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?daily_life_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?std_daily_life_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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
								 	<h2 class="text-center text-white">Geting Around</h2>
								<?php

									$sql = "SELECT * FROM resource_for_daily_life WHERE category = 'geting around'";
									$std_daily_life_result = $connection->query($sql);
									if(!$std_daily_life_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_daily_life_result) > 0){
											while ($row = mysqli_fetch_array($std_daily_life_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?daily_life_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?std_daily_life_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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

								 <!-- Select Managing your finances-->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Managing your finances</h2>
								<?php

									$sql = "SELECT * FROM resource_for_daily_life WHERE category = 'managing your finances'";
									$std_daily_life_result = $connection->query($sql);
									if(!$std_daily_life_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_daily_life_result) > 0){
											while ($row = mysqli_fetch_array($std_daily_life_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?daily_life_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?std_daily_life_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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

								 <!-- Select Computing-->
								 <div class="my-3 accodion" id="accodion">
								 	<h2 class="text-center text-white">Computing</h2>
								<?php

									$sql = "SELECT * FROM resource_for_daily_life WHERE category = 'computing'";
									$std_daily_life_result = $connection->query($sql);
									if(!$std_daily_life_result){
										echo "Fetch Failed :".$connection->error;
									}else{
										if(mysqli_num_rows($std_daily_life_result) > 0){
											while ($row = mysqli_fetch_array($std_daily_life_result)) {
								?>
												 	<div class="my-1">
												 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#bio_<?= $row['id']; ?>" data-parent=".accodion">
												 			<div>
												 				<a href="?daily_life_edit=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-edit"></i></a>
												 				<a href="?std_daily_life_delete=<?= $row['id']; ?>" class="btn aDesign"><i class="fas fa-trash-alt"></i></a>
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
 	</div>
 </section>
</body>
</html>
