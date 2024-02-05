<?php
class Producto{

    private $codigo;
    private $titulo;
    private $descripcion;
    private $precio;
    private $stock;
    private $imagen_url;
    private $activo;


    public function __construct($codigo, $titulo, $descripcion, $precio, $stock, $imagen_url, $activo=1){
        $this->codigo=$codigo;
        $this->titulo=$titulo;
        $this->descripcion=$descripcion;
        $this->precio=$precio;
        $this->stock=$stock;
        $this->imagen_url=$imagen_url;
        $this->activo=$activo;

    }

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        if(property_exists(__CLASS__,$atributo)) //Comprueba si existe el atributo
        $this->$atributo=$valor;
         else echo "No existe el atributo $atributo";
    
    }


}


    ?>