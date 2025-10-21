<?php
namespace PROYECTO_VIDEOCLUB_PABLO_ISMAEL;

use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Util\SoporteYaAlquiladoException;
use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Util\CupoSuperadoException;
use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Util\SoporteNoEncontradoException;

// Clase Cliente
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

    // Función para alquilar un soporte (lanza excepciones y permite encadenamiento)
    public function alquilar(Soporte $s) {

         // Para saber si lo tiene ya alquilado
        if ($this->tieneAlquilado($s)) {
            throw new SoporteYaAlquiladoException(
                "El cliente {$this->nombre} (nº {$this->numero}) ya tiene alquilado el soporte nº {$s->getNumero()}."
            );
        }

         // Para saber si sobrepasa el máximo de alquileres simultáneos
        if (count($this->soportesAlquilados) >= $this->maxAlquilerConcurrente) {
            throw new CupoSuperadoException(
                "El cliente {$this->nombre} (nº {$this->numero}) ha alcanzado el número máximo de alquileres ({$this->maxAlquilerConcurrente})."
            );
        }

         // Se añade el alquiler al cliente
        $this->soportesAlquilados[] = $s;
        $this->numSoportesAlquilados++;
        // marcar el soporte como alquilado
        $s->alquilado = true;

        echo "<p>El cliente " . $this->nombre . " ha alquilado este soporte: </p>";
        $s->muestraResumen();

         return $this; // permite encadenamiento
    }

    // Devuelve un soporte por el número (lanza excepción si no lo tenía; retorna $this para encadenar)
    public function devolver(int $numSoporte) {
        foreach ($this->soportesAlquilados as $indice => $soporte) {
            if ($soporte->getNumero() == $numSoporte) {
                unset($this->soportesAlquilados[$indice]);
                // reindexar array
                $this->soportesAlquilados = array_values($this->soportesAlquilados);
                // marcar soporte como no alquilado
                $soporte->alquilado = false;

                echo "<p>El cliente " . $this->nombre . " ha devuelto el soporte número " . $numSoporte . ".</p>";
                return $this; // encadenamiento
            }
        }

        throw new SoporteNoEncontradoException(
            "El cliente {$this->nombre} (nº {$this->numero}) no tenía alquilado el soporte nº {$numSoporte}."
        );
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