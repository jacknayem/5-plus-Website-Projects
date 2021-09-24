<!DOCTYPE html>
<html>
<head>
	<title>Test</title>
</head>
<body>
<section>
	<?php
		$conn = mysqli_connect("localhost", "root", "", "osenp");
		if(!$conn) {
		 echo "Not connected";
		}
	?>

	<?php
	   if(isset($_POST['submit'])) {
	    $permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
	    $file_size = $_FILES['image']['size'];
	    $file_temp = $_FILES['image']['tmp_name'];

	    $div = explode('.', $file_name);
	    $file_ext = strtolower(end($div));
	    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
	    $uploaded_image = "images/test/".$unique_image;

	    if (empty($file_name)) {
	     echo "<span class='error'>Please Select any Image !</span>";
	    }
	    elseif (in_array($file_ext, $permited) === false) {
		     echo "<span class='error'>You can upload only:-"
		     .implode(', ', $permited)."</span>";
	    }
	    else{
		    // $folder = "images/test/";
		    move_uploaded_file($file_temp, $folder.$unique_image);
		    $sql = "INSERT INTO `tbphoto` (`image`)  VALUES ('$unique_image')";
			$qry = mysqli_query($conn,  $sql);
		}
	   }
	  ?>
	<form action="" method="post" enctype="multipart/form-data" >
		 <input type="file" name="image"/>
		 <input type="submit" name="submit" value="upload" />
	</form>
	<?php
	   $query = "select * from tbphoto";
	   $getImage = mysqli_query($conn,  $query);
	   if ($getImage) {
	    while ($result = $getImage->fetch_assoc()) {
	  ?>
	  <img src="<?php echo $result['image']; ?>" height="100px" 
	   width="200px"/>
	   <img src="">
	 <?php } } ?>
</section>
	
</body>
</html>