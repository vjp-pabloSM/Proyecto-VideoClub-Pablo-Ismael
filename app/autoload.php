<?php
// Registra un cargador automático de clases
spl_autoload_register(function (string $class) {
    $prefix = 'PROYECTO_VIDEOCLUB_PABLO_ISMAEL\\'; // Namespace base
    $base_dir = __DIR__ . '/'; // Carpeta donde están las clases

    // Si la clase no usa el prefijo, salir
    if (strncmp($prefix, $class, strlen($prefix)) !== 0) {
        return;
    }

    // Ruta del archivo según el nombre de la clase
    $relative = substr($class, strlen($prefix));
    $file = $base_dir . str_replace('\\', '/', $relative) . '.php';

    // Si existe, lo carga
    if (file_exists($file)) {
        require_once $file;
    }
});
?>