<div class="container">
    <h1 class="text-center">Carrito de Compras</h1>
    <ul class="list-group">
        <?php
        // Obtener los productos del carrito del usuario y almacenarlos en la variable $itemsCarrito
        $itemsCarrito = $_SESSION['carritoUser'];

        // Verificar si hay elementos en el carrito
        if (!empty($itemsCarrito)) {
            // Si hay elementos, imprimir los productos del carrito
            imprimirProductosCarrito($itemsCarrito);
        } else {
            // Si el carrito está vacío, imprimir un mensaje centrado
            echo '<li class="list-group-item"><h1 class="text-center">No tienes nada en tu carrito</h1></li>';
        }
        ?>
    </ul>
</div>


