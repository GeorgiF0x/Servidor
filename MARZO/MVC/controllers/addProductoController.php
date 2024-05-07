
 
<?
$datosCategoria=get("categoria");
$datosCategoria=json_decode($datosCategoria);
$categoria=$datosCategoria;
if($categoria){
    $_SESSION['categorias']=$categoria;
  }

//print_r($_SESSION['controlador']);
//subir fichero al servidor
if(isset($_REQUEST['guardar_producto'])){
    if(isset($_FILES['ruta_img']) && $_FILES['ruta_img']['error'] === UPLOAD_ERR_OK){
        // Ruta para guardar el fichero
        $ruta = "/var/www/Servidor/MARZO/MVC/webRoot/img/";
        // Ruta + nombre 
        $ruta .= basename($_FILES['ruta_img']['name']);
        
        if(move_uploaded_file($_FILES['ruta_img']['tmp_name'], $ruta)){
            echo "Archivo subido";
        }else{
            echo "Ha fallado al subir el archivo";
        }
    } else {
        echo "Error al subir la imagen.";
    }
    


}
?>
