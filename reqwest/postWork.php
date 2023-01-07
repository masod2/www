<?php
// Start a new session
session_start();

// Get the form data
$name = $_POST['name'];
$subject = $_POST['subject'];
$details = $_POST['details'];
$user_id = strval($_SESSION['user_id']);


// Set the target directory for the uploaded images
$targetDir = "uploads/";
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'svg');
// Check if the form was submitted
if (isset($_POST['submit'])) {
    // Get the file names and extensions of the uploaded images
    $fileNames = array_filter($_FILES['images']['name']);

    // Check if there are any uploaded images
    if (!empty($fileNames)) {
        // Connect to the database
        include 'Connection.php';
        if (!$conn->connect_error) {
            // Loop through the uploaded images
            foreach ($_FILES['images']['name'] as $key => $val) {
                // Get the file name and path of the current image
                $fileName = basename($_FILES['images']['name'][$key]);
                $targetFilePath = $targetDir . $fileName;

                // Check if the file type is valid
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                if (in_array($fileType, $allowTypes)) {
                    // Upload the file to the server
                    if (move_uploaded_file($_FILES['images']['tmp_name'][$key], $targetFilePath)) {
                        // Insert the image file name and user ID into the linksarray table
                        // If this is the first image, insert the name, description, and other details into the usersworks table
                        if ($key == 0) {
                            // Insert the row into the usersworks table
                            $query = "INSERT INTO usersworks (name, subject, description, user_id,created_at,link) VALUES ('$name', '$subject', '$details', '$user_id',Now(),'$targetFilePath')ON DUPLICATE KEY UPDATE name = '$name', subject = '$subject', description = '$details'";
                            mysqli_query($conn, $query);

                            // Get the ID of the inserted row
                            $SELECT = "SELECT id FROM usersworks WHERE user_id = '$user_id' AND name = '$name'";
                            $result = $conn->query($SELECT);
                            $row = $result->fetch_assoc();
                            $USER_id = $row['id'];
                        }
                        $query = "INSERT INTO linksarray (id,link, USER_id) VALUES ('$USER_id','$targetFilePath', '$user_id')";
                        mysqli_query($conn, $query);


                    } else {
                        // Display an error message if the file couldn't be uploaded
                        echo "<script>alert('Error uploading file: " . $_FILES['images']['name'][$key] . "')</script>";
                    }
                } else {
                    // Display an error message if the file type is not allowed
                    echo "<script>alert('Error: Invalid file type for file " . $_FILES['images']['name'][$key] . "')</script>";
                }
            }
            $conn->close();
            header('Location: ../dashboard.php');
        } else {
            // Display an error message if there was a problem connecting to the database
            echo "<script>alert('Error connecting to the database')</script>";
        }
    } else {
        // Display an error message if there are no uploaded images
        echo "<script>alert('Error: No files selected')</script>";
    }
}
?>