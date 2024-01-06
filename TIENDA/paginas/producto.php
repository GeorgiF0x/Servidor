<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="ruta/imagen_producto.jpg" class="img-fluid" alt="Nombre del Producto">
        </div>
        <div class="col-md-6">
            <h2>Codigo del Producto</h2>
            <p>Descripción del producto.</p>
            <p>Precio: $XX.XX</p>
            <p>Estado de Stock: En Stock</p>


            <form action="carrito.php" method="post">
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad:</label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1">
                </div>
                <input type="hidden" name="producto_id" value="1">
                <input type="hidden" name="producto_nombre" value="Nombre del Producto">
                <input type="hidden" name="producto_precio" value="XX.XX">
                <button type="submit" class="btn btn-primary">Agregar al Carrito</button>
            </form>
        </div>
    </div>
    
    <div class="row mt-5">
        <div class="col-md-6">
            <h3>Opiniones de los Clientes</h3>
            <div class="card">
                <div class="card-body">
                    <p>¡Excelente producto! Lo recomiendo totalmente.</p>
                </div>
            </div>
            <!-- Puedes agregar más opiniones aquí -->
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

