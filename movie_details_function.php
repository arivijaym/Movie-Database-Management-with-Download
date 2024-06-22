<?php
// Include your database connection file here
include 'db_connection.php';

// Process form submission for movie details
if (isset($_POST['submit_movie'])) {
    // Handle movie poster upload
    $moviePoster_md = $_FILES['moviePoster']['name'];
    $posterTempName_md = $_FILES['moviePoster']['tmp_name'];

    // Move uploaded poster file to destination
    move_uploaded_file($posterTempName_md, "uploads/$moviePoster_md");

    // Handle other form fields
    $title_md = $_POST['movieTitle'];
    $year_md = $_POST['movieYear'];
    $audio_md = $_POST['movieAudio'];
    $subtitles_md = $_POST['movieSubtitles'];
    $genre_md = $_POST['movieGenre'];
    $quality_md = $_POST['movieQuality'];
    $rating_md = $_POST['movieRating'];
    $runtime_md = $_POST['movieRuntime'];
    $starring_md = $_POST['movieStarring'];
    $director_md = $_POST['movieDirector'];
    $producer_md = $_POST['movieProducer'];
    $ott_md = $_POST['movieOTT'];
    $plot_summary_md = $_POST['moviePlot'];
    $trailer_link_md = $_POST['movieTrailer'];

    // Handle movie(1), movie(2), movie(3), and movie(4) uploads
    $media1_md = $_FILES['media1']['name'];
    $media1TempName_md = $_FILES['media1']['tmp_name'];

    move_uploaded_file($media1TempName_md, "uploads/$media1_md");

    $media2_md = $_FILES['media2']['name'];
    $media2TempName_md = $_FILES['media2']['tmp_name'];

    move_uploaded_file($media2TempName_md, "uploads/$media2_md");

    $media3_md = $_FILES['media3']['name'];
    $media3TempName_md = $_FILES['media3']['tmp_name'];

    move_uploaded_file($media3TempName_md, "uploads/$media3_md");

    $media4_md = $_FILES['media4']['name'];
    $media4TempName_md = $_FILES['media4']['tmp_name'];

    move_uploaded_file($media4TempName_md, "uploads/$media4_md");

    // Insert movie details into the database
    $sql = "INSERT INTO movie_details (poster, title, year, audio, subtitles, genre, quality, rating, runtime, starring, director, producer, ott, plot_summary, trailer_link, media_1, media_2, media_3, media_4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssss", $moviePoster_md, $title_md, $year_md, $audio_md, $subtitles_md, $genre_md, $quality_md, $rating_md, $runtime_md, $starring_md, $director_md, $producer_md, $ott_md, $plot_summary_md, $trailer_link_md, $media1_md, $media2_md, $media3_md, $media4_md);
    
    if ($stmt->execute()) {
        // Movie details inserted successfully
        echo "Movie details inserted successfully.";
    } else {
        // Error inserting movie details
        echo "Error inserting movie details: " . $stmt->error;
    }
}

// Close database connection
$conn->close();
?>
