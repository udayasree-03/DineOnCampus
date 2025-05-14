<?php
include 'db.php'; // Include your database connection script

// Start session if not already started
session_start();

// Adjust as per your session handling
if (!isset($_SESSION['user_id'])) {
    http_response_code(403);
    echo json_encode(array("success" => false, "message" => "Unauthorized access."));
    exit;
}

$user_id = $_SESSION['user_id'];

// Fetch cart items from the database
$sql = "SELECT c.id, c.item_id, i.name, c.quantity, i.price FROM cart c
        INNER JOIN items i ON c.item_id = i.id
        WHERE c.user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $cart_items = array();
    while ($row = $result->fetch_assoc()) {
        $cart_items[] = $row;
    }
    echo json_encode(array("success" => true, "cartItems" => $cart_items));
} else {
    echo json_encode(array("success" => true, "cartItems" => array())); // Return empty array if no items found
}

$stmt->close();
$conn->close();
?>
