<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name="author" content="IsmaelGJ">
   <title>Inicio 3</title>
   <link rel="stylesheet" href="../css/estiloVideoclub.css">
</head>
<body>
   <h1>Estás en Inicio 3</h1>
<?php

use PROYECTO_VIDEOCLUB_PABLO_ISMAEL\Videoclub;

require_once __DIR__ . '/../app/autoload.php';

$vc = new Videoclub("La Caverna de Platón"); 

//voy a incluir unos cuantos soportes de prueba 
$vc->incluirJuego("God of War", 19.99, "PS5", 1, 1); 
$vc->incluirJuego("The Last of Us Part II", 49.99, "PS4", 1, 1);
$vc->incluirDvd("Torrente", 4.5, "es","16:9"); 
$vc->incluirDvd("Interstellar", 4.5, "es,en,fr", "16:9"); 
$vc->incluirDvd("El Imperio Contraataca", 3, "es,en","16:9"); 
$vc->incluirCintaVideo("Los cazafantasmas", 3.5, 107); 
$vc->incluirCintaVideo("El nombre de la Rosa", 1.5, 140); 

//listo los productos 
$vc->listarProductos(); 

//voy a crear algunos socios 
$vc->incluirSocio("Benito Martínez", 2); 
$vc->incluirSocio("Emmanuel Gazmey"); 

// Encadenamiento de operaciones de alquiler
$vc->alquilarSocioProducto(1,2)
   ->alquilarSocioProducto(1,3)
   // intento alquilar de nuevo el soporte 2 (debe detectar que ya está alquilado)
   ->alquilarSocioProducto(1,2)
   // intento alquilar el soporte 6 (debe respetar el límite de alquileres)
   ->alquilarSocioProducto(1,6);

//listo los socios 
$vc->listarSocios();

?>
</body>
</html>