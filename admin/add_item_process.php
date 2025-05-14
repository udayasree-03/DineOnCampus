<?php
// add_item_process.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_quantity = $_POST['item_quantity'];

    // Insert new item into the database
    $sql = "INSERT INTO items (name, price, quantity) VALUES ('$item_name', $item_price, $item_quantity)";

    if ($conn->query($sql) === TRUE) {
        echo "New item added successfully.";
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
