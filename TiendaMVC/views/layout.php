<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <header>
        <img src="./webroot/img/ff.png">
        <form action="" method='post'>
            <input type="submit" value="Home" name="home">
        </form>
        <h1>Pagina Web de Georgi</h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                if (validado()) {
                    echo "Bienvenido " . $_SESSION['usuario']->descUsuario;
                    ?>
                    <form action="" method='post' class="form-inline my-2 my-lg-0">
                        <input type="submit" value="Ver Perfil" name="User_verPerfil" class="btn btn-outline-primary my-2 my-sm-0">
                        <input type="submit" value="Ver Citas" name="Citas_ver" class="btn btn-outline-success my-2 my-sm-0">
                        <input type="submit" value="Cerrar Session" name="logout" class="btn btn-outline-danger my-2 my-sm-0">
                    </form>
                    <?php
                } else {
                    ?>
                    <form action="" method='post' class="form-inline my-2 my-lg-0">
                        <input type="submit" value="Login" name="login" class="btn btn-outline-primary my-2 my-sm-0">
                    </form>
                    <?php
                }
                ?>
            </div>
        </nav>
    </header>
    <main>
        <?php
        if(isAdmin()){
            ?>
            <input type="submit" value="Ver todo" name="ver_todo_admin">
            <?
        }
        if (!isset($_SESSION['vista']))
            require VIEW . 'home.php';
        else
            require $_SESSION['vista'];
        ?>
    </main>
    <footer class=" bg-light text-center p-2">
        Copyright
    </footer>

    <!-- Add Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
