// script.js

// Productos de ejemplo
const products = [
    { id: 1, name: "Hamburguesa", price: 50 },
    { id: 2, name: "Papas Fritas", price: 20 },
    { id: 3, name: "Refresco", price: 15 }
];

let cart = [];
let total = 0;

// Renderizar productos
const productList = document.getElementById("product-list");
products.forEach(product => {
    const productItem = document.createElement("div");
    productItem.className = "product-item col-md-12";
    productItem.innerHTML = `
        <span>${product.name} - $${product.price}</span>
        <button class="btn btn-primary btn-sm" onclick="addToCart(${product.id})">Agregar</button>
    `;
    productList.appendChild(productItem);
});

// Agregar producto al carrito
function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    cart.push(product);
    total += product.price;
    renderCart();
}

// Renderizar carrito
function renderCart() {
    const cartList = document.getElementById("cart-list");
    cartList.innerHTML = "";
    cart.forEach((product, index) => {
        const cartItem = document.createElement("li");
        cartItem.className = "list-group-item";
        cartItem.innerHTML = `
            ${product.name} - $${product.price}
            <button class="btn btn-danger btn-sm" onclick="removeFromCart(${index})">Eliminar</button>
        `;
        cartList.appendChild(cartItem);
    });
    document.getElementById("total-amount").textContent = `$${total.toFixed(2)}`;
}

// Eliminar producto del carrito
function removeFromCart(index) {
    total -= cart[index].price;
    cart.splice(index, 1);
    renderCart();
}

// Finalizar venta
document.getElementById("checkout-btn").addEventListener("click", () => {
    alert("Venta finalizada. Total: $" + total.toFixed(2));
    cart = [];
    total = 0;
    renderCart();
});
