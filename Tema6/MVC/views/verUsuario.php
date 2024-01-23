<?
    if(isset($sms)){
        echo $sms;
    }
    //Anteriormente el controlador haya buscado un usuario
    ?>
<p>CodUsuario: <?echo $_SESSION['usuario']->codUsuario;?></p>
<p>descUsuario: <?echo $_SESSION['usuario']->descUsuario;?></p>
<p>fechaUltimaConexion: <?echo $_SESSION['usuario']->fechaUltimaConexion;?></p>
<p>Perfil: <?echo $_SESSION['usuario']->perfil;?></p>

<form action="" method="post">
    <input type="submit" name="User_editar" value="Editar">
</form>