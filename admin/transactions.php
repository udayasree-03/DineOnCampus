<?php
// Start session and include database connection
session_start();
include 'db.php'; // Ensure this file connects to your database

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: admin_login.php"); // Redirect to login page if not logged in
    exit;
}

// Fetch transactions from the database
$sql = "SELECT * FROM transactions ORDER BY transaction_date DESC";
$result = $conn->query($sql);

$transactions = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $transactions[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Add any additional CSS styles for transaction page if needed */
    </style>
</head>
<body>
    <div class="dashboard-container">
        <h2>Transaction History</h2>

        <!-- Display Transactions -->
        <table class="transaction-table">
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>User ID</th>
                    <th>Item ID</th>
                    <th>Quantity</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $transaction) : ?>
                    <tr>
                        <td><?php echo $transaction['transaction_id']; ?></td>
                        <td><?php echo $transaction['user_id']; ?></td>
                        <td><?php echo $transaction['item_id']; ?></td>
                        <td><?php echo $transaction['quantity']; ?></td>
                        <td><?php echo $transaction['total_amount']; ?></td>
                        <td><?php echo $transaction['transaction_date']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <!-- Back to Dashboard Link -->
        <div class="back-link">
            <a href="admin_dashboard.php">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>
