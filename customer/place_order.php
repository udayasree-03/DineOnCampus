<?php
session_start();
require_once 'db.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $cart = $data['cart'];
    $paymentMethod = $data['paymentMethod'];

    if (empty($cart) || empty($paymentMethod)) {
        echo json_encode(['success' => false, 'message' => 'Invalid input']);
        exit;
    }

    $userId = $_SESSION['user_id']; // Assuming the user_id is stored in the session

    $conn->begin_transaction();

    try {
        // Generate unique order_id
        $orderId = uniqid('order_', true);

        // Insert into order_items table
        $orderItemsStmt = $conn->prepare("INSERT INTO order_items (user_id, item_id, quantity, price, payment_method, order_date) VALUES (?, ?, ?, ?, ?, NOW())");

        foreach ($cart as $item) {
            $orderItemsStmt->bind_param('iiids', $userId, $item['id'], $item['quantity'], $item['price'], $paymentMethod);
            $orderItemsStmt->execute();
        }

        // Insert into orders table
        $ordersStmt = $conn->prepare("INSERT INTO orders (order_id, item_name, quantity, price, payment_method, order_date) VALUES (?, ?, ?, ?, ?, NOW())");

        foreach ($cart as $item) {
            $itemName = $item['name'];
            $quantity = $item['quantity'];
            $price = $item['price'];

            $ordersStmt->bind_param('ssids', $orderId, $itemName, $quantity, $price, $paymentMethod);
            $ordersStmt->execute();
        }

        $conn->commit();
        echo json_encode(['success' => true, 'orderId' => $orderId]);

    } catch (Exception $e) {
        $conn->rollback();
        echo json_encode(['success' => false, 'message' => $e->getMessage()]);
    }

    $orderItemsStmt->close();
    $ordersStmt->close();
    $conn->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>
