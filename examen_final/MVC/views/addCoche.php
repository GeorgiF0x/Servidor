<h2>Añadir nuevo Coche</h2>

<form action="" method="post">
    <p>
        <label for="marca">Marca</label>
        <input type="text" name="marca" id="marca" >
    </p>
        <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "marca");
        }
        ?>

    <p>
        <label for="modelo">Modelo</label>
        <input type="text" name="modelo" id="modelo">
    </p>
        <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "modelo");
        }
        ?>
    
    <p>
        <label for="anio">Año</label>
        <input type="number" name="anio" id="anio" >
    </p>
        <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "anio");
        }
        ?>
    <p>
        <label for="color">Color</label>
        <input type="text" name="color" id="color" >
    </p>
    <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "color");
        }
        ?>
    <p>
        <label for="precio">Precio</label>
        <input type="number" name="precio" id="precio">
    </p>
    <?php
        if (isset($errores)&& isset ($_REQUEST['insertarCoche'])) {
            escribirErrores($errores, "precio");
        }
        ?>
    <p>
        <input type="submit" value="Añadir" name="insertarCoche">
    </p>
</form>
    <?php
        if(isset($errores['insertCoche'])){
            echo '<span style="color: red;">' . $errores['insertCoche'] . '</span>';
        }
        if(isset($_SESSION['avisos']['cocheInsert'])){
            echo '<span style="color: green;">' . $_SESSION['avisos']['cocheInsert'] . '</span>';
        }
        ?>
