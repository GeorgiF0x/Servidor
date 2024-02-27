<form action="" method="post">
    <p>
        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="<?php echo $_SESSION['Coche']->marca; ?>">
    </p>
    <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "marca");
        }
        ?>
    <p>
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $_SESSION['Coche']->modelo; ?>">
    </p>
    <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "modelo");
        }
        ?>
    <p>
        <label for="anio">Año:</label>
        <input type="text" name="anio" value="<?php echo $_SESSION['Coche']->anio; ?>">
    </p>
    <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "anio");
        }
        ?>
    <p>
        <label for="color">Color:</label>
        <input type="text" name="color" value="<?php echo $_SESSION['Coche']->color; ?>">
    </p>
    <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "color");
        }
        ?>
    <p>
        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?php echo $_SESSION['Coche']->precio; ?>">
    </p>
    <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "precio");
        }
        ?>
    <p>
        <input type="submit" value="Actualizar" name="actualizar">
    </p>
</form>