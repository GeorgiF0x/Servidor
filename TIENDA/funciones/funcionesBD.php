<?php

require ("configBD.php");


function verificarBDD()
{
    try {
        $conexion = mysqli_connect(IP, USER, PASS, "");
        if ($conexion) {
            $result = $conexion->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'Tienda'");

            if ($result->num_rows === 0) {
                $script = file_get_contents(__DIR__ . "/script.sql"); // agregar __DIR__ para rutas relativas 
                if ($conexion->multi_query($script)) {
                    echo "Base de datos 'Tienda' creada con éxito.";
                } else {
                    echo "Error al ejecutar el script: " . $conexion->error;
                }
            }

            $conexion->close();
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Según códigos de error
        switch ($th->getCode()) {
            case 1044:
                echo "Error al acceder a la BD: Acceso denegado.";
                break;
            case 1045:
                echo "Error al conectarse a la BD: Acceso denegado para el usuario.";
                break;
            case 1050:
                echo "Error al crear la BD: Ya existe una base de datos con el mismo nombre.";
                break;
            case 1054:
                echo "Error de sintaxis en la consulta SQL.";
                break;
            case 1062:
                echo "Error al insertar datos: Duplicado de clave única.";
                break;
            case 1064:
                echo "Error de sintaxis en la consulta SQL.";
                break;
            case 1146:
                echo "Error al acceder a la tabla: No existe la tabla especificada.";
                break;
            case 2002:
                echo "Error al conectar al servidor MySQL: No se puede establecer conexión.";
                break;
            default:
                // Otros códigos de error
                echo "Error desconocido: " . $th->getMessage();
                break;
        }
    }
}


function PintarProductos() {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
        if ($conexion) {
            $sql = "SELECT * FROM Producto";
            $result = $conexion->query($sql);

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                // Mostrar tarjetas para cada producto
                while ($row = $result->fetch_assoc()) {
                    // Verificar si el producto está marcado como borrado
                    if (!$row['Borrado']) {
                        echo '<article class="col-md-4 mb-4">';
                        echo '<div class="card" style="width: 18rem;">';
                        echo '<img src="Media/' . $row['Imagen'] . '" class="card-img-top img-fluid" alt="' . $row['Nombre'] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title fw-bold">' . $row['Nombre'] . '</h5>';
                        echo '<p class="card-text">' . $row['Descripcion'] . '</p>';
                        echo '<form method="POST" action="paginas/producto.php" class="d-flex justify-content-between align-items-center" name="comprar">';
                        echo '<p class="fw-bold mb-0">Precio: €' . number_format($row['Precio'], 2) . '</p>';
                        echo '<input type="hidden" name="producto_id" value="' . $row['Codigo'] . '">';
                        echo '<button class="btn btn-outline-primary" type="submit">Comprar</button>';
                        echo '</form>';
                        echo '</div>';
                        echo '</div>';
                        echo '</article>';
                    }
                }
            } else {
                echo "No hay productos disponibles.";
            }

            $conexion->close();
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Manejo de errores
        echo "Error desconocido: " . $th->getMessage();
    }
}


function obtenerIdProducto($producto_id) {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
        if ($conexion) {
            $sql = "SELECT Codigo FROM Producto WHERE Codigo = '$producto_id' AND Borrado = FALSE";;
            $resultado = $conexion->query($sql);

            if ($resultado) {
                $fila = $resultado->fetch_assoc();
                return $fila['Codigo'];
            } else {
                die("Error en la consulta: " . $conexion->error);
            }
            $conexion->close();
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Manejo de errores
        echo "Error desconocido: " . $th->getMessage();
    }
}

function getInfoProducto($codigoProducto){
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
        
        if ($conexion) {
            $sql = "SELECT * FROM Producto WHERE Codigo = $codigoProducto";
            $result = $conexion->query($sql);
            if ($result) {
                $producto = $result->fetch_assoc();
                $conexion->close();
                return $producto;
            } else {
      
                echo "Error en la consulta: " . $conexion->error;
            }
        } else {
     
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Manejo de errores
        echo "Error desconocido: " . $th->getMessage();
    }
}

