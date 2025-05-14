<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}

$totalOrders = $conn->query("SELECT COUNT(*) as count FROM order_items")->fetch_assoc()['count'];
$totalRevenue = $conn->query("SELECT SUM(price * quantity) as revenue FROM order_items")->fetch_assoc()['revenue'];
$totalUsers = $conn->query("SELECT COUNT(*) as count FROM users")->fetch_assoc()['count'];

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analytics</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="analytics-container">
        <h1>Analytics</h1>
        <div class="analytics">
            <p>Total Orders: <?php echo $totalOrders; ?></p>
            <p>Total Revenue: ₹<?php echo number_format($totalRevenue, 2); ?></p>
            <p>Total Users: <?php echo $totalUsers; ?></p>
        </div>
        <div class="back">
            <a href="admin_dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
