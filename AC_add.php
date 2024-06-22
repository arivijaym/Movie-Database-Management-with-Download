<?php
// Include your database connection file here
include 'db_connection.php';

// Process form submission for movie 1
if (isset($_POST['submit_movie'])) {
    // Handle movie poster upload for movie 1
    $CProfile = $_FILES['CProfile']['name'];
    $posterTempName = $_FILES['CProfile']['tmp_name'];

    // Move uploaded poster file to destination
    move_uploaded_file($posterTempName, "uploads/$CProfile");

    // Handle movie 1 form submission
    $CName = $_POST['CName'];
    $CRole = $_POST['CRole'];
    
    // Insert movies data into database
    $sql = "INSERT INTO celebrities (`profile`, `name`, `role`) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $CProfile, $CName, $CRole);
    if ($stmt->execute()) {
        // Movie added successfully
        echo "Added successfully.";
    } else {
        // Error adding movie
        echo "Adding movie: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
