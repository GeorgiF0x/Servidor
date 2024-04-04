<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
    <style>
        tr, td, th {
            border: 1px solid black;
            text-align: center;
        }
    </style>
</head>
<body>
<header class="row">
        <nav>
            <div>
                <?php
                    if(validado()){
                        ?>
                        <h1 >
                        <?
                        echo "Bienvenido  ".$_SESSION['usuario']['Nombre'];
                        echo "<br>";
                        echo $_SESSION['vista'];
                        echo "<br>";
                        echo $_SESSION['controlador'];
                        echo "<br>";
                        ?>
                        </h1>
                        <?
                    }else{
                    }
                ?>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link disabled">Disabled</a>
                </li>
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <?
            if(validado()){
                ?>
                 <form action="" method="post">
                    <input type="submit" value="Cerrar Sesión" name="Login_CerrarSesion">
                    <input type="submit" value="Home" name="home">
                </form>
                <?
            }else{
                ?>
                <form action="" method="post">
                    <input type="submit" value="login" name="ir_login">
                </form>
                <?
            }
            ?>
            </div>
        </div>
    </nav>
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