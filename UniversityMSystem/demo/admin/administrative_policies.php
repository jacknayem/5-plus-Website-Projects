<!DOCTYPE html>
<html>
<head>
	<title>Administrative</title>
	<script src="ckeditor/ckeditor.js"></script>
<?php 
	include 'include/head.php';
	include 'require/dbconnection.php';
?>
<header class="bg-dark py-3">
	<h1 class="text-center text-white wow fadeInLeft" data-wow-duration="5s">Administrative</h1>
</header>
<?php 
	include 'include/sidenavbar.php';
 ?>
 <section class="container div_big_color my-2 rounded">
 	<h2 class="text-center text-white wow flip" >News & Update</h2>
 	<div class="row justify-content-around">
 		<div class="col-md-5 div_color p-4 rounded text-white m-1">
 			<h3 class="text-center wow pluse" data-wow-duration="2s">Add Post</h3>
 			<form action="" method="post">
 				<div class="form-group">
 					<label>News Ttile: </label>
 					<input type="text" name="title" id="newstitle" class="form-control">
 				</div>
 				<div class="form-group">
 					<label>News Body: </label>
 					<textarea class="ckeditor" name="editor"></textarea>
 				</div>
 				<div class="form-group">
 					<button type="submit" class="btn btn-info float-right">Add Post</button>
 				</div>
 			</form>
 		</div>
 		<div class="col-md-6 div_color p-4 rounded m-1">
 			<h3 class="text-center text-white wow pluse" data-wow-duration="2s">All News</h3>
 			<table class="table table-dark table-striped table-responsive">
 				<thead>
 					<tr>
 						<th></th>
 						<th>ID</th>
 						<th>Title</th>
 						<th>Date</th>
 						<th>News</th>
 						<th></th>
 					</tr>
 				</thead>
 				<tbody>
 					<tr>
 						<td><button type="button" class="btn btn-dark text-primary"><i class="far fa-edit"></i></button></td>
 						<td>John</td>
        				<td>Doe</td>
        				<td>john@example.com</td>
        				<td>John</td>
        				<td><button type="button" class="btn btn-dark text-danger"><i class="fas fa-trash-alt"></i></button></td>
 					</tr>

 					<tr>
 						<td><button type="button" class="btn btn-dark text-primary"><i class="far fa-edit"></i></button></td>
 						<td>John</td>
        				<td>Doe</td>
        				<td>john@example.com</td>
        				<td>John</td>
        				<td><button type="button" class="btn btn-dark text-danger"><i class="fas fa-trash-alt"></i></button></td>
 					</tr>
 				</tbody>
 			</table>
 		</div>
 	</div>
 </section>
 <section class="container div_big_color my-2 rounded">
 	<h2 class="text-center text-white wow flip" >Bigraphy</h2>
 	<div class="row justify-content-around">
 		<div class="col-md-10 div_color p-4 rounded text-white m-1">
 			<h3 class="text-center wow pluse" data-wow-duration="2s">Update Bigraphy</h3>
 			<form action="" method="post">
 				<div class="form-group">
 					<label>Name: </label>
 					<input type="text" name="title" id="biographytitle" class="form-control">
 				</div>
 				<div class="form-group">
 					<label>Biography Body: </label>
 					<textarea class="ckeditor" name="editor"></textarea>
 				</div>
 				<div class="form-group">
 					<button type="submit" class="btn btn-info float-right">Update Bigraphy</button>
 				</div>
 			</form>
 		</div>
 		<div class="col-md-10 accodion" id="accodion">
			<h5 class="text-center text-white">Full Biography</h5>
		 	<div class="my-1">
		 		<div class="d-flex justify-content-between px-3 div_color" data-toggle="collapse" data-target="#testing" data-parent=".accodion">
		 			<div>
		 				<a href="" class="btn aDesign"><i class="fas fa-edit"></i></a>
		 			</div>
			 		<div>Title</div>
			 		<div><i class="fas fa-plus px-2"></i></div>
			 	</div>
			 	<div class="collapse mx-2 div_collaple  p-3" id="testing">Testing</div>
		 	</div>
 		</div>
 	</div>
 </section>
<?php
	include 'include/footer.php';
 ?>