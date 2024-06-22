<?php
// Include your database connection file here
include 'db_connection.php';

// Process form submission for movie 1
if (isset($_POST['submit_movie'])) {
    // Handle movie poster upload for movie 1
    $upcomingPoster = $_FILES['upcomingPoster']['name'];
    $posterTempName = $_FILES['upcomingPoster']['tmp_name'];

    // Move uploaded poster file to destination
    move_uploaded_file($posterTempName, "uploads/$upcomingPoster");

    // Handle movie 1 form submission
    $upcomingName = $_POST['upcomingName'];
    $upcomingYear = $_POST['upcomingYear'];
    $upcomingGenre = $_POST['upcomingGenre'];
    
    // Insert movies data into database
    $sql = "INSERT INTO upcomings (poster, `name`, `year`, genre) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $upcomingPoster, $upcomingName, $upcomingYear, $upcomingGenre);
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
