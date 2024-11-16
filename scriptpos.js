$(document).ready(function () {
    // Agregar producto a la lista de productos seleccionados
    $(document).on('click', '.add-product', function() {
        const productId = $(this).data('id');
        const productName = $(this).data('name');
        const productPrice = $(this).data('price');

        // Añadir el producto seleccionado a la tabla de productos seleccionados
        $('#selected-products-list').append(`
            <tr data-id="${productId}">
                <td>${productName}</td>
                <td>$${productPrice}</td>
                <td><button class="btn btn-danger btn-sm remove-product">Eliminar</button></td>
            </tr>
        `);
    });

    // Eliminar producto de la lista de productos seleccionados
    $(document).on('click', '.remove-product', function() {
        $(this).closest('tr').remove();
    });

    // Finalizar pedido (acción de ejemplo)
    $('#finish-order').on('click', function() {
        const selectedProducts = [];
        $('#selected-products-list tr').each(function() {
            const name = $(this).find('td').eq(0).text();
            const price = $(this).find('td').eq(1).text();
            selectedProducts.push({ name, price });
        });

        if (selectedProducts.length > 0) {
            alert('Pedido Finalizado\n' + JSON.stringify(selectedProducts, null, 2));
        } else {
            alert('No se ha seleccionado ningún producto.');
        }
    });
});
