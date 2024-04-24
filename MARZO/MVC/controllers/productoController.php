<?
//http://192.168.7.203/MARZO/API/index.php/productos?Id=7
$datosProducto=get("productos/".$_SESSION['id_producto']);
echo"<pre>";
$datosProducto=json_decode($datosProducto);
$producto=$datosProducto;
if($producto){
    $_SESSION['productoElegido']=$producto;
}
// echo is_array($producto) ? 'Array' : 'not an Array';
// echo "\n";
if(isset($_REQUEST["ir_carrito"])){
    //comprobar si el producto esta en el carrito del usuario
    $unidades=$_REQUEST['unidades'];
    $InCarrito=$datosCarritoUser=$datosProducto=get("carrito?IdUsuario=".$usuario->Id."&IdProducto=".$producto->Id);
    if($InCarrito){
        $nuevaCantidad = array("Cantidad" => $unidades);
        $updateCarrito=put("carrito",$producto[0]->Id,$nuevaCantidad);
    }else{
        
    }
}

if(isset($_REQUEST['rem_stock'])){
    $cantidadQuitar=$_REQUEST['unidades'];
    $nuevaCantidad=$producto[0]->CantidadStock-$cantidadQuitar;
    
}


