<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "film_gentleman";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch image file path from the database
    $sql = "SELECT poster FROM upcomings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($poster);
    $stmt->fetch();
    $stmt->close();

    // Delete the image file from the uploads folder
    $imagePath = "uploads/" . $poster;
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete the movie row from the database
    $sql = "DELETE FROM upcomings WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo true; 
    } else {
        echo false; 
    }

    $stmt->close();
    $conn->close();
} else {
    echo false; 
}
?>
