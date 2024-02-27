<form action="" method="post">
    <label for="email">Email: <input type="text" name="email" id="email" ></label>
    <p>
        <?php
        if (isset($errores)) {
            escribirErrores($errores, "email");
        }
        ?>
    </p>
    
    <input type="submit" name="enviarRegistro" value="Enviar"><br>
    <input type="submit" name="Volver" value="Volver"><br>
</form>