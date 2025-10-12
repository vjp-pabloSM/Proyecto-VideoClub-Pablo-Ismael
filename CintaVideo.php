<?php 
class cintaVideo extends Soporte{
    private $duracion;

    public function __construct($titulo, $numero, $precio, $duracion) {
        parent::__construct($titulo, $numero, $precio);
        $this->duracion = $duracion;
    }
    public function muestraResumen(){
        parent::muestraResumen();
        echo "Duración: " . $this->duracion . " minutos<br>" ;
    }
}
?>