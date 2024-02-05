<?php


class ProductoController {
    public function getAll() {
        $productos = ProductoDAO::findAll();
        // Guarda los productos en la sesión para que estén disponibles en la vista.
        $_SESSION['productos'] = $productos;
        // Establece la vista y el controlador en la sesión.
        $_SESSION['vista'] = VIEW.'defecto.php';
        $_SESSION['controller'] = CON.'ProductoController.php';
    }


}

?>
