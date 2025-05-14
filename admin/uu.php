<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Database connection successful.<br>";
}

$username = 'admin';
$password = 'admin123';
$full_name = 'Admin User';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO admin_users (username, password, full_name) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Prepare failed: " . $conn->error);
} else {
    echo "Statement prepared successfully.<br>";
}

$stmt->bind_param('sss', $username, $hashed_password, $full_name);

if ($stmt->execute()) {
    echo "Admin user created successfully.";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
