<?
    $esAdmin = ($_SESSION['usuario']['IdRol'] == 1 || $_SESSION['usuario']['IdRol'] == 2);
    // echo "<pre>";
    // print_r($_SESSION['productos']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <style>
        tr, td, th {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
<h1 class="text-center mt-3">ESTO ES EL HOME</h1>

<div class="container">
<?
        if($esAdmin){
            echo '<div class="row mt-4 mb-5">';
            echo '<div class="col-md-12 text-center">';
            echo '<form method="POST">';
            echo '<button type="submit" name="agregar_producto" class="btn btn-warning text-white">
                     Agregar Producto
                    </button>';

            echo '<button type="submit" name="agregar_categoria" class="btn btn-info text-white ms-5">
            Agregar Categoria
                    </button>';
            echo '</form>';
            echo '</div>';
            echo '</div>';
        }
    ?>
    <div class="row">
    <?php
foreach ($productos as $producto) {
    echo '<div class="col-md-4 mb-4">';
    echo '<div class="card" style="width: 18rem;">';
    echo '<img src="' . IMG . $producto->RutaImg. '" class="card-img-top img-fluid" alt="' . $producto->Nombre . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title fw-bold text text-center">' . $producto->Nombre . '</h5>';
    echo '<p class="card-text text text-center fst-italic">' . $producto->Descripcion . '</p>';
    
    // Añadir una fila antes de los botones
    echo '<div class="row">';
    
    // Botón "Comprar"
    echo '<div class="col-6">';
    echo '<form method="POST" class="d-flex justify-content-center">';
    echo '<input type="hidden" name="producto_id" value="' . $producto->Id . '">';
    echo '<input type="submit" name="ir_producto" value="Comprar" class="btn btn-primary">';
    echo '</form>';
    echo '</div>';
    
    // Botón "Dar de baja" 
    if($esAdmin) {
        echo '<div class="col-6">';
        echo '<form method="POST" class="d-flex justify-content-center">';
        echo '<input type="hidden" name="producto_id" value="' . $producto->Id . '">';
        echo '<input class="btn btn-danger w-100" type="submit" value="Dar De baja" name="producto_borrar">';
        echo '</form>';
        echo '</div>';
    }
    
    // Cerrar la fila
    echo '</div>'; // Cierre de la fila
    
    echo '</div>'; // Cierre de card-body
    echo '</div>'; // Cierre de card
    echo '</div>'; // Cierre de col-md-4
}
?>

    </div>

</div>

</body>
</html>
