<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Include PHPMailer files
require 'C:\xampp\htdocs\Web\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\Web\PHPMailer\src\SMTP.php';
require 'C:\xampp\htdocs\Web\PHPMailer\src\Exception.php';

// Get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Establish a connection to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "film_gentleman"; // Replace with your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the SQL query
$stmt = $conn->prepare("INSERT INTO request_movie (`name`, email, `message`) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();

// Send email using PHPMailer
$mail = new PHPMailer(true);

// SMTP configuration
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com'; // Replace with your SMTP host
$mail->SMTPAuth = true;
$mail->Username = 'panicstorytime@gmail.com'; // Replace with your email address
$mail->Password = 'uiabqzquilhfidge'; // Replace with your email password
$mail->Port = 465; // Replace with your SMTP port
$mail->SMTPSecure = 'ssl'; // Replace with the appropriate encryption (tls or ssl)

// Sender and recipient settings
$mail->setFrom('panicstorytime@gmail.com', 'Film Gentleman'); // Replace with your email and name
$mail->addAddress($email, $name); // Send the email to the user

// Email content
$mail->isHTML(true);
$mail->Subject = 'Welcome to Film Gentleman';
$mail->Body = "Dear $name,<br><br>Thank you for Choosing Us. Our team will upload your rquested Movie or Series ASAP!.<br><br>Thank You,<br>Film Gentleman Team";

// Check if the email is sent successfully
if ($mail->send()) {
    // Email sent successfully
    // You can add any additional logic or success message here
} else {
    // Email sending failed
    // You can add any error handling or error message here
}

// Close the statement and database connection
$stmt->close();
$conn->close();

// Redirect the user to the contact.php page
header("Location: request_movie.php");
exit();
