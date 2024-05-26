<?

$itemsCarrito=get("carritos?IdUsuario=".$_SESSION['usuario']['Id']);
$itemsCarrito=json_decode($itemsCarrito);
$_SESSION['carritoUser']=$itemsCarrito;

function imprimirProductosCarrito($itemsCarrito) {
    foreach ($itemsCarrito as $item) {
        // Obtener los detalles del producto por su ID
        $producto = get("productos/".$item->IdProducto);
        $producto = json_decode($producto);
        
        // Verificar si se encontró el producto
        if ($producto) {
            echo '<form action="accion.php" method="POST">';
            echo '<div class="card mb-3">';
            echo '<div class="card-body">';
            echo '<div class="d-flex justify-content-between">';
            echo '<div class="d-flex flex-row align-items-center">';
            echo '<div>';
            // Imagen del producto
            if (isset($producto[0]->RutaImg)) {
                echo '<img src="' . IMG . $producto[0]->RutaImg. '" class="img-fluid rounded-3" alt="' . $producto[0]->Nombre . '" style="width: 65px;">';
            }
            echo '</div>';
            echo '<div class="ms-3">';
            echo '<h5>' . $producto[0]->Nombre . '</h5>'; // Nombre del producto
            echo '<p class="small mb-0">' . $producto[0]->Descripcion . '</p>'; // Descripción del producto
            echo '</div>';
            echo '</div>';
            echo '<div class="d-flex flex-row align-items-center">';
            echo '<div style="width: 50px;">';
            echo '<input type="number" class="form-control form-control-sm fw-normal mb-0" value="' . $item->Cantidad . '">';

            echo '</div>';
            echo '<div style="width: 150px;">';
            echo '<h5 class="mb-0 ms-4">$' . $producto[0]->Precio . '/U</h5>'; // Precio del producto
            echo '</div>';
            // Botón para eliminar el producto del carrito
            echo '<input type="hidden" name="id_item" value="' . $item->Id . '">'; // Campo oculto para el ID del item
            echo '<button type="submit" name="comprar_producto_carrito" class="btn btn-primary">Comprar</button>';
            echo '</form>';
            // Botón para comprar el producto
            echo '<form action="accion.php" method="POST">';
            echo '<input type="hidden" name="id_item" value="' . $item->Id . '">'; // Campo oculto para el ID del item
            echo '<button type="submit" name="eliminar_producto" class="btn btn-danger mx-2">Eliminar</button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        } else {
            echo "<li class='list-group-item'>Producto no encontrado</li>";
        }
    }
}

//hacer la compra 
if(isset($_REQUEST['comprar_producto_carrito'])){

}


