<?php

// Get the form data
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($email) && !empty($password)) {
  // Include the connection file
  include 'Connection.php';
  // Check connection
  if (!$conn->connect_error) {
    // Create the SELECT and UPDATE queries
    $SELECT = "SELECT email, username FROM users WHERE email = '$email' AND password = '$password' LIMIT 1";
    $UPDATE = "UPDATE users SET last_login = NOW() WHERE email = '$email'";
    // Execute the SELECT query
    $result = $conn->query($SELECT);
    // Check if the email and password are correct
    if ($result->num_rows == 1) {
      // Fetch the user's name
      $row = $result->fetch_assoc();
      $name = $row['name'];

      // Execute the UPDATE query
      $result = $conn->query($UPDATE);

      // Start a new session
      session_start();

      // Store the user's information in the session
      $_SESSION['logged_in'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['name'] = $name;

      // Redirect to the dashboard page
      header('Location: ../dashboard.php');
    } else {
      // Display an error message
      echo "<script>alert('Invalid email or password. Please try again.');</script>";
      header('Location: ../login.html');
    }

  } else {
    // Display an error message
    echo "<script>alert('Connection failed: " . $conn->connect_error . "');</script>";
    header('Location: ../login.html');
  }
} else {
  // Display an error message
  echo "<script>alert('Email and password are required.');</script>";
  header('Location: ../login.html');
}

?>