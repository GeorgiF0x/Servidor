
<?php
   require_once('./controllers/ProductoController.php');
   $controller = new ProductoController();
   $productos = $controller->mostrarProductos();
?>

<?php if (isset($productos) && is_array($productos)): ?>
    <?php foreach ($productos as $producto): ?>
        <article class="col-md-4 mb-4">
            <div class="card" style="width: 18rem;">
                <img src="Media/<?php echo $producto->Imagen; ?>" class="card-img-top img-fluid" alt="<?php echo $producto->Nombre; ?>">
                <div class="card-body">
                    <h5 class="card-title fw-bold"><?php echo $producto->Nombre; ?></h5>
                    <p class="card-text"><?php echo $producto->Descripcion; ?></p>
                    <form method="POST" action="paginas/producto.php" class="d-flex justify-content-between align-items-center" name="comprar">
                        <p class="fw-bold mb-0">Precio: €<?php echo number_format($producto->Precio, 2); ?></p>
                        <input type="hidden" name="producto_id" value="<?php echo $producto->Codigo; ?>">
                        <button class="btn btn-outline-primary" type="submit">Comprar</button>
                    </form>
                </div>
            </div>
        </article>
    <?php endforeach; ?>
<?php else: ?>
    <p>No hay productos disponibles.</p>
<?php endif; ?>


