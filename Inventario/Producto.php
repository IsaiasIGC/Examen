<?php

class Producto {
    private $id;
    private $nombre;
    private $precio;
    private $stock;
    private $categoria;

    public function __construct($id, $nombre, $precio, $stock, $categoria) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->stock = $stock;
        $this->categoria = $categoria;
    }

    public function getId() {
        return $this->id;
    }
    public function getNombre() {
        return $this->nombre;
    }
    public function getPrecio() {
        return $this->precio;
    }
    public function getStock() {
        return $this->stock;
    }
    public function getCategoria() {
        return $this->categoria;
    }
}

?>