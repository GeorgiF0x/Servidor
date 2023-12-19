<?
    session_start();
    if(isset($_SESSION['error'])){

    }
    require("/var/www/Servidor/Tema5/clase/SESIONES/funciones/conexion.php");
    require("/var/www/Servidor/Tema5/clase/SESIONES/funciones/validarFormulario.php");
    if(enviado()&& !textoVacio('user') && !textoVacio('pass')){
            $usuario=validarUsuario($_REQUEST['user'],$_REQUEST['pass'] );
            if($usuario){
                $_SESSION['usuario']=$usuario;
                header('Location: ./homeUser.php');
                exit;
            }else{
                echo"acceso Incorrecto";
            }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=ç, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?
        if(isset($_SERVER['error'])){
            echo $_SERVER['error'];
        }
    ?>
    <h1>LOGIN</h1>
    <form action="" method="get">
        <p>
            <label for="user">Nombre</label>
            <input type="text" name="user" id="idUser">
            <label for="pass">Password</label>
            <input type="password" name="pass" id="idPass">
            <input type="submit" value="Enviar" name="Enviar"
        </p>
    </form>
</body>
</html>