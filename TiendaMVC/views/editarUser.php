
<form action="" method="post">
    <label for="cod">codUsuario:
        <input type="text" readonly name="cod" id="cod" value = "<?echo $_SESSION['usuario']->codUsuario;?>";>
    </label>
    <br>
    <label for="nombre">desUsuario:
        <input type="text" name="nombre" id="nombre" value="<?echo $_SESSION['usuario']->descUsuario;?>">
    </label>
    <p class="error">
        <?php 
        if(isset($errores))
            errores($errores, 'nombre'); ?>
    <p>
    <br>
    <label for="cod">Fecha Ultima Conexion:
        <input value ="<?echo $_SESSION['usuario']->fechaUltimaConexion;?>" type="text" readonly name="cod" id="cod">
    </label>
    <br>  
    <label for="cod">Perfil:
        <input value="<?echo $_SESSION['usuario']->perfil;?>" type="text" readonly name="cod" id="cod">
    </label>
    <br>
    <?php 
        if(isset($errores))
            errores($errores, 'update'); ?>   
    <input type="submit" name="User_Editar" value="Guardar Cambios"  >
    <input type="submit" name="User_CambiaContraseña" value = "Cambiar contraseña">    
</form>