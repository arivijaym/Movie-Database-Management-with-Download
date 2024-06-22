<?php
// Fetch movies from the database and display in table format
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_gentleman";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch movies
$sql = "SELECT * FROM series";
$result = $conn->query($sql);

// Check if there are movies
if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='uploads/" . $row['poster'] . "' alt='" . $row['name'] . "' style='max-width: 100px;'></td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['year'] . "</td>";
        echo "<td>" . $row['genre'] . "</td>";
        echo "<td>" . $row['season'] . "</td>";
        echo "<td>" . $row['quality'] . "</td>";
        echo "<td>" . $row['rating'] . "</td>";
        echo "<td>" . $row['release_status'] . "</td>";
        echo "<td>" . $row['popularity_status'] . "</td>";
        echo "<td>";
        echo "<a class='btn btn-primary editMovie' data-id='" . $row['id'] . "' data-toggle='modal' data-target='#editMovieModal'><i class='fa-solid fa-pen-to-square'></i></a>";
        echo "<a class='btn btn-danger deleteMovie ml-2' data-id='" . $row['id'] . "'><i class='fa-solid fa-trash'></i></a>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='9'>No movies found</td></tr>";
}

// Close connection
$conn->close();
?>

