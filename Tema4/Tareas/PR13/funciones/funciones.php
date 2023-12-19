<?

require_once ('/var/www/Servidor/Tema4/Tareas/PR13/configBD.php');



function imprimir(){
    $DSN = 'pgsql:host=' . IP . ';dbname=gym';
    try {
        $con = new PDO($DSN, USER, PASS);

        $sql = 'SELECT * FROM ejercicios';
$result = $con->query($sql);

echo '<div class="container mt-3">';
echo '<table class="table table-striped">';
echo '<thead class="thead-dark">'; // Corregido 'Tead' a 'thead'
echo '<tr><th>ID</th><th>Ejercicio</th><th>Repeticiones</th><th>Series</th><th>Modificar</th><th>Eliminar</th></tr>';
echo '</thead>';
echo '<tbody>';

while ($array = $result->fetch(PDO::FETCH_ASSOC)){
    echo '<tr>';
    $id = '';
    $ejercicio = '';
    $repeticiones = 0;
    $series = 0;

    foreach ($array as $key => $value) {
        echo '<td>'.$value.'</td>';
        if ($key == 'id') $id = $value;
        if ($key == 'ejercicio') $ejercicio = $value;
        if ($key == 'repeticiones') $repeticiones = $value;
        if ($key == 'series') $series = $value;
    }


            //Modificar
            echo '<td>';
            echo '<form action="./mod.php" method="get">';
            echo '<button class="btn btn-primary" type="submit" name="modificar">Modificar</button>';
            echo '<input type="hidden" name="id" value="' . $id . '">';
            echo '<input type="hidden" name="ejercicio" value="' . $ejercicio . '">';
            echo '<input type="hidden" name="repeticiones" value="' . $repeticiones . '">';
            echo '<input type="hidden" name="series" value="' . $series . '">';
            echo '</form>';
            echo '</td>';

            //Borrar
            echo '<td>';
            echo '<form action="#" meeod="get">';
            echo '<button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>';
            echo '<input type="hidden" name="id" value="' . $id . '">';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }

        echo '</tbody>';
        echo '</table>';
        echo'</div>';
    } catch (PDOException $e) {
        ejecutarScript();
        switch ($e->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia. <br> Prueba a crear la base de datos.";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                      
                        echo '<form action="" meeod="get"><input name = "crear" type="submit" value="Crear Base de datos" class="btn btn-success">  </form>';
        
                break;
                case '7':
                    echo "La base de datos  no existe
                    <br>";
                
                 
                    break;
               
            case 1146:
                echo "Error al encontrar la tabla indicada";
         
          
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
                case '42P01':
                echo "Tabla no definida";
          
                    break;
                case'42P04':
                echo "La base de datos no existe <br>";
                    // Llamar a la función ejecutarScript solo si la base de datos no existe
                    ejecutarScript();
                break;
            default:
                echo "Error no identificado: " . $e->getMessage();
                echo 'Codigo: ' .$e->getCode();
                
        }        
    } finally {
        $con = null; 
    }
}

function ejecutarScript(){
        $DSN = 'pgsql:host=' . IP . ';dbname=postgres';  //conectamos una base de datos existente
        try {
            
            $con = new PDO($DSN, USER, PASS);
            $sql = 'create database gym';
            $result = $con->exec($sql);
            //Ejecuta el script
            $DSN = 'pgsql:host=' . IP . ';dbname=gym';//conectamos a la base de datos creada
            $con = new PDO($DSN, USER, PASS);
            $script = file_get_contents('/var/www/Servidor/Tema4/Tareas/PR13/script.sql');
            $result = $con-> exec($script);

          echo 'Script ejecutado. Pruebe su lectura.';
    } catch (PDOException $e) {
        switch ($e->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            default:
                echo "Error no identificado : " . $e->getMessage();      
        }
    } finally {
        unset($con);
    }
}

function crearTabla(){
    try {
        $DSN = 'pgsql:host=' . IP . ';dbname=gym';//conectamos a la base de datos creada
        $con = new PDO($DSN, USER, PASS);
        $script = file_get_contents('/var/www/Servidor/Tema4/Tareas/PR13/script.sql');
        $result = $con-> exec($script);

      echo 'Script ejecutado. Pruebe su lectura.';
} catch (PDOException $e) {
    switch ($e->getCode()){
        case 0:
            echo "No encuentra todos los parámetros de la secuencia";
            break;
        case 2002:
            echo "La IP de acceso a la BD es incorrecta";
            break;
        case 1045:
            echo "Usuario o contraseña incorrectos";
            break;
        case 1049:
            echo "Error al conectarse a la base de datos indicada";
            break;
        case 1146:
            echo "Error al encontrar la tabla indicada";
            break;
        case 1064:
            echo "No se han indicado los valores a insertar en la BD";
            break;
        default:
            echo "Error no identificado : " . $e->getMessage();      
    }
} finally {
    unset($con);
}
}

