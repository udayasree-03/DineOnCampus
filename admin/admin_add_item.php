<?php
// admin_add_item.php
session_start();
include 'db.php';

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    // Validate and sanitize inputs (implement as needed)

    // Insert item into database
    $sql = "INSERT INTO items (name, price, description, category_id) VALUES ('$name', '$price', '$description', $category_id)";
    if ($conn->query($sql) === TRUE) {
        echo "Item added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<html>
<head>
    <title>Add Item</title>
</head>
<body>
    <h2>Add Item</h2>
    <form method="post">
        Name: <input type="text" name="name" required><br><br>
        Price: <input type="text" name="price" required><br><br>
        Description: <textarea name="description"></textarea><br><br>
        Category ID: <input type="text" name="category_id" required><br><br>
        <input type="submit" value="Add Item">
    </form>
</body>
</html>
