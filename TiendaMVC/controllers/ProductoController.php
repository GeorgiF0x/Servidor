<?php

require_once('./dao/ProductoDAO.php');

class ProductoController {
    public function mostrarProductos() {
        // Recuperar los productos de la base de datos
        $productos = ProductoDAO::findAll();

        // Incluir la vista para mostrar los productos
        require VIEW . "main.php";
    }
}

