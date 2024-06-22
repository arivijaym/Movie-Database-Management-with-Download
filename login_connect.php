<?php
session_start(); // Start session

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        $host = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "film_gentleman";

        // Create connection
        $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
        } else {
            $SELECT = "SELECT `password` FROM Admin_login WHERE username = ?";

            // Prepare statement to retrieve hashed password
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $stmt->bind_result($hashedPassword);
            $stmt->fetch();
            $stmt->close();

            if ($hashedPassword && password_verify($password, $hashedPassword)) {
                // Valid login credentials
                $_SESSION['username'] = $username; // Store username in session
                header("Location: main.php"); // Redirect to the next page
                exit;
            } else {
                // Invalid login credentials
                echo "Invalid username or password. Please try again.";
            }
        }

        $conn->close();
    } else {
        echo "Username and password are required";
    }
}
?>
