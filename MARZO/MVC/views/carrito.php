<div class="container">
    <h1 class="text-center">Carrito de Compras</h1>
    <ul class="list-group">
        <?php
        
        // Obtener los productos del carrito del usuario y almacenarlos en la variable $itemsCarrito
        $itemsCarrito = $_SESSION['carritoUser'];

        // Imprimir los productos del carrito llamando a la función imprimirProductosCarrito
        imprimirProductosCarrito($itemsCarrito);
        ?>
    </ul>
</div>
