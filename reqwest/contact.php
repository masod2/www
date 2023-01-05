<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$to = "masod8842@gmail.com";
$subject = "New Email Form Submission from $name";
$headers = "From: $email";
if (!empty($name) && !empty($email) && !empty($message) && !empty($to) && !empty($subject)) {
  //send the email to local file 
  mail($to, $subject, $message, $headers);
  echo "The email has been sent!";
  // Include the connection file
  include 'Connection.php';
  // Check connection
  if (!$conn->connect_error) {
    // Create the SELECT and UPDATE queries
    $INSERT = "INSERT INTO messages (name, email, message, created_at)
VALUES ('$name','$email','$message', now())";

    $result = $conn->query($INSERT);
    if (!$result) {
      echo "Error: " . mysqli_error($conn);
    }    $conn->close();

  }
} else {
  echo "Username and password are required";
  die();
}
?>