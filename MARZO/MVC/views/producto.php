<h1>ESTO ES LA PAGINA DEL PRODUCTO</h1>
<?
    $producto=$_SESSION['productoElegido'];
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
 
            <img src="<?php echo IMG."productoDefault.jpg"; ?>" class="img-fluid" alt="<?php echo $producto->Nombre; ?>">
            <form action="">
            <?
            echo '<input type="hidden" name="producto_id" value="' . $producto->Id . '">';
            echo '<label for ="unidades_producto">Unidades</label>';
            echo '<input type="number" name="unidades" id="unidades_producto">';
            echo '<input type="submit" name="ir_Pedido" value="Comprar" class="btn btn-outline-primary">';
            echo '<input type="submit" name="ir_Carrito" value="Añadir al carrito" class="btn btn-outline-primary">'
             ?>
            </form>
        </div>
    </div>
    
    <?
    echo"<pre>";
    print_r($producto);
    ?>