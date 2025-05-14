<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fastfood.css">
    <title>FAST FOOD</title>
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
        <a href="javascript:history.back()" class="back-arrow">
            <i>&#8592;</i> Back
        </a>
        <h1><i>FAST FOOD</i></h1>
        <a href="cart.html" class="cart-link">
            <i>&#128722;</i>
            <!-- Removed the span element for cart count -->
        </a>
        <div class="container header-container">
            <nav>
                <ul>
                    <li><a href="home page.html">Home</a></li>
                    <li><a href="login.html">Login</a></li>
                    <li><a href="signup.html">Signup</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="about.html">About Us</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <h3>Select the items you want to order from the below list</h3>
        <section class="food-container">
            <div class="food-box">
                <img src="Veg-M.jpg" alt="Veg Manchuria">
                <h2>Veg Manchuria</h2>
                <p>ID: 1<br>
                Crispy and delicious veg manchuria made with fresh ingredients.<br>
                <b>RS 50/-</b></p>
                <label for="veg-manchuria-quantity">Quantity:</label>
                <select id="veg-manchuria-quantity" name="veg-manchuria-quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(104, 224, 104);" onclick="addToCart(1, 'Veg Manchuria', 50)">Add to Cart</button>
                <br>
            </div>
            <div class="food-box">
                <img src="paneer.jpg" alt="Paneer Manchuria">
                <h2>Paneer Manchuria</h2>
                <p>ID: 2<br>
                Delightful paneer manchuria with a tangy sauce.<br>
                <b>RS 70/-</b></p>
                <label for="paneer-manchuria-quantity">Quantity:</label>
                <select id="paneer-manchuria-quantity" name="paneer-manchuria-quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(85, 233, 85);" onclick="addToCart(2, 'Paneer Manchuria', 70)">Add to Cart</button>
                <br>
            </div>
            <div class="food-box">
                <img src="noodles.jpeg" alt="Veg Noodles">
                <h2>Veg Noodles</h2>
                <p>ID: 3<br>
                Stir-fried veg noodles with fresh vegetables and savory sauce.<br>
                <b>RS 60/-</b></p>
                <label for="veg-noodles-quantity">Quantity:</label>
                <select id="veg-noodles-quantity" name="veg-noodles-quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(93, 233, 93);" onclick="addToCart(3, 'Veg Noodles', 60)">Add to Cart</button>
                <br>
            </div>
            <div class="food-box">
                <img src="egg.jpg" alt="Egg Fried Rice">
                <h2>Egg Fried Rice</h2>
                <p>ID: 4<br>
                Classic egg fried rice with a mix of fresh vegetables and eggs.<br>
                <b>RS 70/-</b></p>
                <label for="egg-fried-rice-quantity">Quantity:</label>
                <select id="egg-fried-rice-quantity" name="egg-fried-rice-quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(109, 235, 109);" onclick="addToCart(4, 'Egg Fried Rice', 70)">Add to Cart</button>
                <br>
            </div>
            <div class="food-box">
                <img src="fried.jpg" alt="Veg Fried Rice">
                <h2>Veg Fried Rice</h2>
                <p>ID: 5<br>
                Delicious veg fried rice with a variety of fresh vegetables.<br>
                <b>RS 50/-</b></p>
                <label for="veg-fried-rice-quantity">Quantity:</label>
                <select id="veg-fried-rice-quantity" name="veg-fried-rice-quantity">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                </select>
                <br><br>
                <button style="background-color: rgb(88, 202, 88);" onclick="addToCart(5, 'Veg Fried Rice', 50)">Add to Cart</button>
                <br>
            </div>
        </section>
        
        <section id="cart-section">
            <h3>Your Cart</h3>
            <div id="cart"></div>
            <button onclick="submitOrder()">Submit Order</button>
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
            document.querySelector('.cart-link i').textContent = cartCount;
        }

        document.addEventListener('DOMContentLoaded', () => {
            displayCart();
            updateCartCount();
        });
    </script>
</body>
</html>
