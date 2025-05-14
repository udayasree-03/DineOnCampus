<?php
// process.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $item = $_POST['item'];
    $quantity = $_POST['quantity'];

    // Process the data (e.g., save to database, perform calculations, etc.)
    // For now, we'll just return a success message
    echo "You have ordered $quantity of $item.";
}
?>
