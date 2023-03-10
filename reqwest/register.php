<?php
// Get the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = sha1($_POST['password']);

$created_at = date("Y-m-d H:i:s");

// Check if the form data is valid 
if (!empty($email) && !empty($password) && !empty($username)) {
  // Include the connection file
  include 'Connection.php';

  // Check if the connection was successful
  if (!$conn->connect_error) {
    // Create the SELECT and INSERT queries
    $SELECT = "SELECT email From users Where email = '$email' Limit 1";
    $INSERT = "INSERT Into users (username, email, password, created_at) values ('$username', '$email', '$password', '$created_at')";

    // Execute the SELECT query
    $result = $conn->query($SELECT);

    // Check if the email is already registered
    if ($result->num_rows == 0) {
      // Execute the INSERT query
      $result = $conn->query($INSERT);
      $SELECT = "SELECT id  From users Where email = '$email' Limit 1";
      $result = $conn->query($SELECT);
      $row = $result->fetch_assoc();
      $user_id = $row['id'];
      // Start a new session
      session_start();
      // Store the user's information in the session
      $_SESSION['logged_in'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['user_id'] = $user_id;
      $_SESSION['username'] = $username;

      // Redirect to the dashboard page
      header('Location: ../dashboard.php');
      echo "<script>alert('New record inserted successfully');</script>";
    } else {
      echo "<script>alert('The email is already registered. Please try again.');</script>";

    }
  } else {
    $error = "Error: " . $sql . "<br>" . $conn->error;
    echo "<script>alert('$error');</script>";
  }

  // Close the connection
  $conn->close();
} else {
  echo "<script>alert('All fields are required');</script>";
}
?>