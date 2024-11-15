// script.js

document.addEventListener('DOMContentLoaded', function() {
    const cartList = document.querySelector('.cart-list');
    const totalAmount = document.getElementById('total-amount');
    let total = 0;

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productName = this.parentElement.firstChild.textContent.trim();
            addToCart(productName);
        });
    });

    function addToCart(productName) {
        const cartItem = document.createElement('li');
        cartItem.classList.add('list-group-item', 'd-flex', 'justify-content-between', 'align-items-center');
        cartItem.innerHTML = `<span>${productName}</span><span>$10.00</span>`; // Precio fijo para el ejemplo
        cartList.appendChild(cartItem);
        
        total += 10;
        totalAmount.textContent = `$${total.toFixed(2)}`;
    }
});
