
<?
    $producto=$_SESSION['productoElegido'];

?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
          
                <img src="<?php echo IMG . 'productoDefault.jpg'; ?>" class="card-img-top" alt="<?php echo $producto[0]->Nombre; ?>">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto[0]->Nombre; ?></h5>
                    <form action="">
                        
                   
                            <?     if($_SESSION['usuario']['IdRol']==2||$_SESSION['usuario']['IdRol']==3){
                                //cambiar para que aparezca input text y number paa modificar cantidad descripcion y precio
                            }
                            ?>
                            <p class="card-text"><?php echo $producto[0]->Descripcion; ?></p>
                            <input type="hidden" name="producto_id" value="<?php echo $producto[0]->Id; ?>">
                            <div class="mb-3">
                                <label for="unidades_producto" class="form-label">Unidades</label>
                                <input type="number" class="form-control" id="unidades_producto" name="unidades" min="1">
                            </div>
                            <button type="submit" class="btn btn-primary me-2" name="ir_Pedido">Comprar</button>
                            <button type="submit" class="btn btn-warning" name="ir_Carrito">Añadir al carrito</button>
                            <?
                            if($_SESSION['usuario']['IdRol']==2||$_SESSION['usuario']['IdRol']==3){
                                ?>
                        <button type="submit" class="btn btn-danger me-2" name="rem_stock">Quitar Unidades</button>
                        <button type="submit" class="btn btn-success" name="add_stock">Añadir Unidades</button>
                        <p>
                        <button type="submit" class="btn btn-danger me-2" name="producto_cambios">Guardar Cambios</button>
                        <button type="submit" class="btn btn-success" name="dar_baja">Añadir Unidades</button>
                        </p>
                        <?
                            }
                        ?>
                        <h5 class="card-title">Precio:<?php echo $producto[0]->Precio; ?>€</h5>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>

    
