<?
    require("/var/www/Servidor/Tema5/clase/SESIONES/funciones/conexion.php");
        session_start();
        if(!isset($_SESSION['usuario'])){
            $_SESSION['error']="no tienes permiso para entrar a la pagina USER";
            header('Location : ./login.php');
            exit;
        }
?>

<!DOCTYPE html>
<html lang="en">    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pagina User</h1>
    <?
        if(isset($_SERVER['error'])){
            echo $_SERVER['error'];
        }
    ?>
    <?  
        echo "Bienvenido ". $_SESSION['usuario'];
        $paginas=misPaginas();
        echo "<h2>Paginas a las que puedo entrar:</h2>";

        foreach($paginas as $value){
            echo "< a href='./".$value."'>".$value."</a>";
        }
    ?>
</body>
</html>