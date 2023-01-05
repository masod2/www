<?php
// Connect to the database
$server = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "protofolio";

// Create connection
$conn = new mysqli($server, $username_db, $password_db, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}
 
?>