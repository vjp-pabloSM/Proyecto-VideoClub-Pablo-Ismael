<?php
spl_autoload_register(function (string $class) {
    $prefix = 'PROYECTO_VIDEOCLUB_PABLO_ISMAEL\\';
    $base_dir = __DIR__ . '/'; // las clases están en app/

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
?>