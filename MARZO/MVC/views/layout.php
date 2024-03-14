<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        tr, td, th {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
<header class="d-flex">

        <nav>
            <div>
                <?php
                
                
                    if(validado()){
                        ?>
                        <h1 >
                            <?
                        echo "Bienvenido  ".$_SESSION['usuario']->usuario;
                        echo "<br>";
                        echo $_SESSION['vista'];
                        echo "<br>";
                        echo $_SESSION['controlador'];
                        echo "<br>";
                        ?>
                        </h1>
                        <form action="" method="post">
                        <input type="submit" value="Cerrar Sesión" name="Login_CerrarSesion">
                        <input type="submit" value="Home" name="home">
                        </form>
                        <?
                    }else{
                    }
                ?>
            </div>
        </nav>
    </header>
    <main>
        <?php
            if(!isset($_SESSION['vista'])){
                require VIEW.'login.php';
            } else {
                require $_SESSION['vista'];
            }
        ?>
    </main>
    <footer>

    </footer>
</body>
</html>