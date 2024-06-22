<?php
include 'db_connection';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $movieId = $_POST['id'];
    $field = $_POST['field'];
    $value = $_POST['value'];

    // Update movie details in the database
    $sql = "UPDATE hmovies SET $field = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $value, $movieId);
    if ($stmt->execute()) {
        echo "Movie details updated successfully.";
    } else {
        echo "Error updating movie details: " . $conn->error;
    }
    $stmt->close();
} else {
    echo "Invalid request method.";
}
?>
