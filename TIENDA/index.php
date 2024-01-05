<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> tienda</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/index.css">
</head>


<body>
    <div class="container principal">
        <header class="row">
            <div class="col-10 nav">
                <nav class="navbar navbar-expand-lg ">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#">
                            <img class="logo img-responsive " src="Media/tiburonpng.png" alt="" width="270px">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link  active text-primary" aria-current="page" href="#">Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-primary" aria-current="page" href="#">Nutricion</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-primary" aria-current="page" href="#">Ropa</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-primary" aria-current="page" href="#">Barritas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-primary" aria-current="page" href="#">Snaks</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-primary" aria-current="page" href="#">Vitaminas</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-primary" aria-current="page" href="#">Vegano</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link  text-primary" aria-current="page" href="#">Oferta</a>
                                </li>
                            </ul>
                            <nav class="navbar ">
                                <div class="container-fluid">
                                    <form class="d-flex" role="search">
                                        <input class="form-control me-2" type="search" placeholder="Search"
                                            aria-label="Search">
                                        <button class="btn btn-outline-primary " type="submit">Search</button>
                                    </form>
                                </div>
                            </nav>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-2 .bg-secondary d-flex   justify-content-center login">
                <button type="button" class="btn ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="45%" height="45%" fill="#0275d8"
                        class="bi mx-2 bi-bag-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.304a.5.5 0 0 0-.708-.708L7.5 10.793 6.304 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                    </svg>
                </button>
                <button type="button" class="btn" id="Login">
                    <a href="paginas/login.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="45%" height="45%" fill="#0275d8"
                            class="bi mx-2 bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                </button>
                </a>
            </div>
        </header>
        <main class="row mt-3 mb-3">
            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="Media/carrusel1-1.webp" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="Media/carrusel1-2.webp" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="Media/carusel1-3.webp" class="d-block w-100 " alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



            <div id="carouselExampleCaptions" class="carousel slide mt-5" data-bs-ride="false">
                <legend class="fw-bold">Categorias</legend>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-4 carusel2">
                                <img src="Media/carrusel2-1.webp" class="d-block w-100" alt="...">
                                <h5 class="text-center">Proteinas</h5>
                            </div>
                            <div class="col-lg-4 carusel2">
                                <img src="Media/carrusel2-2.webp" class="d-block w-100" alt="...">
                                <h5 class="text-center">Creatina</h5>
                            </div>
                            <div class="col-lg-4 carusel2">
                                <img src="Media/carrusel2-3.webp" class="d-block w-100" alt="...">
                                <h5 class="text-center">Barritas</h5>
                            </div>
                        </div>
                    </div>

                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-lg-4 carusel2">
                                <img src="Media/carrusel2-4.webp" class="d-block w-100" alt="...">
                                <h5 class="text-center">Vegano</h5>
                            </div>
                            <div class="col-lg-4 carusel2">
                                <img src="Media/carrusel2-5.webp" class="d-block w-100" alt="...">
                                <h5 class="text-center">Ropa</h5>
                            </div>
                            <div class="col-lg-4 carusel2">
                                <img src="Media/vitamina_bien.webp" class="d-block w-100" alt="...">
                                <h5 class="text-center">Vitaminas</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev " type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon control1 " aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next " type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon control2" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>



         <section class="row d-flex justify-content-start mt-5">
        <legend class="fw-bold">Productos más populares</legend>

                <article class=" mx-auto col-xl-2   ">
                    <div class="card" style="width: 18rem;">
                        <img src="Media/16267-sotya-100-protein-1000g-v3.webp" class="card-img-top img-responsive"
                            alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold ">Proteina whey sabor fresa</h5>
                            <p class="card-text">Proteina whey con intenso sabor a fresa</p>
                            <form class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary pull-right" type="submit">Comprar</button>
                            </form>
                        </div>
                    </div>
                </article>
                
                <article class=" mx-auto col-xl-2   ">
                    <div class="card  " style="width: 18rem;">
                        <img src="Media/big-only-whey-cacaolat-edicion-limitada.webp"
                            class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Proteina Whey Cacaolat </h5>
                            <p class="card-text">Proteina Whey con sabor de batido de chocolate cacaolat</p>
                            <form class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary pull-right" type="submit">Comprar</button>
                             </form>
                        </div>
                </article>

                <article class=" mx-auto col-xl-2   ">
                    <div class="card" style="width: 18rem;">
                        <img src="Media/Caseina.jpg" class="card-img-top img-responsive" alt="..." height="287px">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Caseina Gold Standard</h5>
                            <p class="card-text">Caseina sabor Vainilla
                                100% caseína micelar de liberación sostenida.
                            </p>
                            <form class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary pull-right" type="submit">Comprar</button>
                            </form>
                        </div>
                </article>
                <article class=" mx-auto col-xl-2   ">
                    <div class="card" style="width: 18rem;">
                        <img src="Media/chocolate.jpg" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Proteina Whey Sabor Chocolate</h5>
                            <p class="card-text">Proteina  100% sabor chocolate</p>
                            <form class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary pull-right" type="submit">Comprar</button>
                            </form>
                        </div>
                </article>
            </section>
            <section class="row mt-4">
                <article class=" mx-auto col-xl-2   ">
                    <div class="card" style="width: 18rem;">
                        <img src="Media/clear.jpg" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Whey iso</h5>
                            <p class="card-text">Proteina de suero de leche whey iso baja en grasas y carbohidratos</p>
                            <form class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary pull-right" type="submit">Comprar</button>
                            </form>
                        </div>
                </article>
                <article class=" mx-auto col-xl-2   ">
                    <div class="card" style="width: 18rem;">
                        <img src="Media/isoWhey.jpg" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Proteina Whey Iso zero</h5>
                            <p class="card-text">Proteina iso con cero azucares añadidos.</p>
                            <form class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary pull-right" type="submit">Comprar</button>
                            </form>
                        </div>
                </article>

                <article class=" se mx-auto col-xl-2   ">
                    <div class="card" style="width: 18rem;">
                        <img src="Media/serious-mass-6-lb-272-kg.webp" class="card-img-top img-responsive" alt="...">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Serious Mass Gainer ON Nutrition</h5>
                            <p class="card-text">Aumentador de masa con proteina</p>
                            <form class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary pull-right" type="submit">Comprar</button>
                            </form>
                        </div>
                </article>
                <article class=" mx-auto col-xl-2   ">
                    <div class="card" style="width: 18rem;">
                        <img src="Media/vegun-nutrition-veganmass-300x361.png" class="card-img-top img-responsive"
                            alt="..." height="287px">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Vegan Mass Gainer</h5>
                            <p class="card-text">Aumentador de masa sin ingredintes de origen animal</p>
                            <form class="d-flex justify-content-end">
                                <button class="btn btn-outline-primary pull-right" type="submit">Comprar</button>
                            </form>
                        </div>
                </article>
            </section>


            <section class=" mx-auto mt-4">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="Media/carrusel-3-1.webp" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="Media/carrusel3-2.webp" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="Media/carrusel-3-3.webp" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </section>

        </main>
        <!-- FOTER -->
    </div>

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



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <script src="js/modal.js"></script>
    </div>
</body>

</html>