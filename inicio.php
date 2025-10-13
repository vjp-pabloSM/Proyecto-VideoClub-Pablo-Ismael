<?php
//Inicio Soporte
include "Soporte.php";

$soporte1 = new Soporte("Batman", 22, 3); 
echo "<strong>" . $soporte1->titulo . "</strong>"; 
echo "<br>Precio: " . $soporte1->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " €<br>";
$soporte1->muestraResumen();

// Inicio CintaVideo
include "CintaVideo.php";

$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107); 
echo "<strong>" . $miCinta->titulo . "</strong>"; 
echo "<br>Precio: " . $miCinta->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " €<br>";$miCinta->muestraResumen();

//Inicio Dvd
include "Dvd.php";

$miDvd = new Dvd("Origen", 24, 15, "es, en, fr", "16:9"); 
echo "<strong>" . $miDvd->titulo . "</strong>"; 
echo "<br>Precio: " . $miDvd->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $miDvd->getPrecioConIva() . " €<br>";
$miDvd->muestraResumen();

//Inicio Juego
include "Juego.php";

$miJuego = new Juego("The Last of Us Part II", 26, 49.99, "PS4", 1, 1); 
echo "<strong>" . $miJuego->titulo . "</strong>"; 
echo "<br>Precio: " . $miJuego->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $miJuego->getPrecioConIva() . " €<br>";
$miJuego->muestraResumen();
?>