function restarStock($codigoProducto, $cantidad, $usuarioId) {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
        
        if ($conexion) {
            $sqlProducto = "SELECT * FROM Producto WHERE Codigo = $codigoProducto";
            $resultProducto = $conexion->query($sqlProducto);

            if ($resultProducto) {
                $producto = $resultProducto->fetch_assoc();

                // Ver si se ha dado más de 0 para restar
                if ($cantidad > 0) {
                    $nuevoStock = max(0, $producto['CantidadStock'] - $cantidad); // max 0 para que no sea -1, -2, etc.
                    $sqlStock = "UPDATE Producto SET CantidadStock = $nuevoStock WHERE Codigo = $codigoProducto";
                    $conexion->query($sqlStock);

                    // Insertar en la tabla Albaran con la acción "retirar"
                    $sqlAlbaran = "INSERT INTO Albaran (CodProducto, Cantidad, UsuarioId, Accion) VALUES ($codigoProducto, $cantidad, $usuarioId, 'retirar')";
                    $conexion->query($sqlAlbaran);
                }

                $conexion->close();
                return $producto;
            } else {
                echo "Error en la consulta del producto: " . $conexion->error;
            }
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Manejo de errores
        echo "Error desconocido: " . $th->getMessage();
    }
}

function verificarUser($username, $password){
    $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

    if ($conexion) {

        $sql = "SELECT * FROM Usuario WHERE Nombre = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();

            
            if ($password == $usuario['Contraseña']) {
                $_SESSION['usuario_id'] = $usuario['Id'];
                $_SESSION['usuario_nombre'] = $usuario['Nombre'];
                $_SESSION['perfil'] = $usuario['Perfil'];
                header("Location: ../index.php");
                exit();
            } else {
                echo "Contraseña incorrecta";
            }
        } else {
            echo "Usuario no encontrado";
        }

        $stmt->close();
        $conexion->close();
    } else {
        echo "Error de conexión MySQL: " . mysqli_connect_error();
    }
}

function actualizarPerfil($usuario_id, $password, $email, $fecha_nacimiento) {
 
    $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

    if ($conexion) {
       
        $sql = "UPDATE Usuario SET Contraseña=?, Email=?, FechaNacimiento=? WHERE Id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssi", $password, $email, $fecha_nacimiento, $usuario_id);

        $resultado = $stmt->execute();

        $stmt->close();
        $conexion->close();

        return $resultado;
    } else {
        // En caso de error de conexión
        return false;
    }
}

function getInfoUser($usuario_id) {
    $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

    if ($conexion) {
        $sql = "SELECT * FROM Usuario WHERE Id = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("i", $usuario_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $usuario = $result->fetch_assoc();
            $stmt->close();
            $conexion->close();
            return $usuario;
        } else {
            // si  no se encuentra al usuario
            $stmt->close();
            $conexion->close();
            return null;
        }
    } else {
        // Manejar el caso de error de conexión MySQL
        return null;
    }
}

function insertarUsuario($nombre, $contrasena, $email, $fechaNacimiento, $perfil) {
    $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

    if ($conexion) {
        // Verificar si el email ya está registrado
        $sqlVerificar = "SELECT Id FROM Usuario WHERE Email = ?";
        $stmtVerificar = $conexion->prepare($sqlVerificar);
        $stmtVerificar->bind_param("s", $email);
        $stmtVerificar->execute();
        $resultVerificar = $stmtVerificar->get_result();

        if ($resultVerificar->num_rows > 0) {
            // El email ya está registrado
            $stmtVerificar->close();
            $conexion->close();
            return false;
        } else {
            // Insertar el nuevo usuario
            $sqlInsertar = "INSERT INTO Usuario (Nombre, Contraseña, Email, FechaNacimiento, Perfil) VALUES (?, ?, ?, ?, ?)";
            $stmtInsertar = $conexion->prepare($sqlInsertar);
            $stmtInsertar->bind_param("sssss", $nombre, $contrasena, $email, $fechaNacimiento, $perfil);
            $stmtInsertar->execute();
            $stmtInsertar->close();
            $conexion->close();
            return true;
        }
    } else {
        // Manejar el caso de error de conexión MySQL
        return false;
    }
}


