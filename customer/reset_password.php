<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $new_password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Verify the token
    $sql = "SELECT user_id FROM password_resets WHERE token = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($user_id);
        $stmt->fetch();

        // Update the user's password
        $sql_update = "UPDATE users SET password = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("si", $new_password, $user_id);

        if ($stmt_update->execute()) {
            // Delete the token after successful reset
            $sql_delete = "DELETE FROM password_resets WHERE token = ?";
            $stmt_delete = $conn->prepare($sql_delete);
            $stmt_delete->bind_param("s", $token);
            $stmt_delete->execute();

            echo "Your password has been successfully reset.";
        } else {
            echo "Failed to reset the password.";
        }
    } else {
        echo "Invalid or expired token.";
    }

    $stmt->close();
}
?>
