<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="icecreams.css">
    <title>ICE CREAMS</title>
    <style>
        .cart-link i {
            font-size: 35px; /* Adjust the size as needed */
        }
        nav ul {
            display: flex;
            list-style: none;
            padding: 0;
        }
        nav ul li {
            margin-right: 20px;
        }
        nav ul li a {
            text-decoration: none;
            color: rgb(238, 228, 228); /* Change to your preferred color */
        }
    </style>
</head>
<body>
    <header>
        <div>
            <a href="javascript:history.back()" class="back-arrow">
                <i>&#8592;</i> Back
            </a>
        </div>
        <h1><i>ICE CREAMS</i></h1>
        <a href="cart.php" class="cart-link">
            <i>&#128722;</i>
            <span id="cart-count" class="cart-count"></span>
        </a>
        <div class="container header-container">
            <nav>
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="signup.php">Signup</a></li>
                    <li><a href="contact.php">Contact</a></li>
                    <li><a href="about.php">About Us</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <h3>Select the items you want to order from the below list</h3>
        <section class="food-container">
            <div class="food-box">
                <img src="Vanilla-Royale.jpg" alt="Vanilla cup Icecream">
                <h2>Vanilla cup Icecream</h2>
                <p>ID: 5 <br>
                    <b>RS 10/-</b></p>
                <label for="vanilla-cup-icecream-quantity">Quantity:</label>
                <select id="vanilla-cup-icecream-quantity" name="Vanilla cup Icecream">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(104, 224, 104);" onclick="addToCart(5, 'Vanilla cup Icecream', 10)">Add to Cart</button>
            </div>
            <div class="food-box">
                <img src="chocolate.jpg" alt="Chocolate cone Icecream">
                <h2>Chocolate cone Icecream</h2>
                <p>ID: 6<br>
                    <b>RS 25/-</b></p>
                <label for="chocolate-cone-icecream-quantity">Quantity:</label>
                <select id="chocolate-cone-icecream-quantity" name="Chocolate cone Icecream">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(104, 224, 104);" onclick="addToCart(6, 'Chocolate cone Icecream', 25)">Add to Cart</button>
            </div>
            <div class="food-box">
                <img src="magnum.jpg" alt="Magnum">
                <h2>Magnum</h2>
                <p> ID: 7 <br>
                    <b>RS 70/-</b></p>
                <label for="magnum-quantity">Quantity:</label>
                <select id="magnum-quantity" name="Magnum-quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(104, 224, 104);" onclick="addToCart(7, 'Magnum', 70)">Add to Cart</button>
            </div>
            <div class="food-box">
                <img src="Strawberry cone_0.jpg" alt="Strawberry cone icecream">
                <h2>Strawberry cone icecream</h2>
                <p>ID: 8 <br>
                    <b>RS 25/-</b></p>
                <label for="strawberry-cone-icecream-quantity">Quantity:</label>
                <select id="strawberry-cone-icecream-quantity" name="Strawberry cone icecream-quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(104, 224, 104);" onclick="addToCart(8, 'Strawberry cone icecream', 25)">Add to Cart</button>
            </div>
            <div class="food-box">
                <img src="blackforest.jpeg" alt="Blackforest Icecream">
                <h2>Blackforest Icecream</h2>
                <p>ID: 9<br>
                    <b>RS 45/-</b></p>
                <label for="blackforest-icecream-quantity">Quantity:</label>
                <select id="blackforest-icecream-quantity" name="Blackforest Icecream-quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(104, 224, 104);" onclick="addToCart(9, 'Blackforest Icecream', 45)">Add to Cart</button>
            </div>
        </section>
    </main>
    <script>
        function addToCart(itemId, itemName, itemPrice) {
            const quantity = document.querySelector(`#${itemName.toLowerCase().replace(/\s+/g, '-')}-quantity`).value;
            if (quantity === "0") {
                alert("Please select a quantity greater than 0.");
                return;
            }

            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const itemIndex = cart.findIndex(item => item.id === itemId);

            if (itemIndex === -1) {
                cart.push({ id: itemId, name: itemName, price: itemPrice, quantity: parseInt(quantity) });
            } else {
                cart[itemIndex].quantity += parseInt(quantity);
            }

            localStorage.setItem('cart', JSON.stringify(cart));
            alert(`${quantity} ${itemName}(s) added to cart.`);
            displayCart();
            updateCartCount();
        }

        function displayCart() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartDiv = document.getElementById('cart');
            cartDiv.innerHTML = '';

            if (cart.length === 0) {
                cartDiv.innerHTML = '<p>Your cart is empty.</p>';
                return;
            }

            cart.forEach(item => {
                const itemDiv = document.createElement('div');
                itemDiv.className = 'cart-item';
                itemDiv.innerHTML = `
                    <p>ID: ${item.id}<br>${item.name} - ${item.quantity} x Rs ${item.price} = Rs ${item.quantity * item.price}</p>
                    <button onclick="removeFromCart(${item.id})">Remove</button>
                `;
                cartDiv.appendChild(itemDiv);
            });

            const total = cart.reduce((acc, item) => acc + item.quantity * item.price, 0);
            const totalDiv = document.createElement('div');
            totalDiv.className = 'cart-total';
            totalDiv.innerHTML = `<p>Total: Rs ${total}</p>`;
            cartDiv.appendChild(totalDiv);
        }

        function removeFromCart(itemId) {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            cart = cart.filter(item => item.id !== itemId);
            localStorage.setItem('cart', JSON.stringify(cart));
            displayCart();
            updateCartCount();
        }

        function submitOrder() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            if (cart.length === 0) {
                alert("Your cart is empty. Please add items to your cart before submitting your order.");
                return;
            }

            alert("Order submitted successfully!");

            // Clear the cart after order submission
            localStorage.removeItem('cart');
            displayCart();
            updateCartCount();
        }

        function updateCartCount() {
            const cart = JSON.parse(localStorage.getItem('cart')) || [];
            const cartCount = cart.reduce((acc, item) => acc + item.quantity, 0);
            document.getElementById('cart-count').textContent = cartCount;
        }

        document.addEventListener('DOMContentLoaded', () => {
            displayCart();
            updateCartCount();
        });
    </script>
</body>
</html>
