<?php 
require_once 'Soporte.php';
require_once 'CintaVideo.php';
require_once 'Dvd.php';
require_once 'Juego.php';
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
        echo "<p>producto: ".$producto->muestraResumen()." añadido al videoclub<p>";
    }
    
    // Método que incluye las cintas de video al videoclub
    public function incluirCintaVideo($titulo, $precio, $duracion){
        $cinta = new CintaVideo($titulo, $precio, $this->numProductos + 1, $duracion);
        $this->incluirProducto($cinta);
    }

    // Método que incluye los dvd al videoclub
    public function incluirDvd($titulo, $precio, $idiomas, $pantalla){
        $dvd = new Dvd($titulo, $precio, $this->numProductos + 1, $idiomas, $pantalla);
        $this->incluirProducto($dvd);
    }

    // Método que incluye los Juegos al videoclub
    public function incluirJuego($titulo, $precio, $consola, $minJ, $maxJ){
        $juego = new Juego($titulo, $precio, $this->numProductos + 1, $consola, $minJ, $maxJ);
        $this->incluirProducto($juego);
    }
}

?>