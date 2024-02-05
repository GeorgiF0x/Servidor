<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="row bg-primary container.fluid">
        <span class="text text-center text-white fw-bold">Georgi Borisov MVC  </span>
    </div>
    <div class="container principal">
        <header class="row">
            <div class="col-8 nav">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="./index.php">
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
                        <a href="./paginas/todosPedidos.php"
                            class="btn btn-primary btn-sm  me-2 text-decoration-none bg-white border-white">
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="55%" height="55%" fill="red"
                                class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                <path fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
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
        </header>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
