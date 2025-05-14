<?php
session_start();
include 'db.php'; // Include database connection script

// Assuming item details are received via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id']; // Assuming user ID is set in session
    $item_id = $_POST['item_id'];
    $quantity = $_POST['quantity'];

    // Example query to insert into cart table
    $sql = "INSERT INTO cart (user_id, item_id, quantity) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $user_id, $item_id, $quantity);

    if ($stmt->execute()) {
        // Insert successful
        echo json_encode(array("success" => true));
    } else {
        // Insert failed
        echo json_encode(array("success" => false, "message" => "Failed to add item to cart."));
    }

    $stmt->close();
    $conn->close();
}
?>
