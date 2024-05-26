<?
   $esAdmin = ($_SESSION['usuario']['IdRol'] == 1 || $_SESSION['usuario']['IdRol'] == 2);
//http://192.168.7.203/MARZO/API/index.php/productos?Id=7
$datosProducto=get("productos/".$_SESSION['id_producto']);
$datosProducto=json_decode($datosProducto);
$producto=$datosProducto;
if($producto){
    $_SESSION['productoElegido']=$producto;
}
// var_dump($producto);
// echo is_array($producto) ? 'Array' : 'not an Array';
// echo "\n";
if(isset($_REQUEST["ir_carrito_compra"])){
    //comprobar si el producto esta en el carrito del usuario
    if($esAdmin && isset($_REQUEST['cantidad_stock'])) {
        $unidades = $_REQUEST['cantidad_stock'];
    }else{
        $unidades=$_REQUEST['unidades'];
    }
    $InCarrito=$datosCarritoUser=$datosProducto=get("carritos?IdUsuario=".$_SESSION['usuario']['Id']."&IdProducto=".$producto[0]->Id);
    $InCarrito=json_decode($InCarrito);
    // var_dump($InCarrito);
    if($InCarrito){
        $carritoId = $InCarrito[0]->Id;
        $nuevaCantidad = array("Cantidad" => $unidades);
        $updateCarrito=put("carritos",$carritoId,$nuevaCantidad);
        $_SESSION['vista'] = VIEW . 'carrito.php';
        $_SESSION['controlador'] = CON . 'carritoController.php';
        // Requerir el controlador del carrito
        require $_SESSION['controlador'];
    }else{
        //crear el carrito
        $idUser=$_SESSION['usuario']['Id'];
        $datos_carrito = array(
            "IdUsuario" => $idUser,
            "IdProducto" => $producto[0]->Id,
            "Borrado" => 0,
            "Cantidad" => $unidades
        );
        if($crearCarrito = post("carritos", $datos_carrito)){
            $_SESSION['vista'] = VIEW . 'carrito.php';
            $_SESSION['controlador'] = CON . 'carritoController.php';
            require $_SESSION['controlador'];
        }
        
    }
}



if(isset($_REQUEST['producto_cambio'])){
    $producto_id = $producto[0]->Id; // Obtén el ID del producto
    $Descripcion = $_REQUEST['producto_Descripcion'];
    $Precio = $_REQUEST['producto_Precio'];
    $CantidadStock = $_REQUEST['cantidad_stock'];
    // Crear el array con los datos a actualizar
    $datos_actualizados = array(
        "Descripcion" => $Descripcion,
        "Precio" => $Precio,
        "CantidadStock" => $CantidadStock
        // Llamar a la función put() para actualizar los datos del producto
    );
    $updateStock = put("productos", $producto_id, $datos_actualizados);

    //crear Albaran
    $fecha = date("Y-m-d");
    $idUser=$_SESSION['usuario']['Id'];
    $datos_albaran = array(
        "Fecha" => $fecha,
        "IdUsuario" => $idUser,
        "Borrado" => 0
    );
  $crearAlbaran = post("albaranes", $datos_albaran);
    $idAlbaran=get("albaranes?ultimo");
    $idAlbaran=json_decode($idAlbaran);

  $datos_detalleAlbaran = array(
    "IdAlbaran" => $idAlbaran->Id,
    "IdProducto" => $producto_id,
    "Unidades" => $CantidadStock,
    "Borrado" => 0
);
if($crearDetalleAlbaran = post("detalleAlbaranes", $datos_detalleAlbaran)){
    // echo "se ha creado bien el albaran ";
    $_SESSION['vista'] = VIEW.'verAlbaran.php';
    $_SESSION['controlador'] = CON.'albaranController.php';
    require $_SESSION['controlador'];
}else{
    echo "fallo al hacer el albaran";
}

}


if(isset($_REQUEST['producto_borrar'])){
    $producto_id = $producto[0]->Id; 
    $ruta_imagen = $producto[0]->RutaImg; 
    $delete = deleteFromAPI("productos", $producto_id); // 
    if($delete){
        // Eliminar el archivo de imagen asociado
        if(file_exists(IMG.$ruta_imagen)) {
            unlink(IMG.$ruta_imagen); // Eliminar el archivo
            echo "Archivo eliminado correctamente.";
        } else {
            echo "El archivo no existe.";
        }
        $_SESSION['vista'] = VIEW.'home.php';
        $_SESSION['controlador'] = CON.'homeController.php';
        require $_SESSION['controlador'];
    }
}




