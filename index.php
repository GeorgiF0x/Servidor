<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Página con Bootstrap 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .logo{
            width: 20%;
            height: auto;
            border-radius: 50%;
        }

        nav a {
            color: white;
            font: italic;
        }

        .cosecha{
            border-radius: 30%;
        }

    </style>
</head>
<body>
    
    <header >
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #000000;"> 
            <div class="container-fluid">
                <img src="imagenes/logo.png" alt="" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <!-- No se incluye el icono aquí -->
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item mx-5">
                            <a class="nav-link fw-bold fst-italic" aria-current="page" href="index.html">Tema 1</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link fw-bold fst-italic" href="#">Tema 2</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link fw-bold fst-italic" href="#">Tema 3</a>
                        </li>
                        <li class="nav-item mx-5">
                            <a class="nav-link fw-bold fst-italic" href="#">Tema 4</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link fw-bold fst-italic" href="#">Tema 5</a>
                        </li>
                        <li class="nav-item mx-4">
                            <a class="nav-link fw-bold fst-italic" href="#">Tema 6</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>             
    </header>
    <main class="container">
        <h1 class="text-center fw-bold fst-italic mt-3 mb-3" style="color: black;">Ejercicios</h1>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center fs-4 fw-bold fst-italic ">
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal-bookmark me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                    </svg>
              

                        Tarea 1
 
                </div>
                <a href="Tema2/Tareas/TareaIdiomas/eligeIdioma.html" class="btn btn-dark text-white">ver tarea</a>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center fs-4 fw-bold fst-italic" >
                <div class="d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-journal-bookmark me-2" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                    </svg>
                    Tarea 2
                </div>
                <a href="Tema2/Tareas/Tarea 3/tarea3.1.php" class="btn btn-dark text-white">Ver tarea</a>
            </li>
        </ul>
        <img   src="imagenes/cosecha_propia.png" alt="Imagen" class="img-fluid mt-4 cosecha mt-3">
        <blockquote class="blockquote text-center">
            <p class="fs-5 fw-bold fst-italic">"Cosecha propia"</p>
            <footer class="blockquote-footer">Un señor  gallego</footer>
        </blockquote>
    </main>
           
    


        
    
    



</body>
</html>

<?php


$ruta = $_SERVER['SCRIPT_FILENAME'];
echo "<a href=http://".$_SERVER['SERVER_ADDR']."/verCodigo.php?ruta=".$ruta.">Ver Contenido</a>";

