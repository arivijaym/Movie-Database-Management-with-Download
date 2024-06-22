<?php
// Database connection parameters
$servername = "localhost"; // Change this if your database server is not running locally
$username = "root"; // Your database username
$password = ""; // Your database password
$dbname = "film_gentleman"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optionally, set the character set to UTF-8 for proper encoding
$conn->set_charset("utf8");

// Now you can use the $conn object for executing SQL queries and interacting with your database
?>
