<?
    if(isset($sms)){
        echo $sms;
    }
?>

<form action="" method="post">
    <label for="esp">Especialista:
        <input type="text" name="especialista" id="esp">
    </label>
    <p class="error">
        <?php 
        if(isset($errores))
            errores($errores, 'especialista<'); ?>
    <p>
    <br>
    <label for="fecha">Fecha:
        <input type="date" name="fecha" id="fecha">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'fecha'); ?>
    <p>
    <br>
    <br>
    <label for="motivo">Motivo:
        <input type="textarea" name="motivo" id="motivo">
    </label>
    <p class="error">
    <?php 
        if(isset($errores))
            errores($errores, 'motivo'); ?>
    <p>
    <br>
    <?php 
        if(isset($errores))
            errores($errores, 'validado'); ?>
    <input type="submit" value="pedir cita" name="add_cita">       
</form>