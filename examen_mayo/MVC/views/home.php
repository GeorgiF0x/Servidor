<?
    // $esAdmin = ($_SESSION['usuario']['IdRol'] == 1 || $_SESSION['usuario']['IdRol'] == 2);
    // echo "<pre>";
    // print_r($_SESSION['productos']);
    $partidos=$_SESSION['partidos'];
?>
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
    

    
    
    <div class="container">
        <div class="text text-center mt-5">
            <h1 class="fw-bold">ESTO ES EL HOME</h1>
        </div>
        <table class="mx-5">
        <thead>
            <th>Id</th>
            <th>jug1</th>
            <th>jug2</th>
            <th>fecha</th>
            <th>resultado</th>
            <?
            if($_SESSION['usuario']['perfil']=="admin"){
                echo "<th>Modificar</th>";
                echo "<th>Eliminar</th>";
            }
            ?>

        </thead>
        <tbody>
        <?php
        foreach ($partidos as $partido) {
            echo "<tr>";
            echo "<td>" . $partido->id . "</td>";
            echo "<td>" . $partido->jug1 . "</td>";
            echo "<td>" . $partido->jug2 . "</td>";
            echo "<td>" . $partido->fecha . "</td>";
            echo "<td>" . $partido->resultado . "</td>";
            // Botón para eliminar el partido
            if($_SESSION['usuario']['perfil']=="admin"){
                echo "<td>
                <form action='' method='post'>
                <input type='hidden' name='partidoId' value='" . $partido->id . "'>
                <input type='submit' value='modificar partido' name='modificar_partido'>
                </form>
                </td>";
                echo "<td>
                        <form action='' method='post'>
                            <input type='hidden' name='partidoId' value='" . $partido->id . "'>
                            <input type='submit' value='Eliminar partido' name='eliminar_partido'>
                        </form>
                    </td>";
                echo "</tr>";
            }
        }
    ?>
        </tbody>
    </table>
        
        <?
           if($_SESSION['usuario']['perfil']=="admin"){
        ?>
         <form action='' method='post' class="mt-3">
                <input type='submit' value='Nuevo Partido' class="btn btn-dark" name='add_partido'>
        </form>
        <?
        }
        ?>
    </div>




</div>

</body>
</html>
