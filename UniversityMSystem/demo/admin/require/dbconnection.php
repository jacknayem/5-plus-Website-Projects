
<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "university";

	$connection = new mysqli($servername,$username,$password,$dbname);

	if($connection->connect_error){
		die("Connection Failed :". $connection->connect_error);
	}
	else{
		echo "Connected";
	}
 ?>