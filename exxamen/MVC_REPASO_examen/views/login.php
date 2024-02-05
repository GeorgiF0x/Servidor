<form action="" method="post">
    <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre"></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "nombre");
        }
        ?>
    </p>
    <label for="password">Contraseña: <input type="password" name="pass" id="pass"></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "pass");
        }
        ?>
    </p>
    <div>
        <input type="checkbox" id="recordar" name="recordar">
        <label for="recordar">Recordar sesión</label>
    </div>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "validado");
        }
        ?>
    </p>
    <input type="submit" name="login" value="Iniciar">
    <input type="submit" name="registrar" value="Registrar">
</form>
