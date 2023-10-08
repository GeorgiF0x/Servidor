    <?php
        include("/var/www/Servidor/Fragmentos/header.html");
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Título</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>

    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg justify-content-center">
        <ul class="navbar-nav">
            <li class="nav-item ">
                <a href="./tarea3.1.php" class="btn btn-dark text-white">Ejercicio 1</a>
            </li>
            <li class="nav-item mx-3">
            <a href="./pagina3.2.php" class="btn btn-dark text-white">Ejercicio 2, 3 y 4</a>
            </li>
        </ul>
    </nav>
    <div class="text-center mt-3">
        <p class=fw-bold fst-italic>
            2. Crea una página a la que se le pase por url una variable con el nombre que quieras y
            muestre el valor de la variable, el tipo, si es numérico o no y si lo es, si es entero o float. (No
            hace falta usar if)<br>
            <a href="tarea3.2.php?variable=georgi" class="btn btn-dark btn-lg" style="color: white;">PASAR VARIABLE ejercicio2</a>
        </p>
        <p class=fw-bold fst-italic>
            3. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) y muestre
            el día de la semana de dicho día. (Por defecto, dale el valor de 03/10/2023) <br>
            <a href="tarea3.2.php?anio=2023&mes=10&dia=03" class="btn btn-dark btn-lg" style="color: white;">PASAR VARIABLE ejercicio3</a>
        </p>
        <p class=fw-bold fst-italic>

            4. Crea una página en la que se le pase como parámetros en la URL (ano, mes y día) de dos
            personas y muestre las fechas de nacimiento de ambos y la diferencia de edad en años. <br>
            <a href="Tarea3.4.php?c1anio=1998&c1mes=08&c1dia=21&c2anio=1980&c2mes=02&c2dia=10" class="btn btn-dark btn-lg" style="color: white;">PASAR VARIABLE ejercicio 4</a><br><br>
        </p>

             
    </div>


</body>
</html>
