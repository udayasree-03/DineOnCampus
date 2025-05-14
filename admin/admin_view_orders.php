<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dineoncampus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch orders
$sql = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - View Orders</title>
    <link rel="stylesheet" href="home page.css">
    <style>
        /* Add your existing CSS styles here */
        body {
            font-family: Arial, sans-serif;
            
            margin: 0;
            padding: 0;
            background: url('bag.avif') no-repeat center center fixed;
        }
        
        .orders-container {
            max-width: 1000px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .orders-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .orders-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .orders-table th, .orders-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .orders-table th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="orders-container">
        <h1>All Orders</h1>
        <table class="orders-table">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Payment Method</th>
                    <th>Order Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["order_id"] . "</td>";
                        echo "<td>" . $row["item_name"] . "</td>";
                        echo "<td>" . $row["quantity"] . "</td>";
                        echo "<td>₹ " . $row["price"] . "</td>";
                        echo "<td>" . $row["payment_method"] . "</td>";
                        echo "<td>" . $row["order_date"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No orders found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
