<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "osenp";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    echo "not";
}
mysqli_set_charset($conn,"utf8");

require_once $_SERVER['DOCUMENT_ROOT'].'/Website(Restuarants)new/admin/config.php';
require_once BASEURL.'helper/helper.php';
?>