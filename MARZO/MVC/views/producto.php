<?php
    $producto = $_SESSION['productoElegido'];
    $esAdmin = ($_SESSION['usuario']['IdRol'] == 1 || $_SESSION['usuario']['IdRol'] == 2);
?>

<div class="container my-5">
    <div class="row gx-5 justify-content-around">
        <div class="col-5">
            <img src="<?php echo IMG . 'productoDefault.jpg'; ?>" class="img-fluid" alt="<?php echo $producto[0]->Nombre; ?>">
        </div>
        <div class="col-5 text-center">
            <h2><?php echo $producto[0]->Nombre; ?></h2>
            <p><?php echo $producto[0]->Descripcion; ?></p>
            <p>Precio: <?php echo $producto[0]->Precio; ?></p>
            <div class="row">
                <form action="" method="post">
                    <input type="hidden" name="producto_id" value="<?php echo $producto[0]->ID; ?>">
                    <div class="mb-3 d-flex  flex-column  align-items-center  justify-content-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <label for="cantidad" class="form-label me-2">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" value="1" style="width: 80px;">
                        </div>
                    </div>
                    <?php if ($esAdmin): ?>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <input type="text" id="descripcion" name="producto_Descripcion" class="form-control" value="<?php echo $producto[0]->Descripcion; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio:</label>
                            <input type="number" id="precio" name="producto_Precio" class="form-control" min="0" value="<?php echo $producto[0]->Precio; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_stock" class="form-label">Cantidad en Stock:</label>
                            <input type="number" id="cantidad_stock" name="cantidad_stock" class="form-control" min="0" value="<?php echo $producto[0]->CantidadStock; ?>">
                        </div>
                        <div class="row d-flex justify-content-center mb-3">
                            <input class="btn btn-success w-25 ms-auto" type="submit" value="Guardar cambios">
                            <input class="btn btn-success w-25 mx-auto " type="submit" value="Dar De baja">
                        </div>
                    <?php endif; ?>
                    <div class="row d-flex justify-content-center">
                        <input class="btn btn-danger w-25 ms-auto" type="submit" value="Carrito">
                        <input class="btn btn-primary w-25 mx-auto " type="submit" value="Comprar">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row mt-4">
    <div class="col-md-12">
        <hr>
        <h3>Comentarios:</h3>
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario1" style="width:60px;">
                    <div class="media-body">
                        <h5 class="mt-0">Usuario1</h5>
                        <p>¡Excelente producto! Lo recomiendo.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario2" style="width:60px;">
                    <div class="media-body">
                        <h5 class="mt-0">Usuario2</h5>
                        <p>Buena calidad, pero el precio es un poco alto.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario3" style="width:60px;">
                    <div class="media-body">
                        <h5 class="mt-0">Usuario3</h5>
                        <p>Me encanta, lo volvería a comprar.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario4" style="width:60px;">
                    <div class="media-body">
                        <h5 class="mt-0">Usuario4</h5>
                        <p>No estoy seguro de la calidad, pero tiene buen aspecto.</p>
                    </div>
                </div>
                <div class="media">
                    <img src="<?php echo IMG . 'usuario.jpg'; ?>" class="mr-3" alt="Usuario5" style="width:60px;">
                    <div class="media-body">
                        <h5 class="mt-0">Usuario5</h5>
                        <p>Excelente servicio al cliente.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>



    