// para eliminar 
function eliminarRegistro($id){
    $DSN = 'pgsql:host=' . IP . ';dbname=gym';
    try {
        $con = new PDO($DSN, USER, PASS);   
        $sql = "DELETE FROM ejercicios WHERE id = ?";
        $stmt= $con->prepare($sql);
        $stmt->execute(array($id));
        echo '<h3 class="text-danger text-center">Registro Eliminado de forma correcta</h3>';
    } catch (PDOException $e) {
        switch ($e->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            default:
                echo "Error no identificado: " . $e->getMessage();
        }
    } finally {
        unset($con);
    }
    imprimir();
}

// nuevo regitro 
function addRegistro(){
    $DSN = 'pgsql:host=' . IP . ';dbname=gym';

    try {
        $con = new PDO($DSN, USER, PASS);

        
    

        $sql = "INSERT INTO ejercicios (ejercicio, repeticiones, series) VALUES (?, ?, ?)";
        $stmt = $con->prepare($sql);

        $ejercicio = $_REQUEST['ejercicio'];
        $repeticiones = $_REQUEST['repeticiones'];
        $series = $_REQUEST['series'];

        $stmt->execute(array($ejercicio, $repeticiones, $series));

       
    } catch (PDOException $e) {
        switch ($e->getCode()){
            case 0:
                echo "No encuentra todos los parámetros de la secuencia";
                break;
            case 2002:
                echo "La IP de acceso a la BD es incorrecta";
                break;
            case 1045:
                echo "Usuario o contraseña incorrectos";
                break;
            case 1049:
                echo "Error al conectarse a la base de datos indicada";
                break;
            case 1146:
                echo "Error al encontrar la tabla indicada";
                break;
            case 1064:
                echo "No se han indicado los valores a insertar en la BD";
                break;
            default:
                echo "Error no identificado: " . $e->getMessage();
        }
    } finally {
        unset($con);
    }
}

function aplicarModificar($id, $ejercicio, $repeticiones, $series) {
    $DSN = 'pgsql:host=' . IP . ';dbname=gym';

    try {
        $con = new PDO($DSN, USER, PASS);

        // Actualizar  datos 
        $sql = "UPDATE ejercicios SET ejercicio = ?, repeticiones = ?, series = ? WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$ejercicio, $repeticiones, $series, $id]);
        $id = $_GET['id'];
        $ejercicio = $_GET['ejercicio'];
        $repeticiones = $_GET['repeticiones'];
        $series = $_GET['series'];

        echo '<h3 class="text-success">¡Registro modificado correctamente!</h3>';
        header("Location: ./index.php");
    } catch (PDOException $e) {
        echo '<h3 class="text-danger">Error al modificar el registro: ' . $e->getMessage() . '</h3>';
    } finally {
        unset($con);
    }
}

function buscar($idBuscar) {
    try {
        $DSN = 'pgsql:host=' . IP . ';dbname=gym';
        $con = new PDO($DSN, USER, PASS);

        $sql = 'SELECT * FROM ejercicios WHERE id = ?';
        $stmt = $con->prepare($sql);
        $stmt->execute([$idBuscar]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Imprimir los resultados o realizar alguna acción
            echo '<div class="container mt-3">';
            echo '<table class="table table-bordered">';
            echo '<thead class="thead-dark">';
            echo '<tr><th>ID</th><th>Ejercicio</th><th>Repeticiones</th><th>Series</th><th>Modificar</th><th>Eliminar</th></tr>';
            echo '</thead>';
            echo '<tbody>';

            echo '<tr>';
            foreach ($result as $value) {
                echo '<td>' . $value . '</td>';
            }

            // Modificar
            echo '<td>';
            echo '<form action="./mod.php" method="get">';
            echo '<button class="btn btn-primary" type="submit" name="modificar">Modificar</button>';
            echo '<input type="hidden" name="id" value="' . $result['id'] . '">';
            echo '<input type="hidden" name="ejercicio" value="' . $result['ejercicio'] . '">';
            echo '<input type="hidden" name="repeticiones" value="' . $result['repeticiones'] . '">';
            echo '<input type="hidden" name="series" value="' . $result['series'] . '">';
            echo '</form>';
            echo '</td>';

            // Borrar
            echo '<td>';
            echo '<form action="" method="get">';
            echo '<button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>';
            echo '<input type="hidden" name="id" value="' . $result['id'] . '">';
            echo '</form>';
            echo '</td>';

            echo '</tr>';

            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        } else {
            echo '<p>No se encontraron resultados para el ID: ' . $idBuscar . '</p>';
        }
    } catch (PDOException $e) {
        echo 'Error al buscar: ' . $e->getMessage();
    } finally {
        unset($con);
    }
}







