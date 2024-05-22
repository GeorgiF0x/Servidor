<?

// http://192.168.7.203/MARZO/API/index.php/productos
$datosProductos=get("productos");
$datosProductos=json_decode($datosProductos);
$productos=$datosProductos;
if($productos){
  $_SESSION['productos']=$productos;
}

if(isset($_REQUEST['ir_producto'])){
  $_SESSION['id_producto'] = $_REQUEST['producto_id'];
  $_SESSION['vista'] = VIEW.'producto.php';
  $_SESSION['controlador'] = CON.'productoController.php';
  require $_SESSION['controlador'];
}

if(isset($_REQUEST['agregar_producto'])){
  $_SESSION['vista'] = VIEW.'addProducto.php';
  $_SESSION['controlador'] = CON.'addProductoController.php';
  require $_SESSION['controlador'];
}

if(isset($_REQUEST['agregar_categoria'])){
  $_SESSION['vista'] = VIEW.'addCategoria.php';
  $_SESSION['controlador'] = CON.'addCategoriaController.php';
  require $_SESSION['controlador'];
}

// if(isset($_REQUEST['producto_borrar'])){
//   $producto_id = $_REQUEST['producto_id']; 
//   $datosProducto=get("productos/".$_REQUEST['producto_id']);
// $datosProducto=json_decode($datosProducto);
// $producto=$datosProducto;
//   $ruta_imagen = $producto[0]->RutaImg; // Concatenar la ruta base con la ruta relativa de la imagen
//   $delete = deleteFromAPI("productos", $producto_id); // Eliminar el producto de la API
//   if($delete){
//       // Eliminar el archivo de imagen asociado
//       if(file_exists(IMG.$ruta_imagen)) {
//           unlink(IMG.$ruta_imagen); // Eliminar el archivo
//           echo "Archivo eliminado correctamente.";
//       } else {
//           echo "El archivo no existe.";
//       }
//       // Redirigir o realizar otras acciones después de eliminar el producto
      
//       // $_SESSION['vista'] = VIEW.'home.php';
//       // $_SESSION['controlador'] = CON.'homeController.php';
//       // require $_SESSION['controlador'];
//   }
// }

