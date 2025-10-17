<?php
include_once "Resumible.php";

// Clase base para los soportes de un videoclub
abstract class Soporte implements Resumible {

    // Variables
    public $titulo = "";
    protected $numero = 0;
    private $precio = 0;
    private const IVA = 0.21;

    // Constructor
    public function __construct($titulo, $numero, $precio) {
        $this->titulo = $titulo;
        $this->numero = $numero;
        $this->precio = $precio;
    }

    // Getters
    public function getPrecio() {
        return $this->precio;
    }

    public function getPrecioConIva() {
        return round($this->precio * (1 + self::IVA), 2);
    }

    public function getNumero() {
        return $this->numero;
    }

    // Método abstracto implementado de la interfaz Resumible
    abstract public function muestraResumen();
}
?>