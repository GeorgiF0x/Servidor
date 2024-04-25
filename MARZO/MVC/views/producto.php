<?
    $producto=$_SESSION['productoElegido'];
?>

<div class="container">
    <div class="row">
        <div class="col-5  ">
            <img src="<?php echo IMG . 'productoDefault.jpg'; ?>" class="card-img-top" alt="<?php echo $producto[0]->Nombre; ?>">
        </div>
        <div class="col-5 mx-5  d-flex justify-content-center">
            <div class="card d-flex align-self-center text-center" style="width: 100%; height: 100%;">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $producto[0]->Nombre; ?></h2>
                    <div class="d-flex justify-content-center align-items-center">
                        <div class="row">
                            <?php
                            if($_SESSION['usuario']['IdRol'] == 1 || $_SESSION['usuario']['IdRol'] == 2) {
                                ?>
                                <div class="col">
                                    <form action="" method="post">
                                        <div class="mb-3">
                                            <label for="producto_Descripcion" class="form-label">Descripción del producto:</label>
                                            <textarea class="form-control" id="producto_Descripcion" name="producto_Descripcion"><?php echo $producto[0]->Descripcion; ?></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="producto_Precio" class="form-label">Precio del producto:</label>
                                            <input type="number" class="form-control" id="producto_Precio" name="producto_Precio" value="<?php echo $producto[0]->Precio;?>€">
                                        </div>
                                        <div class="mb-3">
                                            <label for="producto_Stock" class="form-label">Cantidad En Stock:</label>
                                            <input type="number" class="form-control" id="producto_Stock" name="producto_Stock" value="<?php echo $producto[0]->CantidadStock; ?>">
                                        </div>
                                        <div class="row BORDER border-primary">
                                            <div class="col-5">
                                                <button type="submit" class="btn btn-danger" name="producto_cambios">Guardar Cambios</button>
                                            </div>
                                            <div class="col-5">
                                                <button type="submit" class="btn btn-success" name="dar_baja">Dar De baja</button>
                                                <button type="submit" class="btn btn-success" name="rem_stock">Añadir Unidades</button>
                                                <button type="submit" class="btn btn-success" name="add_stock">Quitar Unidades</button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="col border border-danger">
                                    <form action="" method="post">
                                        <div class="card-text border border-primary">
                                            <p class="card-text">Descripción: <?php echo $producto[0]->Descripcion; ?></p>
                                            <input type="hidden" name="producto_id" value="<?php echo $producto[0]->Id; ?>">
                                        </div>
                                        <div class="card-text border border-primary">
                                            <p class="card-text"><?php echo $producto[0]->Precio;?>€</p>
                                        </div>
                                        <div class="card-text border border-primary">
                                            <button type="submit" class="btn btn-danger me-2" name="rem_stock">Quitar Unidades</button>
                                            <button type="submit" class="btn btn-success" name="add_stock">Añadir Unidades</button>
                                        </div>
                                    </form>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




    
