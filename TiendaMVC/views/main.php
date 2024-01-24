<div class="container">
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
    
              
                <section class="row d-flex justify-content-start mt-5 mb-4">
        <?php
            PintarProductos();
            if (isAdmin()) {
                echo '<div class="col-md-12 mt-4 text-center">';
                echo '<a href="./paginas/addProducto.php" class="btn btn-primary btn-lg">Añadir Producto</a>';
                echo '</div>';
            }
        ?>
        
    </section>
    
            </main>
        </div>