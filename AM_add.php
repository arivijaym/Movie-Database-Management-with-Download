<?php
// Include your database connection file here
include 'db_connection.php';

// Process form submission for movie 1
if (isset($_POST['submit_movie'])) {
    // Handle movie poster upload for movie 1
    $moviePoster = $_FILES['moviePoster']['name'];
    $posterTempName = $_FILES['moviePoster']['tmp_name'];

    // Move uploaded poster file to destination
    move_uploaded_file($posterTempName, "uploads/$moviePoster");

    // Handle movie 1 form submission
    $movieName = $_POST['movieName'];
    $movieYear = $_POST['movieYear'];
    $movieGenre = $_POST['movieGenre'];
    $movieQuality = $_POST['movieQuality'];
    $movieRating = $_POST['movieRating'];
    $releaseStatus = $_POST['releaseStatus'];
    $popularityStatus = $_POST['popularityStatus'];
    
    // Insert movies data into database
    $sql = "INSERT INTO movies (poster, `name`, `year`, genre, quality, rating, release_status, popularity_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $moviePoster, $movieName, $movieYear, $movieGenre, $movieQuality, $movieRating, $releaseStatus, $popularityStatus);
    if ($stmt->execute()) {
        // Movie added successfully
        echo "Movie added successfully.";
    } else {
        // Error adding movie
        echo "Error adding movie: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
