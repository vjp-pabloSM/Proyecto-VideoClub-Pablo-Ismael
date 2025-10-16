<?php 
require_once 'Soporte.php';
require_once 'CintaVideo.php';
require_once 'Dvd.php';
require_once 'Juego.php';
require_once 'Cliente.php';

// Clase videoclub que relaciona las clases cliente y soporte
class Videoclub{
    private $nombre;
    private $productos = [];
    private $numProductos = 0;
    private $socios = [];
    private $numSocios = 0;

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
        $cliente = new Cliente($nombre, $this->numSocios, $maxAlquilerConcurrente);
        $this->socios[] = $cliente;
        $this->numSocios++;
        echo "<p>El cliente " . $nombre . " (nº " . ($this->numSocios+1) . ") ha sido añadido correctamente</p>";
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

    // Método para alquilarle porductos a los socios
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
            $cliente->alquilar($soporte);
        } else {
            echo "<p>No se puede realizar el alquiler, cliente o soporte no encontrados</p>";
        }
    }
}

?>