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
            </div>
            <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="<?php echo IMG . 'LogoTienda.png'; ?>" class="card-img-top img-fluid" alt="Imagen" style="width: 150px;">
    </a>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav  mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="#">Item 1</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Item 2</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Item 3</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Item 4</a>
        </li>
        <div class="d-flex">
          <?php if (validado()) { ?>
            <form action="" method="post" class="ms-2">
              <input type="submit" value="Cerrar Sesión" name="Login_CerrarSesion" class="btn btn-link">
              <input type="submit" value="Home" name="home" class="btn btn-link">
            </form>
          <?php } else { ?>
            <form action="" method="post" class="ms-2">
              <input type="submit" value="Login" name="ir_login" class="btn btn-link">
            </form>
          <?php } ?>
        </div>
      </ul>
    </div>
  </nav>
</div>

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