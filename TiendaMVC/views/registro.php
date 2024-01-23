
<form action="" method="post">
    <label for="nombre">Nombre:
        <input type="text" name="nombre" id="nombre">
    </label>
    <p class="error">
        <?php 
        if(isset($errores))
            errores($errores, 'nombre'); ?>
    <p>
    <br>
    <label for="desc">Desc:
        <input type="text" name="desc" id="desc">
    </label>
    <p class="error">
        <?php 
        if(isset($errores))
            errores($errores, 'nombre'); ?>
    <p>
    <br>
    <label for="pass">Pass:
        <input type="password" name="pass" id="pass">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'pass'); ?>
    <p>
    <br>
    <label for="Reppass">Repetir Pass:
        <input type="password" name="Reppass" id="Reppass">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'pass'); ?>
    <p>
    <br>
    <input type="hidden" value="usuario" name="perfil">
    <input type="hidden" value="<?date('Y-m-d')?>" name="fecha">      
    <?php 
        if(isset($errores))
            errores($errores, 'validado'); ?>
    <input type="submit" value="Registrarme" name="Login_Registro">       
    <input type="submit" name="Registrar_user" value="Guardar Datos"  >
</form> 