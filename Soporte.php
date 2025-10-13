<?php 

// Clase base para los soportes de un videoclub
class Soporte {

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

    // Muestra un resumen del soporte en formato HTML
    public function muestraResumen() {
        echo $this->titulo." (Nº: " . $this->numero . ")  <br>";
        echo $this->precio." €  (IVA no incluido)<br>";
    }
}
?>