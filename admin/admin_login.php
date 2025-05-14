<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session and include database connection
session_start();
include 'db.php';

// Check if admin is already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in']) {
    header("Location: admin_dashboard.php"); // Redirect to dashboard if logged in
    exit;
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate admin credentials
    $sql = "SELECT * FROM admin_users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Password verification passed, set session variables
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $row['username'];
            $_SESSION['admin_name'] = $row['full_name']; // Assuming 'full_name' column exists

            header("Location: admin_dashboard.php"); // Redirect to admin dashboard
            exit;
        } else {
            $error = "Invalid username or password. Password mismatch.";
            error_log("Password mismatch for user: $username");
        }
    } else {
        $error = "Invalid username or password. User not found.";
        error_log("User not found: $username");
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background: url('bag.avif') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 400px;
            text-align: center;
        }

        .home-link {
            text-decoration: none;
            font-size: 24px;
            color: #333;
            position: absolute;
            top: 10px;
            left: 10px;
        }

        .logo img {
            width: 100px;
            height: auto;
            margin-bottom: 20px;
        }

        h2 {
            margin: 0 0 10px 0;
            color: #333;
        }

        p {
            color: #666;
            margin-bottom: 20px;
        }

        .input-group {
            margin-bottom: 15px;
            text-align: left;
        }

        .input-group label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        .input-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .error-message {
            color: #f44336;
            margin-top: 10px;
        }

        footer {
            text-align: center;
            margin-top: 20px;
        }

        footer p {
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    
    <div class="login-container">
        <div class="login-form">
            <div class="logo">
                <img src="logo.jpg" alt="Company Logo">
            </div>
            <h2>Welcome!!!</h2>
            <p>Please login to your account</p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <?php if (isset($error)) echo "<p class='error-message'>$error</p>"; ?>
        </div>
        <footer>
            <p>&copy; 2024 Dine On Campus All Rights Reserved.</p>
        </footer>
    </div>
</body>
</html>
