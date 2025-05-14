let cartItems = [];

function addItemToCart(itemId, itemName, itemPrice) {
    const existingItem = cartItems.find(item => item.id === itemId);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        const item = {
            id: itemId,
            name: itemName,
            price: itemPrice,
            quantity: 1
        };
        cartItems.push(item);
    }
    renderCart();
}

function renderCart() {
    const cartItemsContainer = document.getElementById('cart-items');
    cartItemsContainer.innerHTML = '';

    let totalPrice = 0;

    cartItems.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        totalPrice += itemTotal;

        const row = document.createElement('tr');

        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td><input type="number" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)"></td>
            <td>$${item.price.toFixed(2)}</td>
            <td>$${itemTotal.toFixed(2)}</td>
        `;

        cartItemsContainer.appendChild(row);
    });

    document.getElementById('total-price').textContent = totalPrice.toFixed(2);
}

function updateQuantity(index, quantity) {
    cartItems[index].quantity = parseInt(quantity);
    renderCart();
}

function continueShopping() {
    // Add your logic for continuing shopping
    alert("Continue shopping!");
}

function checkout() {
    const paymentMethod = document.getElementById('payment-method').value;
    if (paymentMethod === 'cash') {
        alert("You selected Cash. Please pay at the counter.");
    } else if (paymentMethod === 'online') {
        alert("You selected Online Payment. Please proceed to the payment gateway.");
    }
    // Add further checkout logic as needed
}

// Example usage: Assume you call addItemToCart from your item display page
// addItemToCart('1', 'Sandwich', 5.00);
// addItemToCart('2', 'Salad', 3.50);
// addItemToCart('3', 'Juice', 2.00);
