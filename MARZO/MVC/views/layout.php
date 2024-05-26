<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="<?echo CSS.'botones.css'?>">
    <!-- Asegúrate de incluir el CSS de Bootstrap Icons en tu proyecto -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">

    <style>
        tr, td, th {
            border: 1px solid black;
            text-align: center;
        }
      .card-body,
      .card-text {
          margin: 0;
          padding: 0;
      }

      /* CSS para ajustar la altura si es necesario */
      .card {
          height: auto; /* O ajusta la altura según sea necesario */
      }
      .btn-no-border {
        border: none;
        padding: 0;
        background: none;
    }

    .btn-no-border img {
        display: block;
    }

    </style>
</head>
<body> 

                            
    <div class="container">
    <div class="row justify-content-center">
            <?
                // echo $_SESSION['vista'];
                // echo "<br>";
                // echo $_SESSION['controlador'];
            ?>
                <div class="col-md-6 mt-4">
                    <img src="<?php echo IMG . 'titulo.png'; ?>" class="img-fluid" alt="Imagen centrada">
                </div>
            </div>
            <header class="">
        <div class="row">
            <form action="" method="post" class="col-2">
                <div class="">
                    <button type="submit" class="rounded btn-no-border" name="ir_home">
                        <img src="<?php echo IMG . 'nuevoLogo.png'; ?>" class="card-img-top img-fluid" alt="Imagen" style="width: 150px;">
                    </button>
                </div>
            </form>

            <div class="col-6 d-flex align-items-center justify-content-evenly">
                <form>
                    <input type="submit" class="btn btn-dark rounded-pill  fst-italic fw-bold text-white " value="Cápsula 1">
                </form>
                <form>
                    <input type="submit" class="btn btn-dark rounded-pill  fst-italic fw-bold text-white " value="Cápsula 2">
                </form>     

                <form class="d-flex ms-5 search-container" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-dark" type="submit">Buscar</button>
                </form>
            </div>

            <div class="col-4 d-flex align-items-center justify-content-evenly button-group">
                <?php if (validado()) { ?>
                    <form action="" method="post" class="ms-1 mx-3">
                        <button type="submit" name="ir_carrito" class="btn btn-dark rounded-pill fst-italic fw-bold text-white button-large">
                            <i class="bi bi-cart"></i> 
                        </button>
                        <button type="submit" name="ver_usuario" class="btn btn-dark rounded-pill fst-italic fw-bold text-white button-large">
                            <i class="bi bi-person"></i> <!-- Icono de usuario -->
                        </button>
                        <button type="submit" name="Login_CerrarSesion" class="btn btn-dark rounded-pill fst-italic fw-bold text-white button-large">
                            <i class="bi bi-box-arrow-right"></i> <!-- Icono de log out -->
                        </button>
                    </form>
                <?php } else { ?>
                    <form action="" method="post" class="ms-2">
                        <input type="submit" value="Login" name="ir_login" class="btn btn-link fst-italic fw-bold text-white ">
                    </form>
                <?php } ?>
            </div>
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
    </div>
    <footer class="bg-dark text-white mt-5">
        <div class="container p-4">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Sobre Nosotros</h5>
                    <p>
                        Somos una tienda especializada en figuras de Warhammer, ofreciendo una gran variedad de productos para todos los entusiastas de este fascinante hobby.
                    </p>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Enlaces Rápidos</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Inicio</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Tienda</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Contacto</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Sobre Nosotros</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Contacta con Nosotros</h5>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <a href="#!" class="text-white">Email: info@warhammerstore.com</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Teléfono: +34 123 456 789</a>
                        </li>
                        <li>
                            <a href="#!" class="text-white">Dirección: Calle Falsa 123, Madrid</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="text-uppercase">Síguenos</h5>
                    <ul class="list-unstyled d-flex">
                        <li>
                            <a href="#!" class="text-white me-3"><i class="fab fa-facebook-f"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="text-white me-3"><i class="fab fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#!" class="text-white me-3"><i class="fab fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024 Warhammer Store | Todos los derechos reservados
        </div>
    </footer>
    </div>
    <script src="<?php echo JS; ?>card.js"></script>
</body>
</html>