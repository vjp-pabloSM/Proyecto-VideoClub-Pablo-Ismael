<?php 

// Clase base para los soportes d un videoclub
class Soporte {
    private $titulo = "";
    private $numero = 0;
    private $precio = 0;
    private static $IVA = 0.21;

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
        return $this->precio * (1 + self::$IVA);
    }

    public function getNumero() {
        return $this->numero;
    }

    // Muestra un resumen del soporte en formato HTML
    public function muestraResumen() {
        echo "<p>Título: {$this->titulo}<br>";
        echo "Número: {$this->numero}<br>";
        echo "Precio sin IVA: {$this->precio} €<br>";
        echo "Precio con IVA: " . number_format($this->getPrecioConIva(), 2) . " €</p>";
    }
}
?>