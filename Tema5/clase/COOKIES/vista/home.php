<?
    require("../funciones/funcionesBD.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Img</th>
            <th>ver</th>
        </thead>
        <tbody>
            <?php
                $arrayProductos=findAll();
                foreach ($arrayProductos as $producto) {
                    echo "<tr>";
                    echo "<td>".$producto['nombre']."</td>";
                    echo "<td>".substr($producto['descripcion'], 0, 20)."</td>";
                    echo "<td><img src='../".$producto['baja']."'></td>";
                    echo "<td><a href='verProducto.php?id=".$producto['codigo']."' >Ver</td>";
                    echo "</tr>";
                }

            ?>
        </tbody>
    </table>

    <div class="der">
        <h1>Ultimos visitados</h1>
        <?
            if(!empty($_COOKIE)){
                $arrayReverse= array_reverse($_COOKIE);
                if (!empty($arrayReverse)){
                    $count=1;
                    foreach ($arrayReverse['id'] as $id) {
                        $producto = findByID($id);
                        echo "<h2>".$producto['nombre']."</h2>";
                        echo "<p>".$producto['descripcion']."</p>";
                        echo "<td><a href='verProducto.php?id=".$producto['codigo']."' ><img src='../".$producto['alta']."'></td>";
                        $count++;
                        if($count>= 4) {
                            break;
                        }
                    }
                  }else{
                  echo "No hay productos visitados";
                  }
            }else{
               echo "<h3>no se ha visitado ningun producto</h3>";
            }
        ?>
    </div>
    
</body>
</html>