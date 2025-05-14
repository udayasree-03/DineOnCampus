<?php
// Check if 'category' parameter is set and not empty
if (isset($_GET['category']) && !empty($_GET['category'])) {
    $category = $_GET['category'];

    // Depending on the category, include the corresponding PHP file
    switch ($category) {
        case 'beverages':
            include 'beverages.php'; 
            break;
        case 'tiffins':
            include 'tiffins.php'; 
            break;
        case 'meals':
            include 'meals.php'; 
            break;
        case 'fastfood':
            include 'fastfood.php'; 
            break;
        case 'icecreams':
            include 'icecreams.php'; 
            break;
        default:
            echo '<p>Invalid category selection.</p>';
    }
} else {
    echo '<p>No category selected.</p>';
}
?>
