<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$sql = "SELECT * FROM order_items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Orders</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="orders-container">
        <h1>Orders</h1>
        <table>
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>User ID</th>
                    <th>Item ID</th>
                    <th>Category</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Method</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['user_id']}</td>
                                <td>{$row['item_id']}</td>
                                <td>{$row['category']}</td>
                                <td>{$row['quantity']}</td>
                                <td>₹{$row['price']}</td>
                                <td>{$row['payment_method']}</td>
                                <td>{$row['order_date']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No orders found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <div class="back">
            <a href="admin_dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>

<?php
$conn->close();
?>
