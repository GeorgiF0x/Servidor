<form  action="" method="get">
    <label for="codUsuario">Código de Usuario:</label>
    <input type="text" id="codUsuario" name="codUsuario" value="<?php echo $_SESSION['usuario']->codUsuario; ?>"
        readonly><br>

    <label for="descUsuario">Descripción de Usuario:</label>
    <input type="text" id="descUsuario" name="descUsuario" value="<?php echo $_SESSION['usuario']->descUsuario; ?>"
        readonly><br>

    <label for="fechaUltimaConexion">Fecha última conexión:</label>
    <input type="text" id="fechaUltimaConexion" name="fechaUltimaConexion"
        value="<?php echo $_SESSION['usuario']->fechaUltimaConexion; ?>" readonly><br>

    <label for="perfil">Perfil:</label>
    <input type="text" id="perfil" name="perfil" value="<?php echo $_SESSION['usuario']->perfil; ?>" readonly><br>

    <label for="activo">Activo:</label>
    <input type="text" id="activo" name="activo" value="<?php echo $_SESSION['usuario']->activo; ?>" readonly><br>
    <input type="submit" value="editar" name="editar">
    <!-- El campo de contraseña no debe mostrarse en texto plano, por razones de seguridad -->
</form>