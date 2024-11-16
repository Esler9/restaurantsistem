// Productos de ejemplo
const products = [
    { id: 1, name: "Hamburguesa", price: 50 },
    { id: 2, name: "Papas Fritas", price: 20 },
    { id: 3, name: "Refresco", price: 15 },
    { id: 4, name: "Pizza", price: 80 },
    { id: 5, name: "Ensalada", price: 30 },
    { id: 6, name: "Pollo Frito", price: 70 },
    { id: 7, name: "Tacos", price: 25 },
    { id: 8, name: "Sopa", price: 40 },
    { id: 9, name: "Cerveza", price: 20 },
    { id: 10, name: "Helado", price: 15 }
];

// Renderizar productos en tabla
const productList = document.getElementById("product-list");
products.forEach(product => {
    const row = document.createElement("tr");
    row.innerHTML = `
        <td>${product.id}</td>
        <td>${product.name}</td>
        <td>$${product.price}</td>
        <td>
            <button class="btn btn-primary btn-sm" onclick="addToCart(${product.id})">Agregar</button>
        </td>
    `;
    productList.appendChild(row);
});

// Buscar productos en la tabla
document.getElementById("search-box").addEventListener("keyup", function () {
    const searchValue = this.value.toLowerCase();
    const rows = document.querySelectorAll("#product-table tbody tr");
    rows.forEach(row => {
        const productName = row.children[1].textContent.toLowerCase();
        row.style.display = productName.includes(searchValue) ? "" : "none";
    });
});

// Carrito de compras
let cart = [];
let total = 0;

function addToCart(productId) {
    const product = products.find(p => p.id === productId);
    cart.push(product);
    total += product.price;
    alert(`Producto "${product.name}" agregado al carrito. Total: $${total}`);
}
