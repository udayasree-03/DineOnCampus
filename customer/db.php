<?php
$servername = "localhost"; // Typically localhost for local development
$username = "root"; // The MySQL username, usually "root" for XAMPP
$password = ""; // The MySQL password, usually empty for XAMPP
$dbname = "dineoncampus"; // The name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
