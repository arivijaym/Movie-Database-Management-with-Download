<?php
// Include your database connection file here
include 'db_connection.php';

// Process form submission for movie 1
if (isset($_POST['submit_movie1'])) {
    // Handle movie poster upload for movie 1
    $moviePoster1 = $_FILES['hbmoviePoster1']['name'];
    $posterTempName1 = $_FILES['hbmoviePoster1']['tmp_name'];

    // Move uploaded poster file to destination
    move_uploaded_file($posterTempName1, "uploads/$moviePoster1");

    // Handle movie 1 form submission
    $hbmovieName1 = $_POST['hbmovieName1'];
    $hbyear1 = $_POST['hbyear1'];
    $hbgenre1 = $_POST['hbgenre1'];
    $hbquality1 = $_POST['hbquality1'];
    $hbrating1 = $_POST['hbrating1'];
    
    // Insert movie 1 data into database
    $sql = "INSERT INTO hmovies (poster, `name`, `year`, genre, quality, rating) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $moviePoster1, $hbmovieName1, $hbyear1, $hbgenre1, $hbquality1, $hbrating1);
    if ($stmt->execute()) {
        // Movie 1 added successfully
        echo "Movie 1 added successfully.";
    } else {
        // Error adding movie 1
        echo "Error adding movie 1: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
