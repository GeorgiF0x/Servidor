<?


// http://192.168.7.203/MARZO/API/index.php/productos
$datosProductos=get("productos");
$datosProductos=json_decode($datosProductos);
$productos=$datosProductos;
if($productos){
  $_SESSION['productos']=$productos;

}

