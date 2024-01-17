<form action="">
    <label for="Nombreid">CodigoUsuario:</label>
        <input type="text" name="nombre" id="Nombreid" value="<?echo $_SESSION['usuario']->codUsuario;?>"><br><br>
        <span class="errores">
        <?
            if(isset($errores)){
                printerror($errores,'nombre');
            }
        ?>
        </span>
    <label for="Passid">Contraseña:</label>
        <input type="password" name="pass" id="Passid" value="<?echo $_SESSION['usuario']->descUsuario;?>">
    
        <span class="errores">
        <?
               if(isset($errores)){
                printerror($errores,'validado');
                printerror($errores,'pass');
            }
        ?>
        </span>
        <label for="Passid">Repetir Contraseña:</label>
        <input type="password" name="Rep_pass" id="Passid" value="<?echo $_SESSION['usuario']->descUsuario;?>">
    
        <span class="errores">
        <?
               if(isset($errores)){
                printerror($errores,'validado');
                printerror($errores,'pass');
            }
        ?>
        </span>

        <label for="descUser">descUsuario:</label>
        <input type="descUsuario" name="desc" id="descUser" value="<?echo $_SESSION['usuario']->FechaUltimaConexion;?>">
        <span class="errores">
        <?
               if(isset($errores)){
                printerror($errores,'validado');
                printerror($errores,'pass');
            }
        ?>
        </span>

    
     

    <input type="submit" value="Guardar" name="User_editar">
    <input type="submit" value="Guardar Contraseña" name="Pass_editar">