<?php
// Example connection to database
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

// SQL query to fetch beverages
$sql = "SELECT id, name, description, price, image FROM beverages";
$result = $conn->query($sql);

// Output data of each row
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<div class="food-box">';
        echo '<img src="images/' . $row["image"] . '" alt="' . $row["name"] . '">';
        echo '<h2>' . $row["name"] . '</h2>';
        echo '<p>' . $row["description"] . '</p>';
        echo '<label for="' . $row["name"] . '-quantity">Quantity:</label>';
        echo '<input type="number" id="' . $row["name"] . '-quantity" name="' . $row["name"] . '-quantity" value="0" min="0">';
        echo '<button onclick="addToCart(' . $row["id"] . ', \'' . $row["name"] . '\', ' . $row["price"] . ')">Add to Cart</button>';
        echo '</div>';
    }
} else {
    echo "0 results";
}

$conn->close();
?>
