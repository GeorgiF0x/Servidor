<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
    <form action="" method="post">
        <input type="submit" value="Home" name="home">
    </form>
    <h1>Pagina Web de Georgi</h1>
        <nav>
            <div>
                <?
                if(validado()){
                    echo"Bienvenido ".$_SESSION['usuario']->descUsuario;
                ?>
                <form action="" method="post">
                <input type="submit" value="Ver perfil" name="verPerfil">
                <input type="submit" value="Cerrar Sesion" name="logout">
                </form>
            </div>
           <?
            }else{
            ?>
             <form action="" method="post">
                <input type="submit" value="Login" name="login">
                </form>
            <?
            }
           ?> 
        </nav>
</header> 
    <main>
            Bienvenido a mi pagina
                <!-- Vistas -->
        <?
        if(!isset($_SESSION['vista'])){
            require VIEW."home.php";
        }else{
            require $_SESSION['vista'];
        }
        ?>
    </main>
    
</body>
</html>