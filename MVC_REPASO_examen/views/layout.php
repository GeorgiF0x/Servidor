<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .checks {
            margin: 20px auto;
            width: 80%;
        }
</style>

<body>
    <form action="" method="post">
        <input type="submit" value="home" name="home">
    </form>
    <header>
        <!-- <h1>pagina web</h1> -->
    </header>
    <nav>
        <div>
            <?
            if (validado()) {
                print_r($_SESSION['usuario']->descUsuario);
                ?>
                <form action="" method="post">
                    <input type="submit" value="verperfil" name="verperfil">
                    <input type="submit" value="vercitas" name="vercitas">
                    <input type="submit" value="cerrar" name="cerrar">
                    <?
                    if (admin()) {
                        ?>
                        <input type="submit" value="verTodo" name="verTodo">
                        <?
                    } ?>
                </form>
                <?
            } else { ?>
                <form action="" method="post">
                    <input type="submit" value="Login" name="loginLay">
                </form>


            <? } ?>
        </div>
    </nav>
    <main>
        <?
        if (!isset($_SESSION['vista'])) {
            echo 'bienvenidos al login';
            require VIEW . 'home.php';
        } else
            require $_SESSION['vista'];
        ?>
    </main>
    <footer>
        copyrigth
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>