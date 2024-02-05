<div class="container mt-5">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?php echo $producto['Imagen']; ?>" class="img-fluid" alt="<?php echo $producto['Nombre']; ?>">
                    </div>
                    <div class="col-md-6">
                        <!-- Contenido de producto -->
                        <h2><?php echo $producto['Nombre']; ?></h2>
                        <p><?php echo $producto['Descripcion']; ?></p>
                        <p>Precio: $<?php echo $producto['Precio']; ?></p>
                        <p>Estado de Stock: <?php echo ($producto['CantidadStock'] > 0) ? 'En Stock' : 'Sin Stock'; ?></p>
                        <?php if ($producto['CantidadStock'] > 0): ?>
                            <p>Unidades disponibles: <?php echo $producto['CantidadStock']; ?></p>
                        <?php endif; ?>
                        <?php
                            // Verificar si el usuario es administrador
                            if ($esAdministrador()) {
                                echo '
                                    <form action="producto.php?producto_id=' . $producto_id . '" method="post">
                                        <div class="mb-3">
                                            <label for="descripcion" class="form-label">Descripción:</label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="' . $producto['Descripcion'] . '">
                                        </div>
                                        <div class="mb-3">
                                            <label for="precio" class="form-label">Precio:</label>
                                            <input type="number" class="form-control" id="precio" name="precio" value="' . $producto['Precio'] . '">
                                        </div>
                                        <input type="hidden" name="producto_id" value="' . $producto_id . '">
                                        <input type="hidden" name="producto_borrado" value="' . ($producto['Borrado'] ? '1' : '0') . '">
                                        <input type="submit" name="guardarCambios" class="btn btn-dark" value="Guardar Cambios">
                                        <input type="submit" name="darDeBaja" class="btn btn-warning" value="Dar de Baja">
                                    </form>
                                ';
                            } else {
                                // No es administrador, mostrar descripción y precio normales
                                echo '<p>' . $producto['Descripcion'] . '</p>';
                                echo '<p>Precio: $' . $producto['Precio'] . '</p>';
                            }
                            ?>
                    
                        <form action="producto.php?producto_id=<?php echo $producto_id; ?>" method="post">
                            <div class="mb-3">
                                <label for="cantidad" class="form-label">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad" name="cantidad" value="1" min="1" max="9999">
                            </div>
                            <input type="hidden" name="producto_id" value="<?php echo $producto_id; ?>">
                            <input type="hidden" name="producto_nombre" value="<?php echo $producto['Nombre']; ?>">
                            <input type="hidden" name="producto_precio" value="<?php echo $producto['Precio']; ?>">

                                        <?php
                            // Verificar si el usuario es un moderador o administrador
                            if (esModerador() || esAdministrador()) {
                                echo '
                                    <input type="hidden" name="albaran_id" value="' . $idDelAlbaran . '">
                                    <button type="submit" name="quitarStock" class="btn btn-danger">Quitar Stock</button>
                                    <button type="submit" name="agregarStock" class="btn btn-success">Agregar Stock</button>
                                ';
                            }
                        ?>

                <input type="hidden" name="pedido_id" value="<?php echo $pedido_id; ?>">
                <button type="submit" name="comprar" class="btn btn-primary">Comprar</button>
                </form>

                </div>
            </div>