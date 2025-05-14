<!-- admin_signup.php -->
<html>
<head>
    <title>Admin Signup</title>
</head>
<body>
    <h2>Admin Signup</h2>
    <form method="post" action="admin_signup_process.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
