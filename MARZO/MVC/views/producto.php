<?php
    $producto = $_SESSION['productoElegido'];
    $esAdmin = ($_SESSION['usuario']['IdRol'] == 1 || $_SESSION['usuario']['IdRol'] == 2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?echo CSS.'botonesProducto.css'?>">
    <style>


    </style>
</head>
<body>
    

    <div class="container my-5">
    <div class="row gx-5 justify-content-around border border-dark" style="min-height: 80vh; align-items: center;">
        <div class="col-5 mt-2">
            <img src="<?php echo IMG . $producto[0]->RutaImg; ?>" class="img-fluid rounded" alt="<?php echo $producto[0]->Nombre; ?>">
        </div>
        <div class="col-5 text-center mt-5">
            <h2 class="text-uppercase" style="color: #E60000;"><?php echo $producto[0]->Nombre; ?></h2>
            <p style="font-size: 1.2em;"><?php echo $producto[0]->Descripcion; ?></p>
            <p style="font-size: 1.5em; font-weight: bold;">Precio: <?php echo $producto[0]->Precio; ?> €</p>
            <div class="row">
                <form action="" method="post" class="mb-3">
                    <input type="hidden" name="producto_id" value="<?php echo $producto[0]->ID; ?>">

                    <?php if ($esAdmin): ?>
                        <h3 class="text text-center">Modificar Producto</h3>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <textarea id="descripcion" name="producto_Descripcion" class="form-control" rows="10"><?php echo $producto[0]->Descripcion; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" id="precio" name="producto_Precio" class="form-control" value="<?php echo $producto[0]->Precio; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_stock" class="form-label">Cantidad en Stock:</label>
                            <input type="number" id="cantidad_stock" name="cantidad_stock" class="form-control" min="0" value="<?php echo $producto[0]->CantidadStock; ?>">
                        </div>
                        <div class="row d-flex justify-content-center mb-3">
                            <input class="gradient-green-button w-50 ms-auto" type="submit" value="Guardar cambios" name="producto_cambio">
                            <input class="gradient-button w-25 mx-auto btn-dark" type="submit" value="Dar De baja" name="producto_borrar">
                        </div>
                    <?php else: ?>
                        <div class="mb-3">
                            <label for="cantidad" class="form-label">Cantidad:</label>
                            <input type="number" id="cantidad" name="unidades" class="form-control" min="1" value="1">
                        </div>
                    <?php endif; ?>

                    <div class="row d-flex justify-content-center">
                        <input class="gradient-blue-button w-25 ms-auto" type="submit" name="ir_carrito_compra" value="Carrito">
                        <input class="gradient-yellow-button w-25 mx-auto text-white" type="submit" value="Comprar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <hr>
                <h3>Comentarios:</h3>
                <div class="card">
                    <div class="card-body">
                        <div class="media ms-5 mt-3">
                            <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario1" style="width:60px;">
                            <div class="media ms-5 mt-3-body">
                                <h5 class="mt-0">Usuario1</h5>
                                <p>¡Excelente producto! Lo recomiendo.</p>
                            </div>
                        </div>
                        <div class="media ms-5 mt-3">
                            <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario2" style="width:60px;">
                            <div class="media ms-5 mt-3-body">
                                <h5 class="mt-0">Usuario2</h5>
                                <p>Buena calidad, pero el precio es un poco alto.</p>
                            </div>
                        </div>
                        <div class="media ms-5 mt-3">
                            <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario3" style="width:60px;">
                            <div class="media ms-5 mt-3-body">
                                <h5 class="mt-0">Usuario3</h5>
                                <p>Me encanta, lo volvería a comprar.</p>
                            </div>
                        </div>
                        <div class="media ms-5 mt-3">
                            <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario4" style="width:60px;">
                            <div class="media ms-5 mt-3-body">
                                <h5 class="mt-0">Usuario4</h5>
                                <p>No estoy seguro de la calidad, pero tiene buen aspecto.</p>
                            </div>
                        </div>
                        <div class="media ms-5 mt-3">
                            <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario5" style="width:60px;">
                            <div class="media ms-5 mt-3-body">
                                <h5 class="mt-0">Usuario5</h5>
                                <p>Excelente servicio al cliente.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    </div>
</body>
</html>


    
