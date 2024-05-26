<div class="col-lg-12">
    <div class="card mb-3">
        <div class="card-body">
            <h1 class="card-title text-center">Detalles del albaran</h1> <!-- Título centrado -->
            <?php
            if (isset($_SESSION['detalle_albaran']) && !empty($_SESSION['detalle_albaran'])) {
                // Comenzar la tabla
                echo '<div class="table-responsive">';
                echo '<table class="table table-bordered">';
                echo '<thead>';
                echo '<tr>';
                echo '<th>ID</th>';
                echo '<th>ID del Albarán</th>';
                echo '<th>ID del Producto</th>';
                echo '<th>Unidades</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                foreach ($_SESSION['detalle_albaran'] as $detalle) {
                    echo '<tr>';
                    echo '<td>' . $detalle->Id . '</td>';
                    echo '<td>' . $detalle->IdAlbaran . '</td>';
                    echo '<td>' . $detalle->IdProducto . '</td>';
                    echo '<td>' . $detalle->Unidades . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>'; 
            } else {
                echo '<p>No se encontraron detalles del albarán.</p>';
            }
            ?>
        </div>
    </div>
</div>

