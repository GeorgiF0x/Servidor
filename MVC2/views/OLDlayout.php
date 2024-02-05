
<?php
require_once('./config/config.php');

//verificarBDD();

if (isset($_SESSION['usuario_id'])) {
    // Hay una sesión activa, mostrar botones para cerrar sesión y perfil
    $cerrarSesionLink = './funciones/cerrarSesion.php'; // Ajusta la URL según tus necesidades
    $perfilLink = './paginas/perfil.php'; // Ajusta la URL según tus necesidades
} else {
    // No hay una sesión activa, no es necesario mostrar botones
    $cerrarSesionLink = '';
    $perfilLink = '';
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>tienda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
<div class="row bg-primary text-white rounded-pill ">
    <span class="text-center">Georgi Borisov MVC</span>
</div>

    <div class="container principal">
        <div class="container principal">
        <header class="row">
            <div class="col-8 nav">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img class="logo img-responsive" src="./webroot/Media/tiburonpng.png" alt="" width="270px">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                                                </button>
                                                <div class="collapse navbar-collapse" id="navbarNav">
                                                    <ul class="navbar-nav">
                                                        <li class="nav-item">
                                                            <a class="nav-link active text-primary" href="#">Inicio</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-primary" href="#">Nutrición</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-primary" href="#">Ropa</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-primary" href="#">Barritas</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link text-primary" href="#">Snacks</a>
                                                        </li>
                                                    </ul>
                                                    <form method="POST" class="d-flex">
                                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                                        <button class="btn btn-outline-primary" type="button">Search</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </nav>
                                    </div>
                                    <div class="col-3 bg-white  d-flex justify-content-around align-items-center">
                            <?php if (isset($_SESSION['usuario_id'])) : ?>
                                <!--  botones para cerrar sesión y ver perfil -->
                                <div class="d-flex justify-content-around">
                                    <a href="./paginas/todosPedidos.php" class="btn btn-primary btn-sm  me-2 text-decoration-none bg-white border-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="45%" height="45%" fill="#0275d8"
                                            class="bi mx-2 bi-bag-check-fill" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.304a.5.5 0 0 0-.708-.708L7.5 10.793 6.304 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                        </svg>
                                    </a>
                                    <a href="<?php echo $perfilLink; ?>" class=" btn-sm my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="55%" height="55%" fill="#0275d8"
                                            class="bi mx-2 bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                        </svg>
                                    </a>
                                    <a href="?logout" class=" btn-sm my-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="55%" height="55%" fill="red" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                                    </svg>
                                    </a>
                                </div>
                            <?php endif; ?>
                            </div>
                            </header>
                            </div>
                                </header>
                            </div>
                                <div class="container contenido-vista">
                                    
                            <?php
                                // Incluir la vista según el valor de $_SESSION['vista']
                                if (isset($_SESSION['vista'])) {
                                    require_once(VIEW. $_SESSION['vista']);
                                } else {
                                    // Si no hay vista definida en la sesión, se carga la vista 'home.php'
                                    require_once(VIEW. 'main.php');
                                }
                            ?>

                        </div>
                        <div class="container-fluid">
                            <footer class="row bg-primary text-white mt-5 p-4 mb-0">
                                <div class="col-3 d-flex flex-column linkFooter">
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="text-uppercase text-white mb-4">TARJETAS DE REGALO</h6>
                                    </a>
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="text-uppercase text-white mb-4">BUSCAR UNA TIENDA</h6>
                                    </a>
                                    <a href="#" class="text-decoration-none">
                                        <h6 class="text-uppercase text-white mb-4">NIKE JOURNAL</h6>
                                    </a>
                                    <a href="#" class="text-decoration-none">
                                    </a> <!-- Agregar etiqueta de cierre faltante -->
                                <?php if (isset($_SESSION['usuario_id'])) : ?>
                                    <!--  botones para cerrar sesión y ver perfil -->
                                    <div class="d-flex justify-content-around">
                                        <a href="./paginas/todosPedidos.php" class="btn btn-primary btn-sm  me-2 text-decoration-none bg-white border-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="45%" height="45%" fill="#0275d8"
                                                class="bi mx-2 bi-bag-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.304a.5.5 0 0 0-.708-.708L7.5 10.793 6.304 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                            </svg>
                                        </a>
                                        <a href="<?php echo $perfilLink; ?>" class=" btn-sm my-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="55%" height="55%" fill="#0275d8"
                                                class="bi mx-2 bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg>
                                        </a>
                                        <a href="?logout" class=" btn-sm my-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="55%" height="55%" fill="red" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                                        </svg>
                                        </a>
                                    </div>
                                <?php else : ?>
                                    <!-- Mostrar botones para iniciar sesión -->
                                    <div class="d-flex mt-3">
                                        <a href="./paginas/todosPedidos.php" class="btn btn-primary  bg-white border-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="55%" height="55%" fill="#0275d8"
                                                class="bi mx-2 bi-bag-check-fill" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd"
                                                    d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.304a.5.5 0 0 0-.708-.708L7.5 10.793 6.304 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                                            </svg>
                                        </a>
                                        <a href="paginas/login.php" class="btn btn-primary  bg-white border-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="55%" height="55%" fill="#0275d8"
                                                class="bi mx-2 bi-person-circle" viewBox="0 0 16 16">
                                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                                                <path fill-rule="evenodd"
                                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                                            </svg>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                </div>
                            <div class="container-fluid">
                                    <footer class="row bg-primary text-white mt-5 p-4 mb-0">
                                    <div class="col-3 d-flex flex-column linkFooter">
                                        <a href="#" class="text-decoration-none">
                                            <h6 class="text-uppercase text-white mb-4">TARJETAS DE REGALO</h6>
                                        </a>
                                        <a href="#" class="text-decoration-none">
                                            <h6 class="text-uppercase text-white mb-4">BUSCAR UNA TIENDA</h6>
                                        </a>
                                        <a href="#" class="text-decoration-none">
                                            <h6 class="text-uppercase text-white mb-4">NIKE JOURNAL</h6>
                                        </a>
                                        <a href="#" class="text-decoration-none">
                                            <h6 class="text-uppercase text-white mb-4">DESCUENTO PARA ESTUDIANTES</h6>
                                        </a>
                                        <a href="#" class="text-decoration-none">
                                            <h6 class="text-uppercase text-white mb-4">COMENTARIOS</h6>
                                        </a>
                                        <a href="#" class="text-decoration-none">
                                            <h6 class="text-uppercase text-white mb-4">CÓDIGOS PROMOCIONALES</h6>
                                        </a>
                                    </div>

                                    <div class="col-3 accordion" id="accordionExample1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingOne1">
                                                <button class="accordion-button bg-primary text-white fw-bold" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseOne1" aria-expanded="false"
                                                    aria-controls="collapseOne1">
                                                    AYUDA
                                                </button>
                                            </h2>
                                            <div id="collapseOne1" class="accordion-collapse collapse" aria-labelledby="headingOne1"
                                                data-bs-parent="#accordionExample1">
                                                <div class="accordion-body bg-primary">
                                                    <a href="#" class="text-decoration-none text-white">
                                                        <p class="mb-0">Estado del pedido</p>
                                                        <p class="mb-0">Envíos y entregas</p>
                                                        <p class="mb-0">Devoluciones</p>
                                                        <p class="mb-0">Opciones de pago</p>
                                                        <p class="mb-0">Contacto</p>
                                                        <p class="mb-0">Ayuda con los códigos promocionales de Nike</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Otros elementos del footer -->

                                    <div class="col-3 accordion" id="accordionExample2">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingTwo2">
                                                <button class="accordion-button bg-primary text-white fw-bold" type="button"
                                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo2" aria-expanded="false"
                                                    aria-controls="collapseTwo2">
                            ACERCA DE NIKE
                        </button>
                    </h2>
                    <div id="collapseTwo2" class="accordion-collapse collapse" aria-labelledby="headingTwo2"
                        data-bs-parent="#accordionExample2">
                        <div class="accordion-body bg-primary">
                            <a href="#" class="text-decoration-none text-white">
                                <p class="mb-0">Novedades</p>
                                <p class="mb-0">Trabaja con nosotros</p>
                                <p class="mb-0">Inversores</p>
                                <p class="mb-0">Sostenibilidad</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Otros elementos del footer -->

            <div class="col-3 accordion" id="accordionExample3">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree3">
                        <button class="accordion-button bg-primary text-white fw-bold" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseThree3" aria-expanded="false"
                            aria-controls="collapseThree3">
                            UNETE A NOSOTROS
                        </button>
                    </h2>
                    <div id="collapseThree3" class="accordion-collapse collapse" aria-labelledby="headingThree3"
                        data-bs-parent="#accordionExample3">
                        <div class="accordion-body bg-primary">
                            <a href="#" class="text-decoration-none text-white">
                                <p class="mb-0">Nike app</p>
                                <p class="mb-0">Nike Run Club App</p>
                                <p class="mb-0">Nike Training Club App</p>
                                <p class="mb-0">SNKRS</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="js/modal.js"></script>
</body>
</html>

