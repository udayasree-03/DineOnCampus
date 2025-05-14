// food.js
function loadCategory(categoryPage) {
    fetch(categoryPage)
        .then(response => response.text())
        .then(data => {
            document.getElementById('food-content').innerHTML = data;
        });
}

function addToCart(item, quantity) {
    fetch('cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ item, quantity }),
    })
    .then(response => response.json())
    .then(data => {
        updateCart(data);
    });
}

function updateCart(cart) {
    const cartItems = document.getElementById('cart-items');
    cartItems.innerHTML = '';
    cart.forEach(cartItem => {
        const div = document.createElement('div');
        div.textContent = `${cartItem.item}: ${cartItem.quantity}`;
        cartItems.appendChild(div);
    });
}
