<?php 
include_once "Soporte.php";

// Clase Dvd hija de Soporte
class Dvd extends Soporte{

    // Variables
    public $idiomas;
    private $formatPantalla;

    // Constructor
    public function __construct($titulo, $numero, $precio, $idiomas, $formatPantalla) {
            parent::__construct($titulo, $numero, $precio);
            $this->idiomas = $idiomas;
            $this->formatPantalla = $formatPantalla;
    }

    // Sobreescribe muestraResumen()
    public function muestraResumen(){
        echo "Película en DVD: <br>";
        parent::muestraResumen();
        echo "Idiomas: " . $this->idiomas . "<br>" ;
        echo "Formato de pantalla: " . $this->formatPantalla . "<br>" ;
    }

}

?>