<?php 
   // $connection = mysqli_connect('localhost','root','','osenp');
   include 'dbconnection.php';

   $name       = uniqid().date("Y-m-d-H-i-s").str_replace(" ", "_", $_FILES['image']['name']);
   $destination     = "images/test/".$name;
   $filename        = $_FILES['image']['tmp_name'];

   if(move_uploaded_file($filename, $destination))
   {
   	   $sql = "INSERT INTO today_gallery (image, fname, fdiscription,fnum) VALUES ('$destination','$_POST[fname]','$_POST[fdiscription]', '$_POST[fnum]')";
   	   mysqli_query($conn,$sql);

   	  $sql = "SELECT * FROM today_gallery";
   	  $obj = mysqli_query($conn,$sql);
        // $obj2 = array(10,20,30);
	   foreach ($obj as $key=>$value)
      {
	   	echo "<img style='width:150px;' src=".$value['image'].">";
         echo $value['fname'];
      }
   }
?>