function quitarStock($usuarioId, $producto_id, $cantidadComprada){
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

        if ($conexion) {
            // cantidad actual de stock 
            $query = "SELECT CantidadStock, Precio FROM Producto WHERE Codigo = $producto_id";
            $result = mysqli_query($conexion, $query);

            if ($result) {
                $producto = mysqli_fetch_assoc($result);
                $stockActual = $producto['CantidadStock'];
                $precioUnitario = $producto['Precio'];

                // Verificar si hay suficiente stock para la compra
                if ($stockActual >= $cantidadComprada) {
                    $nuevoStock = $stockActual - $cantidadComprada;

                    // Actualizar el stock en la base de datos
                    $updateQuery = "UPDATE Producto SET CantidadStock = $nuevoStock WHERE Codigo = $producto_id";
                    $updateResult = mysqli_query($conexion, $updateQuery);

                    if ($updateResult) {
                        // Calcular el precio total de la compra
                        $precioTotal = $precioUnitario * $cantidadComprada;

                        // Insertar la compra en la tabla PedidoCompra
                        $insertQuery = "INSERT INTO PedidoCompra (UsuarioId, CodProducto, Cantidad, PrecioTotal) VALUES ($usuarioId, $producto_id, $cantidadComprada, $precioTotal)";
                        $insertResult = mysqli_query($conexion, $insertQuery);

                        if ($insertResult) {
                            // Éxito 
                            echo "Stock actualizado y compra registrada correctamente.";
                            // Redirigir a la página de pedidos con el ID del nuevo pedido
                            header("Location: pedido.php?pedido_id=" . mysqli_insert_id($conexion));
                        } else {
                            echo "Error al registrar la compra en la base de datos.";
                        }
                    } else {
                        echo "Error al actualizar el stock en la base de datos.";
                    }
                } else {
                    echo "No hay suficiente stock para la compra.";
                }
            } else {
                echo "Error al obtener la información del producto.";
            }
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        echo "Error desconocido: " . $th->getMessage();
    }
}

function obtenerUltimoIdAlbaran($conexion) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (estaAutenticado()) {
        $usuarioId = $_SESSION['usuario_id'];

        //obtener el último ID de albarán 
        $consulta = "SELECT Id FROM Albaran WHERE UsuarioId = ? ORDER BY FechaAlbaran DESC LIMIT 1";

        $stmt = $conexion->prepare($consulta);
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();


        if ($stmt->fetch()) {
            $stmt->close();
        }
    }

    return null;
}
function agregarStock($usuarioId, $producto_id, $cantidadRecibida){
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

        if ($conexion) {
            // Obtener la cantidad actual de stock 
            $query = "SELECT CantidadStock FROM Producto WHERE Codigo = $producto_id";
            $result = mysqli_query($conexion, $query);

            if ($result) {
                $producto = mysqli_fetch_assoc($result);
                $stockActual = $producto['CantidadStock'];
                // Sumar 
                $nuevoStock = $stockActual + $cantidadRecibida;
                // Actualizar el stock 
                $updateQuery = "UPDATE Producto SET CantidadStock = $nuevoStock WHERE Codigo = $producto_id";
                $updateResult = mysqli_query($conexion, $updateQuery);
                
                if ($updateResult) {
                    // Línea Albaran con la acción "añadir"
                    $insertQuery = "INSERT INTO Albaran (CodProducto, Cantidad, UsuarioId, Accion) VALUES ($producto_id, $cantidadRecibida, $usuarioId, 'añadir')";
                    $insertResult = mysqli_query($conexion, $insertQuery);

                    if ($insertResult) {
                        echo "Stock actualizado y entrada en Albaran registrada correctamente.";
                        // Redirigir a la página de Albaranes con el ID del nuevo Albaran
                        header("Location: albaran.php?albaran_id=" . mysqli_insert_id($conexion));
                    } else {
                        echo "Error al registrar la entrada en Albaran en la base de datos.";
                    }
                } else {
                    echo "Error al actualizar el stock en la base de datos.";
                }
            } else {
                echo "Error al obtener la información del producto.";
            }
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        echo "Error desconocido: " . $th->getMessage();
    }
}

