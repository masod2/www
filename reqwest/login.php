<?php

// Get the form data
$email = $_POST['email'];
$password = sha1($_POST['password']);


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
      $name = $row['username'];

      // Execute the UPDATE query
      $result = $conn->query($UPDATE);
      $SELECT = "SELECT id  From users Where email = '$email' Limit 1";
      $result = $conn->query($SELECT);
      $row = $result->fetch_assoc();
      $user_id = $row['id'];
      // Start a new session
      session_start();

      // Store the user's information in the session
      $_SESSION['logged_in'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['username'] = $name;
      $_SESSION['user_id'] = $user_id;
      header('Location: ../dashboard.php');

      // Redirect to the dashboard page
    } else {
      // Display an error message

      echo "<script>alert('Invalid email or password. Please try again.');</script>";


    }

  } else {
    // Display an error message
    echo "<script>alert('Connection failed' . $conn->connect_error );</script>";

  }
} else {
  // Display an error message
  echo "<script>alert('Email and password are required.');</script>";


}

?>