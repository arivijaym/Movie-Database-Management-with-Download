<?php
// Include your database connection file here
include 'db_connection.php';

// Process form submission for series details
if (isset($_POST['submit_series'])) {
    // Handle series poster upload
    $seriesPoster_sd = $_FILES['seriesPoster']['name'];
    $posterTempName_sd = $_FILES['seriesPoster']['tmp_name'];

    // Move uploaded poster file to destination
    move_uploaded_file($posterTempName_sd, "uploads/$seriesPoster_sd");

    // Handle other form fields
    $title_sd = $_POST['seriesTitle'];
    $year_sd = $_POST['seriesYear'];
    $season_sd = $_POST['seriesSeason'];
    $episodes_sd = $_POST['seriesEpisodes'];
    $audio_sd = $_POST['seriesAudio'];
    $subtitles_sd = $_POST['seriesSubtitles'];
    $genre_sd = $_POST['seriesGenre'];
    $rating_sd = $_POST['seriesRating'];
    $quality_sd = $_POST['seriesQuality'];
    $runtime_sd = $_POST['seriesRuntime'];
    $starring_sd = $_POST['seriesStarring'];
    $director_sd = $_POST['seriesDirector'];
    $producer_sd = $_POST['seriesProducer'];
    $ott_sd = $_POST['seriesOTT'];
    $plot_summary_sd = $_POST['seriesPlot'];
    $trailer_link_sd = $_POST['seriesTrailer'];

    // Handle series media(1), media(2), media(3), and media(4) uploads
    $media1_sd = $_FILES['seriesMedia1']['name'];
    $media1TempName_sd = $_FILES['seriesMedia1']['tmp_name'];

    move_uploaded_file($media1TempName_sd, "uploads/$media1_sd");

    $media2_sd = $_FILES['seriesMedia2']['name'];
    $media2TempName_sd = $_FILES['seriesMedia2']['tmp_name'];

    move_uploaded_file($media2TempName_sd, "uploads/$media2_sd");

    $media3_sd = $_FILES['seriesMedia3']['name'];
    $media3TempName_sd = $_FILES['seriesMedia3']['tmp_name'];

    move_uploaded_file($media3TempName_sd, "uploads/$media3_sd");

    $media4_sd = $_FILES['seriesMedia4']['name'];
    $media4TempName_sd = $_FILES['seriesMedia4']['tmp_name'];

    move_uploaded_file($media4TempName_sd, "uploads/$media4_sd");

    // Insert series details into the database
    $sql = "INSERT INTO series_details (poster, title, year, season, episodes, audio, subtitles, genre, rating, quality, runtime, starring, director, producer, ott, plot_summary, trailer_link, media_1, media_2, media_3, media_4) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssssssssssssssss", $seriesPoster_sd, $title_sd, $year_sd, $season_sd, $episodes_sd, $audio_sd, $subtitles_sd, $genre_sd, $rating_sd, $quality_sd, $runtime_sd, $starring_sd, $director_sd, $producer_sd, $ott_sd, $plot_summary_sd, $trailer_link_sd, $media1_sd, $media2_sd, $media3_sd, $media4_sd);
    
    if ($stmt->execute()) {
        // Series details inserted successfully
        echo "Series details inserted successfully.";
    } else {
        // Error inserting series details
        echo "Error inserting series details: " . $stmt->error;
    }
}

// Close database connection
$conn->close();
?>
