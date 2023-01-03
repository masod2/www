<?php

// Get the form data
 $email = $_POST['email'];
$password = $_POST['password'];

if ( !empty($email) && !empty($password)) {
  // Connect to the database
  $server = "localhost";
  $username_db = "root";
  $password_db = "";
  $dbname = "protofolio";
  $created_at = date("Y-m-d H:i:s");
  // Create connection
  $conn = new mysqli($server, $username_db, $password_db, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    $SELECT = "SELECT email From users Where email = ? AND password =? Limit 1";
    $UPDATE = "UPDATE  users  set last_login = ? where email = ?";

    // Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if ($rnum == 1) {
      $stmt->close();
      $stmt = $conn->prepare($UPDATE);
      $stmt->bind_param("ss", $created_at, $email);
      $stmt->execute();
      // Start a new session
      session_start();

      // Store the user's information in the session
      $_SESSION['logged_in'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['email'] = $email;
      // Redirect to the dashboard page
      header('Location: ../dashboard.php');
      echo "New record inserted sucessfully";

    } else {
      echo "tis yser not exsist try log in again";
    }
    $stmt->close();
    $conn->close();
  }
} else {
  echo "All field are required";
  die();
}





?>