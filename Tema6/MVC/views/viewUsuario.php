<?
    if(isset($sms)){
        echo $sms;
    }
    //anteriormente el conrolador haya buscado un usuario

?>

<p>CodigoUsuario: <?echo $_SESSION['usuario']->codUsuario;?><br>
<p>descUsuario: <?echo $_SESSION['usuario']->descUsuario;?><br>
<p>Perfil: <?echo $_SESSION['usuario']->perfil;?><br>
<p>FechaUltimaConexion: <?echo $_SESSION['usuario']->FechaUltimaConexion;?><br>


<form action="" method="post">
    <input type="submit" value="Editar" name="editarUser">;
</form>
