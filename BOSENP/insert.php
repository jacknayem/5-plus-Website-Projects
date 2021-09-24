<!DOCTYPE html>
<html>
<body>
	<?php 
		include 'core/dbconnection.php';
	 ?>
	<!-- ==============Today Special================== -->
	<h1>Today Gallery</h1>
	<form action="testupload.php" method="POST" enctype="multipart/form-data">
		<input type="text" name="fname">
		<input type="test" name="fdiscription">
		<input type="number" name="fnum">
		<input type="file" name="image">
		<button>Submit</button>
	</form>
	<!-- ==============Gallery Month Special============== -->
	<h1>gallery_month_specials</h1>
	<form action="insert.php" method="POST" enctype="multipart/form-data">
		<input type="text" name="fname">
		<input type="test" name="fdiscription">
		<input type="text" name="price">
		<input type="file" name="image">
		<!-- <input type="button" name="galmonspecial" value="SUBMIT"> -->
		<input type="submit" value="INSERT" name="galmonspecial">
	</form>
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		// echo "It is not works";
	  if(isset($_POST['galmonspecial'])) 
		{
			$name       = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['image']['name']);
			$destination     = "images/month_specials/".$name;
			$filename        = $_FILES['image']['tmp_name'];
			if(move_uploaded_file($filename, $destination))
			{
				$sql="INSERT INTO gallery_month_specials(image, fname, fdiscription, fprice) VALUES ('$destination','$_POST[fname]','$_POST[fdiscription]','$_POST[price]')";
				$qry = mysqli_query($conn,  $sql);
			}
		}
	}
	?>
	<h1>Photo Gallery Insert</h1>
	<form action="insert.php" method="POST" enctype="multipart/form-data">
		<input type="text" name="fname">
		<input type="test" name="fdiscription">
		<input type="file" name="image">
		<input type="submit" value="INSERT" name="gallery">
	</form>
		<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		// echo "It is not works";
	  if(isset($_POST['gallery'])) 
		{
			$name       = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['image']['name']);
			$destination     = "images/photo_gallery/".$name;
			$filename        = $_FILES['image']['tmp_name'];
			if(move_uploaded_file($filename, $destination))
			{
				$sql="INSERT INTO photo_gallery(fname, fdiscription, image) VALUES ('$_POST[fname]','$_POST[fdiscription]','$destination')";
				$qry = mysqli_query($conn,  $sql);
				// =====Select=====
				$sql = "SELECT * FROM photo_gallery";
			   	$obj = mysqli_query($conn,$sql);
				foreach ($obj as $key=>$value)
			      {
				   	echo "<img style='width:150px;' src=".$value['image'].">";
			      }
			}
		}
	}
	?>

</body>
</html>			
<?php 

 ?>