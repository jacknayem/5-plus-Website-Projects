<?php
	require_once 'core/dbconnection.php';

	$sql = "INSERT INTO `feadback` (`name`, `email`, `message`)  VALUES ('$_POST[name]', '$_POST[email]', '$_POST[message]')";
	$qry = mysqli_query($conn,  $sql);
	if (!$qry) {
		die("Please Refresh You browser");
	}
	else
	{
		echo "Thank for your valuable feedback";
	}
?>
