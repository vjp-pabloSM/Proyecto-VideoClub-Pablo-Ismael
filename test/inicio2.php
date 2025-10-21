<?php

use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Videoclub;

require_once __DIR__ . '/../app/autoload.php';

// crear videoclub y añadir soportes
$vc = new Videoclub('Pruebas');
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107);
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Origen", 15, "es,en,fr", "16:9");
$vc->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9");

// crear socios (usar Videoclub para gestionar socios)
$vc->incluirSocio("Guillermo Díaz", 3); // será socio nº 1
$vc->incluirSocio("Samuel de Luque", 3); // será socio nº 2

$vc->alquilarSocioProducto(1,1)   // socio 1 alquila soporte 1
   ->alquilarSocioProducto(1,2)  // encadenado
   ->alquilarSocioProducto(1,3); // encadenado

// listar socios y alquileres
$vc->listarSocios();
$vc->listarProductos();

?>