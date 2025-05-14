<?php
// admin_signup_process.php
include 'db.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $full_name = $_POST['full_name'];
    $password = $_POST['password']; // Note: Password is stored as plain text
    
    // Insert admin user into database
    $sql = "INSERT INTO admin_users (username, email, full_name, password) VALUES ('$username', '$email', '$full_name', '$password')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Admin user created successfully.";
        // Redirect to admin login page or any other page as needed
        header("Location: admin_login.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
