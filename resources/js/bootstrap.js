import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import axios from 'axios';

window.Pusher = Pusher;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Pass userId dynamically from the Blade template
// const userId = window.userId;

const echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: true,
    debug: true, // Enable debugging
});

echo.channel(`cart.${window.userId}`)
    .listen('CartUpdated', (event) => {
        alert('Hello');
        console.log("Hello");
        //updateCartUI(event.cart);
    })
    .error((err) => {
        console.error("Echo connection error:", err);  // Log connection error if any
    });
    ;
    

function updateCartUI(cart) {
    const cartItemsList = document.getElementById('cart-items-list');
    const cartTotal = document.getElementById('cart-total');

    cartItemsList.innerHTML = '';

    cart.forEach(item => {
        const cartItemElement = document.createElement('li');
        cartItemElement.classList.add('cart-item');
        cartItemElement.innerHTML = `
            <span class="item-name">${item.product_name}</span>  
            <span class="item-price">${item.product_price} PKR</span>  
            <span class="item-quantity">x${item.quantity}</span>  
            <span class="item-total">${item.total_price} PKR</span>  
            <button class="remove-item" data-item-id="${item.product_id}">Remove</button>  
        `;
        cartItemsList.appendChild(cartItemElement);
    });

    const totalPrice = cart.reduce((total, item) => total + item.total_price, 0);
    cartTotal.innerText = `Total: ${totalPrice} PKR`;
}

