<form action="" method="post">
    <label for="nombre">Nombre: <input type="text" name="nombre" id="nombre" value="<?php if(isset($_COOKIE['recordar'])){ echo $_COOKIE['recordar']['nombre']; } ?>"></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "nombre");
        }
        ?>
    </p>
    <label for="password">Contraseña: <input type="password" name="pass" id="pass" value="<?php if(isset($_COOKIE['recordar'])){ echo $_COOKIE['recordar']['pass']; } ?>"></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "pass");
        }
        ?>
    </p>
    <div>
        <input type="checkbox" id="recordar" name="recordar" <?php if (isset($_COOKIE['recordar'])) echo 'checked'; ?>>
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

    


