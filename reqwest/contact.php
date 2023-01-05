<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$to = "masod8842@gmail.com";
$subject = "New Email Form Submission from $name";
$headers = "From: $email";
mail($to, $subject, $message, $headers);
echo "The email has been sent!";

if (!empty($username) && !empty($password)) {
  // Connect to the database
  $server = "localhost";
  $username_db = "root";
  $password_db = "";
  $dbname = "protofolio";

  // Create connection
  $conn = new mysqli($server, $username_db, $password_db, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    $INSERT = "INSERT INTO emails (name, email, message, created_at)
VALUES ($name,$email,$message, now())";

    // Prepare statement
    $stmt = $conn->prepare($INSERT);
    $stmt->bind_param("ssss", $name, $email, $message);

    $stmt->execute();
    $rnum = $stmt->num_rows;


    $stmt->close();
    $conn->close();
  }
} else {
  echo "Username and password are required";
  die();
}
?>