<form action="">
    <label for="Nombreid">User:</label>
        <input type="text" name="nombre" id="Nombreid"><br><br>

        <span class="errores">
        <?
            if(isset($errores)){
                printerror($errores,'nombre');
            }
        ?>
        </span>

    <label for="Passid">Contraseña:</label>
        <input type="password" name="pass" id="Passid">
    
        <span class="errores">
        <?
               if(isset($errores)){
                printerror($errores,'validado');
                printerror($errores,'pass');
            }
        ?>
        </span>
    <input type="submit" value="Registrarme" name='Login_registro'>
    <input type="submit" value="Iniciar Sesion" name="Login_IniciarSesion">