function getInfoPedido($pedido_id){
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
        
        if ($conexion) {
            // Consulta para obtener la información básica del pedido y el nombre del producto
            $consulta = "SELECT pc.*, p.Nombre AS NombreProducto 
                         FROM PedidoCompra pc
                         JOIN Producto p ON pc.CodProducto = p.Codigo
                         WHERE pc.Id = $pedido_id";
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                if (mysqli_num_rows($resultado) > 0) {
                    $pedido = mysqli_fetch_assoc($resultado);
                    return $pedido;
                } else {
                    return null;
                }
            } else {
                // Error en la consulta
                echo "Error en la consulta: " . mysqli_error($conexion);
                return null;
            }
        } else {
            // Error de conexión MySQL
            echo "Error de conexión MySQL: " . mysqli_connect_error();
            return null;
        }
    } catch (\Throwable $th) {
        // Manejo de errores
        echo "Error desconocido: " . $th->getMessage();
        return null;
    }
}
function obtenerIdAlbaran() {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
        
        if ($conexion) {
            // Consulta para obtener el último ID de albarán
            $consulta = "SELECT Id FROM Albaran ORDER BY Id DESC LIMIT 1";
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                if (mysqli_num_rows($resultado) > 0) {
                    $row = mysqli_fetch_assoc($resultado);
                    return $row['Id'];
                } else {
                   
                    return null; 
                }
            } else {
                // Error en la consulta
                echo "Error en la consulta: " . mysqli_error($conexion);
        
            }
        } else {
            // Error de conexión MySQL
            echo "Error de conexión MySQL: " . mysqli_connect_error();

        }
    } catch (\Throwable $th) {
    
        echo "Error desconocido: " . $th->getMessage();
    }
}

function getInfoAlbaran() {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

        if ($conexion) {
            // Consulta para obtener la información del último albarán
            $consulta = "SELECT * FROM Albaran ORDER BY Id DESC LIMIT 1";
            $resultado = mysqli_query($conexion, $consulta);

            if ($resultado) {
                if (mysqli_num_rows($resultado) > 0) {
                    $row = mysqli_fetch_assoc($resultado);
                    return $row;
                } else {
                    // No hay registros en la tabla de albaranes
                    return null;
                }
            } else {
                // Error en la consulta
                echo "Error en la consulta: " . mysqli_error($conexion);
            }
        } else {
            // Error de conexión MySQL
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        echo "Error desconocido: " . $th->getMessage();
    }
}

function verTodosPedidos($usuario_id) {
    $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
    if ($conexion) {
        $consulta = "SELECT * FROM PedidoCompra WHERE UsuarioId = $usuario_id";
        $resultado = mysqli_query($conexion, $consulta);
        
        if ($resultado) {
            $pedidos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            return $pedidos;
        } else {
            echo "Error en la consulta: " . mysqli_error($conexion);
            return [];
        }
    } else {
        echo "Error de conexión MySQL: " . mysqli_connect_error();
        return [];
    }
}
function verTodosAlbaranes($usuario_id) {
    $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
    if ($conexion) {
        $consulta = "SELECT * FROM Albaran WHERE UsuarioId = $usuario_id";
        $resultado = mysqli_query($conexion, $consulta);
        
        if ($resultado) {
            $albaranes = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
            return $albaranes;
        } else {
            echo "Error en la consulta: " . mysqli_error($conexion);
            return [];
        }
    } else {
        echo "Error de conexión MySQL: " . mysqli_connect_error();
        return [];
    }
}

function verDetalleAlbaran($albaran_id) {
    $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');
    
    if ($conexion) {
        // Consulta para obtener los detalles del albarán por su ID
        $consulta = "SELECT * FROM Albaran WHERE Id = $albaran_id";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado) {
            if (mysqli_num_rows($resultado) > 0) {
                $albaran = mysqli_fetch_assoc($resultado);
                // Dibujar la tabla con la información del albarán
                echo '<table class="table">';
                echo '<thead>';
                echo '<tr>';
                echo '<th scope="col">ID</th>';
                echo '<th scope="col">Fecha de Albarán</th>';
                echo '<th scope="col">Código de Producto</th>';
                echo '<th scope="col">Cantidad</th>';
                echo '<th scope="col">ID de Usuario</th>';
                echo '<th scope="col">Acción</th>'; // Agregamos la columna de Acción
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                echo '<tr>';
                echo '<td>' . $albaran['Id'] . '</td>';
                echo '<td>' . $albaran['FechaAlbaran'] . '</td>';
                echo '<td>' . $albaran['CodProducto'] . '</td>';
                echo '<td>' . $albaran['Cantidad'] . '</td>';
                echo '<td>' . $albaran['UsuarioId'] . '</td>';
                echo '<td>' . $albaran['Accion'] . '</td>'; // Imprimimos el valor de Acción
                echo '</tr>';
                echo '</tbody>';
                echo '</table>';
            } else {
                // No se encontraron registros para el albarán específico
                echo '<p>No se encontraron detalles para el albarán seleccionado.</p>';
            }
        } else {
            // Error en la consulta
            echo "Error en la consulta: " . mysqli_error($conexion);
        }
    } else {
        // Error de conexión MySQL
        echo "Error de conexión MySQL: " . mysqli_connect_error();
    }
    
    // Cerrar la conexión
    mysqli_close($conexion);
}


