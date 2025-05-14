<?php
// meals.php - Server-side logic to handle adding items to the cart
session_start();

function addToCart($itemId, $itemName, $itemPrice, $itemQuantity) {
    // Initialize cart if not already set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if item already exists in cart
    $itemIndex = array_search($itemId, array_column($_SESSION['cart'], 'id'));
    if ($itemIndex !== false) {
        // If item exists, increase quantity
        $_SESSION['cart'][$itemIndex]['quantity'] += $itemQuantity;
    } else {
        // If item does not exist, add it to cart
        $_SESSION['cart'][] = [
            'id' => $itemId,
            'name' => $itemName,
            'price' => $itemPrice,
            'quantity' => $itemQuantity
        ];
    }
}

// Check if data is sent via POST method
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure the necessary fields are present in the POST data
    if (isset($_POST['itemId'], $_POST['itemName'], $_POST['itemPrice'], $_POST['itemQuantity'])) {
        // Sanitize and validate input (if necessary)
        $itemId = intval($_POST['itemId']);
        $itemName = $_POST['itemName'];
        $itemPrice = floatval($_POST['itemPrice']);
        $itemQuantity = intval($_POST['itemQuantity']);

        // Call addToCart function to add item to cart
        addToCart($itemId, $itemName, $itemPrice, $itemQuantity);

        // Respond with success message or redirect as needed
        echo json_encode(['status' => 'success', 'message' => 'Item added to cart.']);
        exit;
    } else {
        // Respond with error message if required fields are missing
        echo json_encode(['status' => 'error', 'message' => 'Missing required parameters.']);
        exit;
    }
} else {
    // Respond with error if request method is not POST
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
    exit;
}
?>
