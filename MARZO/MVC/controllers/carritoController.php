<?

$itemsCarrito=get("carritos?IdUsuario=".$_SESSION['usuario']['Id']);
$itemsCarrito=json_decode($itemsCarrito);
// echo "<pre>";
// var_dump($_SESSION['usuario']);
$_SESSION['carritoUser']=$itemsCarrito;

if(isset($itemsCarrito) && !empty($itemsCarrito)) {
    function imprimirProductosCarrito($itemsCarrito) {
        foreach ($itemsCarrito as $item) {
     
            $producto = get("productos/".$item->IdProducto);
            $producto = json_decode($producto);
        
            if ($producto) {
                echo '<form action="accion.php" method="POST">';
                echo '<div class="card mb-3">';
                echo '<div class="card-body">';
                echo '<div class="d-flex justify-content-between">';
                echo '<div class="d-flex flex-row align-items-center">';
                echo '<div>';
                // Imagen del producto
                if (isset($producto[0]->RutaImg)) {
                    echo '<img src="' . IMG . $producto[0]->RutaImg. '" class="img-fluid rounded-3 ms-2 mt-2 mb-2" alt="' . $producto[0]->Nombre . '" style="width: 65px;">';
                }
                echo '</div>';
                echo '<div class="ms-3 mt-2">';
                echo '<h5>' . $producto[0]->Nombre . '</h5>';
                
        
                $descripcion = $producto[0]->Descripcion;
                if (strlen($descripcion) > 100) {
                    $descripcion = substr($descripcion, 0, 100) . '...';
                }
                echo '<p class="small mb-0">' . $descripcion . '</p>'; 
                
                echo '</div>';
                echo '</div>';
                echo '<div class="d-flex flex-row align-items-center">';
                echo '<div style="width: 100px;">'; 
                echo '<input type="number" class="form-control form-control-sm fw-normal mb-0" value="' . $item->Cantidad . '" style="width: 100%;">'; // Ajusta el ancho del input
                echo '</div>';
                echo '<div style="width: 150px;">';
                echo '<h5 class="mb-0 ms-4">$' . $producto[0]->Precio . '/U</h5>'; 
                echo '</div>';
                // Botón para eliminar el producto del carrito
                echo '<input type="hidden" name="id_item" value="' . $item->Id . '">'; 
                echo '<button type="submit" name="comprar_producto_carrito" class="btn btn-primary">Comprar</button>';
                echo '</form>';
                // Botón para comprar el producto
                echo '<form action="" method="POST">';
                echo '<input type="hidden" name="id_item" value="' . $item->Id . '">'; 
                echo '<button type="submit" name="eliminar_producto_carrito" class="btn btn-danger mx-2">Eliminar</button>';
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
}

//eliminar
if(isset($_REQUEST['eliminar_producto_carrito'])){
    $idProducto=$_REQUEST['id_item'];
    $delete = deleteFromAPI("carritos", $idProducto); 
    if($delete){
        $_SESSION['vista'] = VIEW.'carrito.php';
        $_SESSION['controlador'] = CON.'carritoController.php';
        header("Location: " . $_SERVER['PHP_SELF']);

    }
}


