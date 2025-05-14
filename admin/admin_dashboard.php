<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, Admin</h1>
        <div class="dashboard-menu">
            <ul>
                <li><a href="manage_users.php">Manage Users</a></li>
                <li><a href="manage_items.php">Manage Items</a></li>
                <li><a href="admin_view_orders.php">View Orders</a></li>
                <li><a href="analytics.php">Analytics</a></li>
            </ul>
        </div>
        <div class="logout">
            <a href="admin_logout.php">Logout</a>
        </div>
    </div>
</body>
</html>
