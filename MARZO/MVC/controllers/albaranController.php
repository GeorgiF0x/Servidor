
<?php

// Obtener todos los albaranes
$albaranes = get("albaranes");
$albaranes = json_decode($albaranes);

if (isset($albaranes) && !empty($albaranes)) {

    function imprimirAlbaranes($albaranes) {
        foreach ($albaranes as $albaran) {
            // Obtener los detalles del albarán por su ID
            $detalles = get("detalleAlbaranes?IdAlbaran=" . $albaran->Id);
            $detalles = json_decode($detalles);

            // Verificar si se encontraron detalles del albarán
            if ($detalles) {
                echo '<div class="col-lg-2 col-md-4 col-sm-6">'; // Utilizamos col-lg-2 para pantallas grandes, col-md-4 para medianas y col-sm-6 para pequeñas
                echo '<div class="card mb-3">';
                echo '<div class="card-body text-center">';
                // Fecha del albarán en un encabezado más grande y resaltado
                echo '<h4 class="card-title">' . $albaran->Fecha . '</h4>';
                
                // Detalles del albarán
                echo '<div class="card-text">';
                // ID del albarán en un campo oculto
                echo '<form action="" method="POST">';
                echo '<input type="hidden" name="id_albaran" value="' . $albaran->Id . '">'; 
                
                // Mostrar otros detalles del albarán
                if (isset($detalles[0])) {
                    echo '<p>Producto ID: ' . $detalles[0]->IdProducto . '</p>'; 
                    echo '<p>Unidades: ' . $detalles[0]->Unidades . '</p>'; 
                }
                
                // Botón para ver el detalle del albarán
                echo '<button type="submit" class="btn btn-primary mt-2" name="ver_detalle_albaran">Ver albarán</button>';
                echo '</form>';
                echo '</div>'; // Cierra card-text
                
                echo '</div>'; // Cierra card-body
                echo '</div>'; // Cierra card
                echo '</div>'; // Cierra col
                
            }
        }
        
    }

} else {
    echo "<p>No se encontraron albaranes.</p>";
}

if(isset($_REQUEST['ver_detalle_albaran'])){
    $_SESSION['vista'] = VIEW . 'detalleAlbaran.php';
    $_SESSION['controlador'] = CON . 'detalleAlbaranController.php';
    require $_SESSION['controlador'];
}
?>
