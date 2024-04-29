<?php
    $producto = $_SESSION['productoElegido'];
    $esAdmin = ($_SESSION['usuario']['IdRol'] == 2 || $_SESSION['usuario']['IdRol'] == 3);
?>

<div class="container my-5">
    <div class="row gx-5 justify-content-around">
        <div class="col-5">
            <img src="<?php echo IMG . 'productoDefault.jpg'; ?>" class="img-fluid" alt="<?php echo $producto[0]->Nombre; ?>">
        </div>
        <div class="col-5   text-center">
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
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" value="<?php echo $producto[0]->Nombre; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripción:</label>
                            <input type="text" id="descripcion" name="producto_Descripcion" class="form-control" value="<?php echo $producto[0]->Descripcion; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="cantidad_stock" class="form-label">Cantidad en Stock:</label>
                            <input type="number" id="cantidad_stock" name="cantidad_stock" class="form-control" min="0" value="<?php echo $producto[0]->CantidadStock; ?>">
                        </div>
                    <?php endif; ?>
                    <div class="row d-flex justify-content-center ">
                        <input class="btn btn-danger w-25 ms-5 " type="submit" value="Carrito">
                        <input class="btn btn-primary w-25 mx-5" type="submit" value="Comprar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

    
