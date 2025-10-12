<?php 
class Juego extends Soporte{
    public $consola;
    private $minNumJugadores;
    private $maxNumJugadores;

    public function __construct($titulo, $numero, $precio, $consola, $minNumJugadores, $maxNumJugadores) {
            parent::__construct($titulo, $numero, $precio);
            $this->consola = $consola;
            $this->minNumJugadores = $minNumJugadores;
            $this->maxNumJugadores = $maxNumJugadores;
    }
    public function muestraJugadoresPosibles() {
        if ($this->minNumJugadores == 1 && $this->maxNumJugadores == 1) {
            echo "Para un jugador<br>";
        } elseif ($this->minNumJugadores == $this->maxNumJugadores) {
            echo "Para $this->maxNumJugadores jugadores<br>";
        } else {
            echo "De ". $this->minNumJugadores." a ". $this->maxNumJugadores." jugadores<br>";
        }
    }
    public function muestraResumen(){
        parent::muestraResumen();
        echo "Consola: " . $this->consola . "<br>" ;
        $this->muestraJugadoresPosibles() ;
    }
}
?>