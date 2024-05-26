<div class="container">
        <div class="row">
            <?php
            if (isset($albaranes) && !empty($albaranes)) {
                imprimirAlbaranes($albaranes);
            } else {
                echo "<p>No se encontraron albaranes.</p>";
            }
            ?>
        </div>
    </div>