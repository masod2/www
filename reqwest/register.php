<?php

// Get the form data
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

if (!empty($username) && !empty($email) && !empty($password)) {
  // Connect to the database
  $server = "localhost";
  $username_db = "root";
  $password_db = "";
  $dbname = "protofolio";
$created_at= date("Y-m-d H:i:s");
  // Create connection
  $conn = new mysqli($server, $username_db, $password_db, $dbname);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    $SELECT = "SELECT email From users Where email = ? Limit 1";
    $INSERT = "INSERT Into users (username, email, password, created_at) values(?, ?, ?, ?)";
    
    // Prepare statement
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
    if ($rnum==0) {
        $stmt->close();
        $stmt = $conn->prepare($INSERT);
        $stmt ->bind_param("ssss", $username, $email, $password, $created_at);
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

       }
         else {
        echo "someone already register using this email";
    }
    $stmt->close();
    $conn->close();
    }
} else {
  echo "All field are required";
  die();
}
 



 
?>