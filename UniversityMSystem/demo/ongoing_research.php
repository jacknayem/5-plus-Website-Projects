<!DOCTYPE html>
<html>
<head>
	<title>Ongoing Research</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Font Awesome 5.1.0 -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">


	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>


	<link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
</head>
<body>
	<?php include('include/firstnavbar.php');?>
	<?php include('include/secondnavbar.php');?>
 
          <!-- <<-----------Cover started ----------->

<div style="width:100%; height: 300px;background-image: url(image/rlab2.jpg);background-position: center">
  <h1 class="display-4" style=" font-style: bold; text-align: center; font-size: 80px;color: white; background: rgba(4, 147, 114,0.6);padding-bottom: 8px;padding-top: 0px">Ongoing Research</h1>
</div>
<br>
            <!-- <<-----------cover ends ----------->   


<div class="row">
    <div class="col-md-2 bg-dark" style="padding-right: 0px">
        <div class="vertical-menu">
  <a class="bg-dark" href="research.php" style="color:white">Overview</a>
  <a class="bg-dark" href="researchprograms.php" style="color:white">Research Programs</a>
  <a class="active bg-light">Ongoing Research</a>
  <a class="bg-dark" href="researchlabs.php" style="color:white">Research Labs</a>
  <a class="bg-dark" href="publication.php" style="color:white">Publication</a>
</div>
<style type="text/css">
  

  .vertical-menu {
    width: 100%; 

}

.vertical-menu a {
    background-color: #eee; /* Grey background color */
    color: black; /* Black text color */
    display: block; /* Make the links appear below each other */
    padding: 12px; /* Add some padding */
    text-decoration: none; /* Remove underline from links */
}

.vertical-menu a:hover {
    background-color: #ccc; /* Dark grey background on mouse-over */
}

.vertical-menu a.active {
    background-color: #4CAF50; /* Add a green color to the "active/current" link */
    color: white;
}
</style>
    </div>
    <div class="col-md-10">
        <div class="container">
  <div class="row">

                    <!-- column-1 of row-1 -->
<div class="col-md-12">
      <div class="jumbotron jumbotron-fluid list-group-item-success" style=" border-radius: 10px;background-image: url(image/rsubbac.jpg); color:white;">
  <div class="container">
    <h2 class="display-4"><center><b>Scheduled Researches</b></center></h2>
  </div>



  <div>
    <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$mysqli = new mysqli("localhost", "root", "", "unix");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
// Attempt select query execution
$sql = "SELECT * FROM ongoing_researches";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>No.</th>";
                echo "<th>Research Name</th>";
                echo "<th>Group Name</th>";
                echo "<th>Group Leader</th>";
                echo "<th>Superviser</th>";
                echo "<th>Research Started</th>";
                echo "<th>Research End</th>";
                echo "<th>Action</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['no'] . "</td>";   
                echo "<td>" . $row['research_name'] . "</td>";
                echo "<td>" . $row['group_name'] . "</td>";
                echo "<td>" . $row['group_leader'] . "</td>";
                echo "<td>" . $row['superviser'] . "</td>";
                echo "<td>" . $row['start_date'] . "</td>";
                echo "<td>" . $row['end_date'] . "</td>";
                echo "<td></td>";
               
                echo "</tr>";
        }
        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
?>

<style type="text/css">

table {
    border-collapse: collapse;
}

table, th, td {
    border: 2px solid white;
}
table {
    width: 100%;
}

th {
    height: 30px;
    background-color: green;
    color: white;
    font-size: 20px;
}
th, td {
    padding: 15px;
    text-align: left;
}
td{
    color:white;
    font-size: 15px;
    text-transform: uppercase;
}
</style>
</div>
</div>
      
    </div>
</div>
</div>
    </div>
</div>







	<?php include('include/head.php');?>
	<?php include('include/footer.php');?>


</body>
</html>