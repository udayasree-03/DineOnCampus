<?php
// Example function for adding admin
function addAdmin($username, $password, $name) {
    global $conn;

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert admin into database (Example: You may have an admin table)
    $query = "INSERT INTO admin_users (username, password, name) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sss', $username, $hashed_password, $name);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}
?>
