<?php
// connection to the database
$user = "root";
$password = "";
$database = "eastern_union";
$conn = new mysqli("127.0.0.1:3306",$user,$password,$database);
if($conn->connect_error) {
    die("Error connecting to $conn->connect_error: ");
}
error_reporting(0);

session_start();
$_SESSION['login'] = FALSE
?>