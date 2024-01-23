
<form action="" method="post">
    
    <label for="pass">Pass:
        <input type="password" name="pass" id="pass">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'pass'); ?>
    <p>
    <br>
    <label for="pass1"> Repite Pass:
        <input type="password" name="pass1" id="pass1">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'pass1'); ?>
    <p>
    <br>
    <?php 
        if(isset($errores)){
            errores($errores, 'igual');
            errores($errores, 'update');
        }?>
            
    <input type="submit" name="User_GuardaContraseña" value="Guardar cambios"  >
</form>