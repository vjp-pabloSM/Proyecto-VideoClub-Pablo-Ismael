<?php
class Cliente {

    // Variables
    public $nombre = "";
    private $numero = 0;
    private $soportesAlquilados = [];
    private $numSoportesAlquilados = 0;
    private $maxAlquilerConcurrente;

    // Constructor
    public function __construct($nombre, $numero, $maxAlquilerConcurrente = 3) {
        $this->nombre = $nombre;
        $this->numero = $numero;
        $this->maxAlquilerConcurrente = $maxAlquilerConcurrente;
        $this->soportesAlquilados = [];
    }

    // Getters y Setters necesarios
    public function getNumero() {
        return $this->numero;
    }
    
    public function setNumero($numero) {
        $this->numero = $numero;
    }
    
    public function getsoportesAlquilados() {
        return $this->soportesAlquilados;
    }

    // Comprueba si un soporte está ya alquilado
    public function tieneAlquilado(Soporte $s):bool {
        foreach ($this->soportesAlquilados as $soporte ) {
            if ($soporte->getNumero() === $s->getNumero()) {
                return true;
            }
        }
        return false;
    }

    // Función para alquilar un soporte
    public function alquilar(Soporte $s):bool {

        // Para saber si lo tiene ya alquilado
        if ($this->tieneAlquilado($s)) {
            echo "<p>El cliante " . $this->nombre . " ya tiene alquilado el soporte: </p>";
            $s->muestraResumen();
            return false;
        }

        // Para saber si sobrepasa el máximo de alquileres simultáneos
        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            echo "<p>El cliente " . $this->nombre . " ha alcanzado el número máximo de alquileres permitidos.<br>No podrá volver a alquilar en este Videoclub hasta devolver algo.</p>";
            return false;
        }

        // Se añade el alquiler al cliente
        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        echo "<p>El cliente " . $this->nombre . " ha alquilado este soporte: </p>";
        $s->muestraResumen();
        return true;
    }

    // Devuleve un soporte por el número
    public function devolver(int $numSoporte):bool {
        foreach ($this->soportesAlquilados as $indice => $soporte) {
            if ($soporte->getNumero() == $numSoporte) {
                unset($this->soportesAlquilados[$indice]);
                echo "<p>El cliente " . $this->nombre . " ha devuelto el soporte número " . $numSoporte . ".</p>";
                return true;
            }
        }

        echo "<p>El cliente " . $this->nombre . " no tenía alquilado el soporte número " . $numSoporte . ".</p>";
        return false;
    }

    // Resumen de los alquileres en el momento
    public function listarAlquileres(): void {
        $cantidad = count($this->soportesAlquilados);
        echo "<p>El cliente " . $this->nombre . " tiene actualmente " . $cantidad . " soporte(s) alquilado(s).</p>";

        if ($cantidad > 0) {
            echo "<ul>";
            foreach ($this->soportesAlquilados as $soporte) {
                echo "<li>";
                $soporte->muestraResumen();
                echo "</li>";
            }
            echo "</ul>";
        } else {
            echo "<p>No hay soportes alquilados actualmente.</p>";
        }
    } 
    
    // Muestra un resumen del cliente 
    public function muestraResumen() {
        echo "<p>Cliente: " . $this->nombre . "<br>";
        echo "Nº de cliente: " . $this->numero . "<br>";
        echo "Soportes alquilados: " . count($this->soportesAlquilados) . " de " . $this->maxAlquilerConcurrente . " posibles.</p>";
    }
}

?>