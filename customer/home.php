<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


session_start();

// Check if the user is logged in, if not then redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// Include database connection if necessary
// include 'db.php'; 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dine On Campus</title>
    <link rel="stylesheet" href="home page.css">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="container header-container">
            <div class="logo-container">
                <img src="logo.jpg" alt="Dine On Campus" class="logo">
                <p class="tagline">Dine On Campus</p>
            </div>
            <nav>
                <ul>
                    <li><a href="home page.html">Home</a></li> 
                    <li><a href="food.html">Canteen</a></li>
                    <li><a href="logout.html">Logout</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="hero" id="home">
        <div class="container">
            <h1 class="main-title">Dine On Campus</h1>
            <p>"Where Every Bite Just Feels Right"</p>
        </div>
    </section>

    <section class="about">
        <div class="container">
            <div class="content">
                <h2>About Us</h2>
                <p>Dine On Campus, where 'Every Bite Feels Just Right,' is more than just a canteen; it's a culinary journey crafted with care. Embracing core values of Quality, Hospitality, Community, Innovation, and Sustainability, we aim to offer a diverse menu filled with delightful biryanis, flavorful curries, fresh salads, and more. Join us for a dining experience that blends delicious dishes with a warm and welcoming atmosphere. Welcome to Dine On Campus!" 🍲🥗🥪</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Dine On Campus All Rights Reserved.</p>
        </div>
    </footer>
</body>
</html>
