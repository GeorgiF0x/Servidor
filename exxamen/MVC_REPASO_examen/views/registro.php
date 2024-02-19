<form action="" method="post">
    <label for="codUsuario">Código de Usuario:</label>
    <input type="text" id="codUsuario" name="codUsuarior" value=""><br>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "codUsuarior");
        }

        ?>
    </p>
    <label for="descUsuario">Descripción de Usuario:</label>
    <input type="text" id="descUsuario" name="descUsuarior" value=""><br>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "descUsuarior");
        }

        ?>
    </p>
    <label for="password">Contraseña: <input type="password" name="passr" id="pass"></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "passr");
        }

        ?>
    </p>
    <label for="perfil">Perfil:</label>
    <input type="text" id="perfil" name="perfil" value="usuario" readonly><br>
    <p></p>
    <label for="activo">Activo:</label>
    <input type="text" id="activo" name="activo" value="true" readonly><br>
    <p></p>
    <input type="submit" value="registrarse" name="registrarse">
    <!-- El campo de contraseña no debe mostrarse en texto plano, por razones de seguridad -->
</form>