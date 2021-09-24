<!DOCTYPE html>
<html>
<body>
	<?php
	include 'dbconnection.php';
	?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$target_dir = "images/test/";
$file_name = $_FILES["fileToUpload"]["name"];
$target_file = $target_dir . basename($file_name);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>

<form action="#" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
	// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
	// VALUES ('John', 'Doe', 'john@example.com')";
	$sql = "INSERT INTO `tbphoto` (`image`)  VALUES ('$target_file')";

	if ($conn->query($sql) === TRUE) {
	    echo "New record created successfully";
	} else {
	    echo "Error: " . $sql . "<br>" . $conn->error;
	}
	// $conn->close();
}
?>

<!-- ========Select========== -->
<!-- <?php
if ($_SERVER["REQUEST_METHOD"] == "POST"){
$sql = "SELECT `id`,`image` FROM `tbphoto`";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"] . $row["image"]. "<br>";
    }
} else {
    echo "0 results";
}
// $conn->close();

}
?>
 --><?php
 		if ($_SERVER["REQUEST_METHOD"] == "POST"){
	   $query = "select * from tbphoto";
	   $getImage = $conn->query($query);
	   if ($getImage) {
	    while ($result = $getImage->fetch_assoc()) {
	  ?>
	  <img src="<?php echo $result['image']; ?>" height="100px" 
	   width="200px"/>
	   <img src="">
	 <?php } } 
	}
?>
</body>
</html>