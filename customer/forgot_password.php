<?php
// forgot_password.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<header>
    <a href="home.php" class="home-link">
        <i>&#8962;</i> Home
    </a>
</header>
<body>
    <div class="login-container">
        <div class="login-form">
            <h2>Reset Your Password</h2>
            <p>Please enter your email to receive a password reset link</p>
            <form action="process_forgot_password.php" method="POST">
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <button type="submit">Send Reset Link</button>
            </form>
        </div>
    </div>
</body>
</html>
