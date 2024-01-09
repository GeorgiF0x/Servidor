    <?php
    require("../funciones/funcionesBD.php");
    require("../funciones/funcionesSesion.php");
    session_start();

    // Verificar si hay una sesión activa
    if (isset($_SESSION['usuario_id'])) {
        $cerrarSesionLink = './funciones/cerrarSesion.php';
        $perfilLink = './perfil.php';
    } else {
        $cerrarSesionLink = '';
        $perfilLink = '';
    }

    // Procesar cerrar sesión
    if (isset($_REQUEST['logout'])) {
        session_destroy();
        header("Location: ./login.php");
        exit();
    }

    // Verificar si el usuario está autenticado
    if (!estaAutenticado()) {
        header("Location: ./login.php");
        exit();
    }
    $usuarioId = $_SESSION['usuario_id'];
    
    // Obtener información del producto si se proporciona un ID
    if (isset($_REQUEST['producto_id'])) {
        $producto_id = $_REQUEST['producto_id'];
        $producto = getInfoProducto($producto_id);

        // Verificar si se encontró el producto
        if ($producto) {
            if (isset($_POST['comprar'])) {
                // Procesar la acción de comprar
                $cantidadComprar = $_POST['cantidad'];
                $usuarioId = $_SESSION['usuario_id'];
                $pedido_id = $_POST['pedido_id'];
                $pedidoRealizado = quitarStock($usuarioId, $producto_id, $cantidadComprar);
                
                if ($pedidoRealizado) {
                    header("Location: ./pedido.php");
                    exit();
                }
            }
            if ($producto['CantidadStock'] > 0) {
    ?>
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title><?php echo $producto['Nombre']; ?></title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                
                </head>
                <body>
            
                <div class="container principal">
            <header class="row">
                <div class="col-8 nav">
                    <nav class="navbar navbar-expand-lg ">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="../index.php">
                                <img class="logo img-responsive" src="../Media/tiburonpng.png" alt="" width="270px">
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a class="nav-link active text-primary" href="./index.php">Inicio</a>
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
                <a href="./todosPedidos.php" class="btn btn-primary btn-sm  me-2 text-decoration-none bg-white border-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45%" height="45%" fill="#0275d8"
                        class="bi mx-2 bi-bag-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.304a.5.5 0 0 0-.708-.708L7.5 10.793 6.304 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                    </svg>
                </a>
                <a href="?logout" class="btn btn-danger btn-sm my-2">Log Out</a>
                <a href="<?php echo $perfilLink; ?>" class="btn btn-primary btn-sm my-2">Perfil</a>
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
    </header>
        </div>
        <main>
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6">
                    <!-- Contenido de la imagen -->
                    <img src="<?php echo $producto['Imagen']; ?>" class="img-fluid" alt="<?php echo $producto['Nombre']; ?>">
                </div>
                <div class="col-md-6">
                    <!-- Contenido del producto -->
                    <h2><?php echo $producto['Nombre']; ?></h2>
                    <p><?php echo $producto['Descripcion']; ?></p>
                    <p>Precio: $<?php echo $producto['Precio']; ?></p>
                    <p>Estado de Stock: <?php echo ($producto['CantidadStock'] > 0) ? 'En Stock' : 'Sin Stock'; ?></p>
                    <?php if ($producto['CantidadStock'] > 0): ?>
                        <p>Unidades disponibles: <?php echo $producto['CantidadStock']; ?></p>
                    <?php endif; ?>

                
                    <form action="producto.php?producto_id=<?php echo $producto_id; ?>" method="post">
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1" max="<?php echo $producto['CantidadStock']; ?>">
                        </div>
                        <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
                        <input type="hidden" name="producto_nombre" value="<?php echo $producto['Nombre']; ?>">
                        <input type="hidden" name="producto_precio" value="<?php echo $producto['Precio']; ?>">

                        <?php
                        // Verificar si el usuario es un moderador o administrador
                        if (isset($_SESSION['rol']) && ($_SESSION['rol'] === 'administrador' || $_SESSION['rol'] === 'moderador')) {
                            // Mostrar los botones de agregar y quitar solo si es un moderador o administrador
                            echo '
                                <input type="hidden" name="albaran_id" value="' . $idDelAlbaran . '">
                                <input type="submit" name="quitarStock" value="Quitar Stock">
                                <input type="submit" name="agregarStock" value="Agregar Stock">
                            ';
                        }
                        ?>
                        <input type="hidden" name="pedido_id" value="<?php echo $pedido_id; ?>">
                        <button type="submit" name="comprar" class="btn btn-primary">Comprar</button>
                    </form>
            </form>
                </div>
            </div>

            <!-- Apartado de comentarios estáticos -->
            <div class="row mt-4">
                <div class="col-md-12">
                    <hr>
                    <h3>Comentarios:</h3>
                    <div class="card">
                        <div class="card-body">
                            <div class="media">
                                <img src="../Media/usuario.jpg" class="mr-3" alt="Usuario1" style="width:60px;">
                                <div class="media-body">
                                    <h5 class="mt-0">Usuario1</h5>
                                    <p>¡Excelente producto! Lo recomiendo.</p>
                                </div>
                            </div>
                            <div class="media">
                                <img src="../Media/usuario.jpg" class="mr-3" alt="Usuario2" style="width:60px;">
                                <div class="media-body">
                                    <h5 class="mt-0">Usuario2</h5>
                                    <p>Buena calidad, pero el precio es un poco alto.</p>
                                </div>
                            </div>
                            <div class="media">
                                <img src="../Media/usuario.jpg" class="mr-3" alt="Usuario3" style="width:60px;">
                                <div class="media-body">
                                    <h5 class="mt-0">Usuario3</h5>
                                    <p>Me encanta, lo volvería a comprar.</p>
                                </div>
                            </div>
                            <div class="media">
                                <img src="../Media/usuario.jpg" class="mr-3" alt="Usuario4" style="width:60px;">
                                <div class="media-body">
                                    <h5 class="mt-0">Usuario4</h5>
                                    <p>No estoy seguro de la calidad, pero tiene buen aspecto.</p>
                                </div>
                            </div>
                            <div class="media">
                                <img src="../Media/usuario.jpg" class="mr-3" alt="Usuario5" style="width:60px;">
                                <div class="media-body">
                                    <h5 class="mt-0">Usuario5</h5>
                                    <p>Excelente servicio al cliente.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main><footer>
        <div class="container-fluid">
            <footer class="row bg-primary text-muted mt-5">
                <div class="d-flex flex-row-reverse ml-4 mb-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white"
                        class="bi mx-2 bi-facebook " viewBox="0 0 16 16">
                        <path
                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.304 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi mx-2 bi-twitter"
                        viewBox="0 0 16 16">
                        <path
                            d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi mx-2 bi-youtube"
                        viewBox="0 0 16 16">
                        <path
                            d="M8.051 1.999h.089c.822.003 4.987.033 6.11.330a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.230 1.558a2.007 2.007 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.330h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.007 2.007 0 0 1-1.415-1.419c-.111-.417-.185-.986-.230-1.558L.09 9.82l-.008-.104A31.4 31.4 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.007 2.007 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A99.788 99.788 0 0 1 7.858 2h.193zM6.4 5.209v4.818l4.157-2.408L6.4 5.209z" />
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white"
                        class="bi mx-2 bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.030 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.030.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                    </svg>
                </div>


                <div class="col-3 d-flex flex-column linkFooter ">
                    <a href="#" class="text-decoration-none">
                        <h6 class="text-uppercase text-white  mb-4">
                            TARJETAS DE REGALO
                        </h6>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <h6 class="text-uppercase text-white  mb-4">
                            BUSCAR UNA TIENDA
                        </h6>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <h6 class="text-uppercase text-white  mb-4">
                            NIKE JOURNAL
                        </h6>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <h6 class="text-uppercase text-white  mb-4">
                            DESCUENTO PARA ESTUDIANTES
                        </h6>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <h6 class="text-uppercase text-white mb-4">
                            COMENTARIOS

                        </h6>
                    </a>
                    <a href="#" class="text-decoration-none">
                        <h6 class="text-uppercase text-white  mb-4">
                            CÓDIGOS PROMOCIONALES
                        </h6>
                    </a>





                </div>

                <div class="col-3 accordion " id="accordionExample">
                    <div class="accordion-item ">
                        <h2 class="accordion-header " id="headingOne">
                            <button class="accordion-button bg-primary text-white fw-bold " type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                AYUDA
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-primary">

                                <a href="#" class="text-decoration-none">
                                    <p class=" text-white  mb-4">
                                        Estado del pedido
                                    </p>
                                    <p class=" text-white   mb-4">
                                        Envíos y entregas
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Devoluciones
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Opciones de pago
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Contacto
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Ayuda con los códigos promocionales de Nike
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 accordion " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button bg-primary text-white fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                ACERCA DE NIKE
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-primary">
                                <a href="#" class="text-decoration-none">
                                    <p class=" text-white  mb-4">
                                        Novedades
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Trabaja con nosotros
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Inversores
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Sostenibilidad
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-3 accordion " id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button bg-primary text-white fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                UNETE A NOSOTROS
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body bg-primary ">
                                <a href="#" class="text-decoration-none">
                                    <p class=" text-white  mb-4 ">
                                        Nike app
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Nike Run Club App
                                    </p>
                                    <p class=" text-white  mb-4">
                                        Nike Training Club App
                                    </p>
                                    <p class=" text-white  mb-4">
                                        SNKRS
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
            </footer>
                    </div>
                </body>
                </html>
    <?php
            } else {
                echo "El producto está agotado.";
                exit();
            }
        } else {
            echo "Producto no encontrado";
            exit();
        }
    }
    ?>