function insertarProducto($nombre, $descripcion, $cantidad, $precio) {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

        if ($conexion) {
           
            $imagen = "../Media/productoDefault.jpg";

           
            $stmt = $conexion->prepare("INSERT INTO Producto (Nombre, Descripcion, CantidadStock, Precio, Imagen) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssids", $nombre, $descripcion, $cantidad, $precio, $imagen);

            // Ejecutar la consulta
            if ($stmt->execute()) {
                $stmt->close();
                $conexion->close();
                return true;
            } else {
                echo "Error al insertar el producto: " . $stmt->error;
            }
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Manejo de errores
        echo "Error desconocido: " . $th->getMessage();
    }

    return false;
}
function darBajaProducto() {
    $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

    if ($conexion) {
      
        $producto_id = $_POST['producto_id'];
        $productoBorrado = ($_POST['producto_borrado'] == '1') ? 0 : 1; // Cambia el valor de 0 a 1 o viceversa

        
        $query = "UPDATE Producto SET Borrado = '$productoBorrado' WHERE Codigo = '$producto_id'";
        mysqli_query($conexion, $query);

  
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error de conexión MySQL: " . mysqli_connect_error();
        return [];
    }
}

function obtenerListaProductosBorrados() {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

        if ($conexion) {
            $sql = "SELECT Codigo, Nombre FROM Producto WHERE Borrado = TRUE";
            $result = $conexion->query($sql);

            if ($result) {
                $productos = $result->fetch_all(MYSQLI_ASSOC);
                $conexion->close();
                return $productos;
            } else {
                echo "Error en la consulta: " . $conexion->error;
            }
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Manejo de errores
        echo "Error desconocido: " . $th->getMessage();
    }

    return array(); 
}
function obtenerProductosBorrados() {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

        if ($conexion) {
            $sql = "SELECT * FROM Producto WHERE Borrado = TRUE";
            $result = $conexion->query($sql);

            if ($result) {
                $productosBorrados = $result->fetch_all(MYSQLI_ASSOC);
                $conexion->close();
                return $productosBorrados;
            } else {
                echo "Error en la consulta: " . $conexion->error;
            }
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        // Manejo de errores
        echo "Error desconocido: " . $th->getMessage();
    }

    return array();
}

function mostrarInfoProducto($producto) {
    echo '<article class="col-md-4 mb-4">';
    echo '<div class="card" style="width: 18rem;">';
    echo '<img src="Media/' . $producto['Imagen'] . '" class="card-img-top img-fluid" alt="' . $producto['Nombre'] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title fw-bold">' . $producto['Nombre'] . '</h5>';
    echo '<p class="card-text">' . $producto['Descripcion'] . '</p>';
    echo '<form method="POST" action="paginas/producto.php" class="d-flex justify-content-between align-items-center" name="comprar">';
    echo '<p class="fw-bold mb-0">Precio: €' . number_format($producto['Precio'], 2) . '</p>';
    echo '<input type="hidden" name="producto_id" value="' . $producto['Codigo'] . '">';
    echo '<button class="btn btn-outline-primary" type="submit">Dar Alta</button>';
    echo '</form>';
    echo '</div>';
    echo '</div>';
    echo '</article>';
}
function cambiarDesc($producto_id, $nueva_descripcion, $nuevo_precio) {
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

        if ($conexion) {
            // Preparada para que no me cambie el precio algun golfo
            $sql = "UPDATE Producto SET Descripcion = ?, Precio = CAST(? AS DECIMAL(10,2)) WHERE Codigo = ?";
            $stmt = mysqli_prepare($conexion, $sql);

            if ($stmt) {
                mysqli_stmt_bind_param($stmt, "ssd", $nueva_descripcion, $nuevo_precio, $producto_id);
                mysqli_stmt_execute($stmt);
                mysqli_stmt_close($stmt);
                mysqli_close($conexion);
                echo "Cambios aplicados en la base de datos.";
                return true;
            } else {
                echo "Error en la preparación de la consulta: " . mysqli_error($conexion);
            }
        } else {
            echo "Error de conexión MySQL: " . mysqli_connect_error();
        }
    } catch (\Throwable $th) {
        echo "Error desconocido: " . $th->getMessage();
    }

    return false;
}

?>













