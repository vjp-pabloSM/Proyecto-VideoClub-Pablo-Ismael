<?php
namespace PROYECTO_VIDEOCLUB_PABLO_ISMAEL;

use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Util\VideoclubException;

// Clase videoclub que relaciona las clases cliente y soporte
class Videoclub{
    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;

    // Nuevas propiedades para seguimiento de alquileres
    private $numProductosAlquilados = 0;
    private $numTotalAlquileres = 0;

    // constructor que solo recibe $nombre porque es lo único que se necesita para crear el videoclub
    public function __construct($nombre){
        $this->nombre = $nombre;
    }

    // Método que incluye Productos del array de soporte al videoclub
    public function incluirProducto(Soporte $producto){
        $this->productos[] = $producto;
        $this->numProductos++;
        echo "<p>Producto: ".$producto->muestraResumen()." añadido al videoclub<p>";
    }
    
    // Método que incluye las cintas de video al videoclub
    public function incluirCintaVideo($titulo, $precio, $duracion){
        $cinta = new CintaVideo($titulo, $this->numProductos + 1, $precio,$duracion);
        $this->incluirProducto($cinta);
    }

    // Método que incluye los dvd al videoclub
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla){
        $dvd = new Dvd($titulo, $this->numProductos + 1, $precio,$idiomas, $pantalla);
        $this->incluirProducto($dvd);
    }

    // Método que incluye los Juegos al videoclub
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ){
        $juego = new Juego($titulo, $this->numProductos + 1, $precio, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);
    }

    // Método para incluir los socios
    public function incluirSocio($nombre, $maxAlquilerConcurrente = 3) {
        $cliente = new Cliente($nombre, $this->numSocios+1, $maxAlquilerConcurrente);
        $this->socios[] = $cliente;
        $this->numSocios++;
        echo "<p>El cliente " . $nombre . " (nº " . $this->numSocios . ") ha sido añadido correctamente</p>";
    }

    // Método que muestra los productos en una lista
    public function listarProductos() {
        echo "<h3>Lista de productos del VideoClub " . $this->nombre . "</h3>";

        if (empty($this->productos)) {
            echo "<p>No hay productos en el videoclub</p>";
        } else {
            foreach ($this->productos as $producto) {
                $producto->muestraResumen();
                echo "<br>";
            }
        }
    }

    // Método que muestra la lista de socios
    public function listarSocios() {
        echo "<h3>Lista de socios del VideoClub " . $this->nombre . "</h3>";

        if (empty($this->socios)) {
            echo "<p>No hay socios en el videoclub</p>";
        } else {
            foreach ($this->socios as $socio) {
                $socio->muestraResumen();
            }
        }
    }

    // getters para las nuevas propiedades
    public function getNumProductosAlquilados(): int {
        return $this->numProductosAlquilados;
    }

    // Devuelve el total de alquileres realizados
    public function getNumTotalAlquileres(): int {
        return $this->numTotalAlquileres;
    }

    // Método para alquilarle productos a los socios (ahora captura excepciones lanzadas por Cliente)
    public function alquilarSocioProducto($numeroCliente, $numeroSuporte) {
        $cliente = null;
        $soporte = null;

        foreach ($this->socios as $s) {
            if ($s->getNumero() == $numeroCliente) {
                $cliente = $s;
            }
        }

        foreach ($this->productos as $p) {
            if($p->getNumero() == $numeroSuporte) {
                $soporte = $p;
            }
        }

        if ($cliente && $soporte) {
            try {
                $wasAlquilado = $soporte->alquilado ?? false;
                $cliente->alquilar($soporte);
                // si antes no estaba alquilado y ahora sí, actualizamos contadores
                if (!$wasAlquilado && ($soporte->alquilado ?? false)) {
                    $this->numProductosAlquilados++;
                }
                // cada intento de alquiler correcto cuenta como alquiler total
                $this->numTotalAlquileres++;
            } catch (VideoclubException $e) {
                // Informar al usuario del motivo (todas las excepciones de cliente heredan de VideoclubException)
                echo "<p>No se pudo realizar el alquiler: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>No se puede realizar el alquiler, cliente o soporte no encontrados</p>";
        }

        return $this; // permite encadenamiento desde Videoclub
    }

    // Alquila múltiples productos a un socio    
    public function alquilarSocioProductos(int $numSocio, array $numerosProductos) {
        $cliente = null;
        $soportesSeleccionados = [];

        // Buscar socio
        foreach ($this->socios as $s) {
            if ($s->getNumero() == $numSocio) {
                $cliente = $s;
                break;
            }
        }

        if (!$cliente) {
            echo "<p>Socio nº {$numSocio} no encontrado.</p>";
            return $this;
        }

        // Comprobar disponibilidad de todos los soportes
        foreach ($numerosProductos as $numProducto) {
            $soporte = null;
            foreach ($this->productos as $p) {
                if ($p->getNumero() == $numProducto) {
                    $soporte = $p;
                    break;
                }
            }
            if (!$soporte) {
                echo "<p>Soporte nº {$numProducto} no encontrado. Ningún producto será alquilado.</p>";
                return $this;
            }
            if ($soporte->alquilado) {
                echo "<p>Soporte nº {$numProducto} ya está alquilado. Ningún producto será alquilado.</p>";
                return $this;
            }
            // Verificación extra: el cliente no lo tenga ya alquilado
            if ($cliente->tieneAlquilado($soporte)) {
                echo "<p>El cliente ya tiene alquilado el soporte nº {$numProducto}. Ningún producto será alquilado.</p>";
                return $this;
            }

            $soportesSeleccionados[] = $soporte;
        }

        // Alquilar todos los soportes
        foreach ($soportesSeleccionados as $soporte) {
            try {
                $cliente->alquilar($soporte);
                $this->numProductosAlquilados++;
                $this->numTotalAlquileres++;
            } catch (\PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Util\VideoclubException $e) {
                echo "<p>No se pudo alquilar el soporte: " . $e->getMessage() . "</p>";
            }
        }

        return $this;
    }

    // Devuelve un único producto de un socio
    public function devolverSocioProducto(int $numSocio, int $numeroProducto) {
        $cliente = null;
        $soporte = null;

        foreach ($this->socios as $s) {
            if ($s->getNumero() == $numSocio) {
                $cliente = $s;
                break;
            }
        }

        foreach ($this->productos as $p) {
            if ($p->getNumero() == $numeroProducto) {
                $soporte = $p;
                break;
            }
        }

        if ($cliente && $soporte) {
            try {
                $cliente->devolver($numeroProducto);
                // Actualizamos contadores si los tienes, por ejemplo:
                if ($this->numProductosAlquilados > 0) $this->numProductosAlquilados--;
            } catch (\PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Util\VideoclubException $e) {
                echo "<p>No se pudo devolver el soporte: " . $e->getMessage() . "</p>";
            }
        } else {
            echo "<p>No se puede devolver, cliente o soporte no encontrados</p>";
        }

        return $this; // permite encadenamiento
    }    

    // Devuelve múltiples productos de un socio
    public function devolverSocioProductos(int $numSocio, array $numerosProductos) {
        $cliente = null;
        $soportesParaDevolver = [];

        // Buscar cliente
        foreach ($this->socios as $s) {
            if ($s->getNumero() == $numSocio) {
                $cliente = $s;
                break;
            }
        }

        if (!$cliente) {
            echo "<p>Cliente no encontrado</p>";
            return $this;
        }

        // Verificar que todos los soportes existen y están alquilados por el cliente
        foreach ($numerosProductos as $numProd) {
            $soporte = null;
            foreach ($this->productos as $p) {
                if ($p->getNumero() == $numProd) {
                    $soporte = $p;
                    break;
                }
            }
            if (!$soporte || !$cliente->tieneAlquilado($soporte)) {
                echo "<p>No se puede devolver, alguno de los productos no estaba alquilado por el cliente.</p>";
                return $this; // aborta sin devolver nada
            }
            $soportesParaDevolver[] = $soporte;
        }

        // Devolver todos los soportes
        foreach ($soportesParaDevolver as $s) {
            $cliente->devolver($s->getNumero());
            if ($this->numProductosAlquilados > 0) $this->numProductosAlquilados--;
        }

        return $this; // permite encadenamiento
    }

}
?>