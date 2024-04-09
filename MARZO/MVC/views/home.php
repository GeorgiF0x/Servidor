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
<h1 class="text-center mt-3">ESTO ES EL HOME</h1>
<?php

$productos = $_SESSION['productos'];
echo '<div class="row">';
foreach ($productos as $producto) {
    echo '<article class="col-md-2 mb-4">';
    echo '<div class="card" style="width: 18rem;">';
    echo '<img src="' . IMG . 'productoDefault.jpg" class="card-img-top img-fluid" alt="' . $producto->Nombre . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title fw-bold">' . $producto->Nombre . '</h5>';
    echo '<p class="card-text">' . $producto->Descripcion . '</p>';
    echo '<form method="POST" class="d-flex justify-content-between align-items-center" >';
    echo '<p class="fw-bold mb-0">Precio: €' . number_format($producto->Precio, 2) . '</p>';
    echo '<input type="hidden" name="producto_id" value="' . $producto->Id . '">';
    echo '<input type="submit" name="ir_producto" value="Comprar" class="btn btn-outline-primary">';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</article>';
}
echo '</div>';
?>

</body>
</html>