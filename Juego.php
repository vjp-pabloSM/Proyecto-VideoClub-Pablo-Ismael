<?php
include_once "Soporte.php";

// Clase Juego hija de Soporte
class Juego extends Soporte{

    // Variables
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    // Constructor
    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores) {
            parent::__construct($titulo, $numero, $precio);
            $this->consola = $consola;
            $this->minNumJugadores = $minNumJugadores;
            $this->maxNumJugadores = $maxNumJugadores;
    }

    // Muestra el número posible de jugadores
    public function muestraJugadoresPosibles() {
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
            echo "Para un jugador<br>";
        } elseif ($this->minNumJugadores == $this->maxNumJugadores) {
            echo "Para $this->maxNumJugadores jugadores<br>";
        } else {
            echo "De ". $this->minNumJugadores." a ". $this->maxNumJugadores." jugadores<br>";
        }
    }

    // Sobreescribe muestraResumen()
    public function muestraResumen(){
        echo "Juego para: " . $this->consola . "<br>" ;
        parent::muestraResumen();
        $this->muestraJugadoresPosibles() ;
    }
}
?>