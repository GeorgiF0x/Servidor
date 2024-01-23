<?
    if(isset($sms)){
        echo $sms;
    }
    //Anteriormente el controlador haya buscado un usuario
    ?>
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
    <label for="pass">Pass:
        <input type="password" name="pass" id="pass">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'pass'); ?>
    <p>
    <br>
    <?php 
        if(isset($errores))
            errores($errores, 'validado'); ?>
    <input type="submit" value="Registrarme" name="Login_Registro">       
    <input type="submit" name="Login_IniciarSesion" value="Inciar Sesion"  >
</form>