<!DOCTYPE html>
<html>
<head>
	<title>insert</title>
</head>
<body>
<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "unix");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Escape user inputs for security
$research_name = $mysqli->real_escape_string($_REQUEST['research_name']);
$group_name = $mysqli->real_escape_string($_REQUEST['group_name']);
$group_leader = $mysqli->real_escape_string($_REQUEST['group_leader']);
$superviser = $mysqli->real_escape_string($_REQUEST['superviser']);
$start_date = $mysqli->real_escape_string($_REQUEST['start_date']);
$end_date = $mysqli->real_escape_string($_REQUEST['end_date']);


// attempt insert query execution
$sql = "INSERT INTO ongoing_researches (research_name, group_name, group_leader, superviser, start_date, end_date) VALUES ('$research_name', '$group_name', '$group_leader', '$superviser', '$start_date', '$end_date')";
if($mysqli->query($sql) === true){

  echo "<center><h1>Data Inserted successfully.<h1></center>";

} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>
</body>
</html>