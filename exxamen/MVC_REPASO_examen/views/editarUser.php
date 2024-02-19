<form action = "./index.php" method="get" >
    <label for="nombre">Nombre: <input type="text" name="nombrenuevo" id="nombre"
            value="<?php echo $_SESSION['usuario']->descUsuario; ?>"></label>
    <label for="password">Contraseña: <input type="password" name="passnuevo" id="pass" value=""></label>
    <label for="nombre"><input type="submit" name="cambiar" value="cambiar" id="cambiar"></label>

    <!-- El campo de contraseña no debe mostrarse en texto plano, por razones de seguridad -->
</form>