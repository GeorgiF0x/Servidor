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
        // Actualización de datos
        $sql = "UPDATE Usuario SET Contraseña=?, Email=?, FechaNacimiento=? WHERE Id=?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("sssi", $password, $email, $fecha_nacimiento, $usuario_id);

        // Ejecutar la actualización
        $resultado = $stmt->execute();

        // Cerrar la conexión y el statement
        $stmt->close();
        $conexion->close();

        // Retornar el resultado de la actualización
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
            // Manejar el caso en que no se encuentra al usuario
            $stmt->close();
            $conexion->close();
            return null;
        }
    } else {
        // Manejar el caso de error de conexión MySQL
        return null;
    }
}


function restarStock($usuarioId, $producto_id, $cantidadComprada)
{
    try {
        $conexion = mysqli_connect(IP, USER, PASS, 'Tienda');

        if ($conexion) {
            // Obtener la cantidad actual de stock del producto
            $query = "SELECT CantidadStock, Precio FROM Producto WHERE Codigo = $producto_id";
            $result = mysqli_query($conexion, $query);

            if ($result) {
                $producto = mysqli_fetch_assoc($result);
                $stockActual = $producto['CantidadStock'];
                $precioUnitario = $producto['Precio'];

                // Verificar si hay suficiente stock para la compra
                if ($stockActual >= $cantidadComprada) {
                    // Restar la cantidad comprada del stock
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
                            // Éxito al restar el stock y registrar la compra
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
                // Verificar si se obtuvo al menos una fila
                if (mysqli_num_rows($resultado) > 0) {
                    // Obtener los datos del pedido y el nombre del producto
                    $pedido = mysqli_fetch_assoc($resultado);
                    return $pedido;
                } else {
                    // No se encontró ningún pedido con ese ID
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

function verTodosPedidos($usuario_id) {
    // Asegúrate de establecer la conexión y realizar la consulta adecuada
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


?>











