<?php


use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Dvd;
use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\CintaVideo;
use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Juego;

require_once __DIR__ . '/../app/autoload.php';

// Inicio Dvd
$soporte1 = new Dvd("Batman", 22, 17, "es, en", "16:9"); 
echo "<strong>" . $soporte1->titulo . "</strong>"; 
echo "<br>Precio: " . $soporte1->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIva() . " €<br>";
$soporte1->muestraResumen();

// Inicio CintaVideo
$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107); 
echo "<strong>" . $miCinta->titulo . "</strong>"; 
echo "<br>Precio: " . $miCinta->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " €<br>";
$miCinta->muestraResumen();

//Inicio Dvd
$miDvd = new Dvd("Origen", 24, 15, "es, en, fr", "16:9"); 
echo "<strong>" . $miDvd->titulo . "</strong>"; 
echo "<br>Precio: " . $miDvd->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " €<br>";
$miDvd->muestraResumen();

//Inicio Juego
$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1); 
echo "<strong>" . $miJuego->titulo . "</strong>"; 
echo "<br>Precio: " . $miJuego->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " €<br>";
$miJuego->muestraResumen();
?>