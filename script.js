// script.js

document.addEventListener('DOMContentLoaded', function() {
    const cartList = document.querySelector('.cart-list');
    const totalAmount = document.getElementById('total-amount');
    let total = 0;

    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function() {
            const productName = this.parentElement.querySelector('p').textContent;
            addToCart(productName);
        });
    });

    function addToCart(productName) {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `<p>${productName}</p><p>$10.00</p>`; // Precio fijo por producto para el ejemplo
        cartList.appendChild(cartItem);
        
        total += 10; // Sumar el precio al total
        totalAmount.textContent = `$${total.toFixed(2)}`;
    }
});
