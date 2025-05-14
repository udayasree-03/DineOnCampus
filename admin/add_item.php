<?php
// add_item.php
session_start();
include 'db.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_description = $_POST['item_description'];

    // Prepare SQL statement to insert item into database
    $sql = "INSERT INTO items (item_name, item_price, item_description) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $item_name, $item_price, $item_description);

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Item added successfully.";
        // Redirect or show success message as needed
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
