<?php
$con = mysqli_connect('localhost', 'root', '', 'film_gentleman');

$action = $_POST["action"];

if ($action == "Insert") {
    // Process movie poster upload
    $uploadDir = "uploads/";
    $moviePoster = $_FILES['moviePoster']['name'];
    $tempName = $_FILES['moviePoster']['tmp_name'];
    $targetFilePath = $uploadDir . $moviePoster;

    // Move uploaded file to destination
    if (move_uploaded_file($tempName, $targetFilePath)) {
        // Store other movie information in variables
        $movieName = $_POST['movieName'];
        $year = $_POST['year'];
        $genre = $_POST['genre'];
        $quality = $_POST['quality'];
        $rating = $_POST['rating'];

        // Prepare SQL statement
        $sql = "INSERT INTO hmovies (poster, `name`, `year`, genre, quality, rating) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssisss", $moviePoster, $movieName, $year, $genre, $quality, $rating);

         
    } else {
        echo false;
    }
} else if ($action == "DeleteMovie") {
    $id = $_POST["uid"];
    // Fetch image file path from the database
    $sql = "SELECT poster FROM hmovies WHERE id = ?";
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
    $sql = "DELETE FROM hmovies WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo true; 
    } else {
        echo false; 
    }
}// else if ($action == "Search") {
    // Search code here...
    // This section should handle the search functionality
    // You can perform a SQL query based on the search criteria and echo the results similarly to how you did in your example.
//} else if ($action === 'AdvancedSearch') {
    // Advanced search code here...
    // This section should handle the advanced search functionality
    // You can perform a SQL query based on the form fields and echo the results similarly to how you did in your example.
//} 
else {
    // Fetch movies from the database and display in table format
    $sql = "SELECT * FROM hmovies";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td><img src='uploads/" . $row['poster'] . "' alt='" . $row['name'] . "' style='max-width: 100px;'></td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['year'] . "</td>";
            echo "<td>" . $row['genre'] . "</td>";
            echo "<td>" . $row['quality'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-primary editMovie' data-id='" . $row['id'] . "' data-toggle='modal' data-target='#editMovieModal'>Edit</button>";
            echo "<button class='btn btn-danger deleteMovie ml-2' data-id='" . $row['id'] . "'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No movies found</td></tr>";
    }
}
$con->close();
?>
