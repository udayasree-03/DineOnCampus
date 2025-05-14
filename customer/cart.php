<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dineoncampus";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    $item = $data['item'];
    $quantity = $data['quantity'];

    // Check if item already in the session cart
    $found = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['item'] == $item) {
            $cartItem['quantity'] += $quantity;
            $found = true;
            break;
        }
    }
    if (!$found) {
        $_SESSION['cart'][] = ['item' => $item, 'quantity' => $quantity];
    }

    // Check if item already in the database cart
    $sql = "SELECT * FROM cart WHERE item = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $item);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Item exists, update quantity
        $sql = "UPDATE cart SET quantity = quantity + ? WHERE item = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("is", $quantity, $item);
    } else {
        // Item does not exist, insert new record
        $sql = "INSERT INTO cart (item, quantity) VALUES (?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $item, $quantity);
    }
    $stmt->execute();

    // Fetch all cart items from the database
    $sql = "SELECT item, quantity FROM cart";
    $result = $conn->query($sql);
    $cart = [];
    while ($row = $result->fetch_assoc()) {
        $cart[] = $row;
    }

    echo json_encode($cart);
} else {
    // Fetch all cart items from the database
    $sql = "SELECT item, quantity FROM cart";
    $result = $conn->query($sql);
    $cart = [];
    while ($row = $result->fetch_assoc()) {
        $cart[] = $row;
    }

    echo json_encode($cart);
}

$conn->close();
?>
