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
                <form action="" method="post">
                <input type="submit" value="Login" name="login">
                </form>
            </div>
        </nav>
</header> 
    <main>
        Bienvenido  A mi pagina
                <!-- Vistas -->
        <?
        if(!isset($_SESSION['vista'])){
            require VIEW."home.php";
            echo "Bienvenido a mi pagina";
        }else{
            require $_SESSION['vista'];
        }
        ?>
    </main>
    
</body>
</html>