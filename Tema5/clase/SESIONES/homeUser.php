<?
        session_start();
        if(isset($_SESSION['usuario'])){
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
        echo "Bienvenido " . $_SESSION('usuario');
    ?>
</body>
</html>