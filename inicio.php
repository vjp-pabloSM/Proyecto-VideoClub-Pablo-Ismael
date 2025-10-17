<?php

//Inicio Soporte
include_once "Resumible.php";
include_once "Soporte.php";
include_once "CintaVideo.php";
include_once "Dvd.php";
include_once "Juego.php";

// Alterado para los cambios hechos en soporte
$soporte1 = new Dvd("Batman", 22, 17, "es, en", "16:9"); 
echo "<strong>" . $soporte1->titulo . "</strong>"; 
echo "<br>Precio: " . $soporte1->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $soporte1->getPrecioConIVA() . " €<br>";
$soporte1->muestraResumen();

// Inicio CintaVideo
$miCinta = new CintaVideo("Los cazafantasmas", 23, 3.5, 107); 
echo "<strong>" . $miCinta->titulo . "</strong>"; 
echo "<br>Precio: " . $miCinta->getPrecio() . " €"; 
echo "<br>Precio IVA incluido: " . $miCinta->getPrecioConIva() . " €<br>";$miCinta->muestraResumen();

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