<?php
// Start session and include database connection
session_start();
include 'db.php'; // Ensure this file connects to your database

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: admin_login.php"); // Redirect to login page if not logged in
    exit;
}

// Fetch items for each category from the database
$categories = ['beverages', 'tiffins', 'meals', 'fastfood', 'icecreams'];
$items = [];

foreach ($categories as $category) {
    $sql = "SELECT id, name, price FROM $category";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[$category][] = $row;
        }
    }
}

// Handle delete item operation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item'])) {
    $itemId = $_POST['item_id'];
    $category = $_POST['category'];

    // Perform delete operation
    $deleteSql = "DELETE FROM $category WHERE id = $itemId";
    if ($conn->query($deleteSql) === TRUE) {
        $success_message = "Item deleted successfully.";
    } else {
        $error_message = "Error deleting item: " . $conn->error;
    }
}

// Handle add item operation
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_item'])) {
    $category = $_POST['category'];
    $itemName = $_POST['item_name'];
    $price = $_POST['price'];

    // Perform add operation (example)
    $insertSql = "INSERT INTO $category (name, price) VALUES ('$itemName', '$price')";
    if ($conn->query($insertSql) === TRUE) {
        $success_message = "Item added successfully.";
    } else {
        $error_message = "Error adding item: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Items</title>
    <link rel="stylesheet" href="admin.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
    font-family: 'Roboto', sans-serif;
    background: url('bag.avif') no-repeat center center fixed;
    background-size: cover;
   
    justify-content: center;
    align-items: center;
    height: 100vh;
}
        .dashboard-container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .dashboard-container h2 {
            color: #333;
            text-align: center;
        }
        .category-section {
            margin-bottom: 30px;
        }
        .category-section h3 {
            color: #007bff;
            margin-bottom: 10px;
        }
        .item-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .item-table th, .item-table td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        .item-table th {
            background-color: #007bff;
            color: #fff;
        }
        .item-table tr:hover {
            background-color: #f5f5f5;
        }
        .delete-btn {
            background-color: #dc3545;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        .message {
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }
        .error-message {
            background-color: #f8d7da;
            border-color: #f5c6cb;
            color: #721c24;
        }
        .success-message {
            background-color: #d4edda;
            border-color: #c3e6cb;
            color: #155724;
        }
        .add-item-form {
            margin-top: 20px;
        }
        .add-item-form label {
            display: block;
            margin-bottom: 5px;
        }
        .add-item-form input[type="text"], .add-item-form input[type="number"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .add-item-form button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
        }
        .add-item-form button:hover {
            background-color: #218838;
        }
        .back-link {
            margin-top: 20px;
            text-align: center;
        }
        .back-link a {
            color: #007bff;
            text-decoration: none;
        }
        .back-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Manage Items</h2>

        <!-- Messages -->
        <?php if (isset($error_message)) : ?>
            <div class="message error-message">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($success_message)) : ?>
            <div class="message success-message">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>

        <!-- Category Sections -->
        <?php foreach ($categories as $category) : ?>
            <div class="category-section">
                <h3><?php echo ucfirst($category); ?></h3>
                
                <!-- Items Table -->
                <table class="item-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Item ID</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($items[$category])) : ?>
                            <?php foreach ($items[$category] as $item) : ?>
                                <tr>
                                    <td><?php echo $item['name']; ?></td>
                                    <td><?php echo $item['price']; ?></td>
                                    <td><?php echo $item['id']; ?></td>
                                    <td>
                                        <form method="post" action="">
                                            <input type="hidden" name="item_id" value="<?php echo $item['id']; ?>">
                                            <input type="hidden" name="category" value="<?php echo $category; ?>">
                                            <button type="submit" name="delete_item" class="delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>

        <!-- Add Item Form -->
        <div class="add-item-form">
            <h3>Add New Item</h3>
            <form method="post" action="">
                <div>
                    <label for="category">Category:</label>
                    <select id="category" name="category" required>
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?php echo $category; ?>"><?php echo ucfirst($category); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div>
                    <label for="item_name">Item Name:</label>
                    <input type="text" id="item_name" name="item_name" required>
                </div>
                <div>
                    <label for="price">Price:</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" required>
                </div>
                <button type="submit" name="add_item">Add Item</button>
            </form>
        </div>

        <!-- Back to Dashboard Link -->
        <div class="back-link">
            <a href="admin_dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
