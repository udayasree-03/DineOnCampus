<?php
// admin_login_process.php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        // Query to retrieve admin user based on username
        $sql = "SELECT id, username, password FROM admin_users WHERE username = '$username'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();

            // Compare passwords (assuming passwords are stored securely in your database)
            if ($password === $row['password']) {
                // Passwords match, set session variables
                $_SESSION['admin_id'] = $row['id'];
                $_SESSION['admin_username'] = $row['username'];

                // Redirect to admin dashboard or other secure page
                header("Location: admin_dashboard.php");
                exit;
            } else {
                // Incorrect password
                echo "Incorrect password.";
            }
        } else {
            // No user found with the provided username
            echo "User not found.";
        }
    } else {
        // Username or password not provided
        echo "Please provide both username and password.";
    }
}
?>
