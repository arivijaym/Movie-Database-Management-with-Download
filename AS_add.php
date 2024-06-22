<?php
// Include your database connection file here
include 'db_connection.php';

// Process form submission for movie 1
if (isset($_POST['submit_movie'])) {
    // Handle movie poster upload for movie 1
    $seriesPoster = $_FILES['seriesPoster']['name'];
    $posterTempName = $_FILES['seriesPoster']['tmp_name'];

    // Move uploaded poster file to destination
    move_uploaded_file($posterTempName, "uploads/$seriesPoster");

    // Handle movie 1 form submission
    $seriesName = $_POST['seriesName'];
    $seriesYear = $_POST['seriesYear'];
    $seriesGenre = $_POST['seriesGenre'];
    $seriesSeason = $_POST['seriesSeason'];
    $seriesQuality = $_POST['seriesQuality'];
    $seriesRating = $_POST['seriesRating'];
    $releaseStatus = $_POST['releaseStatus'];
    $popularityStatus = $_POST['popularityStatus'];
    
    // Insert movies data into database
    $sql = "INSERT INTO series (poster, `name`, `year`, genre, season, quality, rating, release_status, popularity_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssss", $seriesPoster, $seriesName, $seriesYear, $seriesGenre, $seriesSeason, $seriesQuality, $seriesRating, $releaseStatus, $popularityStatus);
    if ($stmt->execute()) {
        // Movie added successfully
        echo "Series added successfully.";
    } else {
        // Error adding movie
        echo "Series adding movie: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
