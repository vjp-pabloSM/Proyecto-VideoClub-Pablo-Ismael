<?php
include_once "Soporte.php";

// Clase CintaVideo hija de Soporte
class CintaVideo extends Soporte{

    // Variable
    private $duracion;

    // Constructor
    public function __construct($titulo, $numero, $precio, $duracion) {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }

    // Sobreescribe muestraResumen()
    public function muestraResumen(){
        echo "Película en VHS: <br>";
        parent::muestraResumen();
        echo "Duración: " . $this->duracion . " minutos<br>" ;
    }
}
?>