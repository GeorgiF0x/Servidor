<form action="" method="post">
    <label for="nombre">Email: <input type="text" name="nombre" id="nombre" value=""></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "nombre");
        }
        ?>
    </p>
    <label for="token">Token: <input type="password" name="token" id="token"></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "token");
        }
        ?>
    </p>
    <?php
        if (isset($errores)) {
            escribirErrores($errores, "validado");
        }
        ?>
    <input type="submit" name="iniciarSesion" value="Iniciar">
    <input type="submit" name="registrar" value="Registrar">
</form>

<?php
if(isset($_SESSION['avisos'])){
    print_r($_SESSION['avisos']);
}

    


