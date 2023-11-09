<?php
    include("./validaciones.php");
    include("/var/www/Servidor/Fragmentos/header.html");
?>

<?php
            if (isset($_GET['rem']) && isset($_GET['oculto'])) {
              $indiceEliminar = $_GET['oculto'];
              eliminarRegistro($indiceEliminar);
          }

          if (isset($_GET['mod']) && isset($_GET['oculto'])) {
            header("Location: ./Modificar.php?indice=" . $_GET['oculto']);
            exit();
        }

        if (isset($_GET['add'])) {
          header("Location: ./Modificar.php?indice=" . $_GET['oculto']);
          exit();
      }
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../css/style.css">
    <style>
    .btn-danger{
          background-image: linear-gradient(to right, #000000, #fc0707);
    }
    .btn-primary{
      font-weight: bolder;
          background-image: linear-gradient(to right, #000000, #fc6907);
    }
    </style>

</head>
<body>

<h1 class="text text-center">Notas</h1>
<div class="container">

    <table class="table border">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope="col">1º EV</th>
          <th scope="col">2º Ev</th>
          <th scope="col">3º Ev</th>
          <th scope="col">Modificar</th>
          <th scope="col">Eliminar</th>
        </tr>

      </thead>
      <tbody>
        <?
            $fp = fopen ("notas.csv","r");
            /*
                Para leer ficheros SCV se le pasa un array donde guarda lo que lee hasta ; y para mostrar el dato se imprime el array con la posicion 0 como clave
                 y seguido del resto como valor segun la cantidad de valores que sean
            */
            echo "<tr>";
            $conta=1;
            while ($ArrayDatos = fgetcsv ($fp, filesize("notas.csv"), ";")) { 
                foreach ($ArrayDatos as $key => $value) {
                    echo "<td> ". $ArrayDatos[$key]. " </td>";
                    if($key==0){
                      $nombre=$value;
                    }
                }
                echo '<form action="" method="get" class="mt-5 text-center mx-5 just"  enctype="multipart/form-data"> ';
                echo "<td> <input type='hidden' name='oculto' value='".$nombre."'";
                echo "<td> <input type='hidden' name='oculto2' value='".$conta."'";
                echo "<td> <input class='btn btn-dark' type='submit' name='mod' value='Modificar'>";
                echo "<td> <input class='btn btn-danger' type='submit' name='rem' value='Eliminar'><td>";
                echo "</form>";
                echo "<tr>";
                $conta++;
            }
            fclose ($fp);
        ?>
      </tbody>
    </table>
    <form action="" method="get" class="mt-5 text-center mx-5 "  enctype="multipart/form-data">
    <input class='btn btn-primary' type='submit' name='add' value='Añadir Campo'><td>

    </form>
</form>
</div>

</body>
</html>