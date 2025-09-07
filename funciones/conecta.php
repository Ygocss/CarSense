<?php
// Ubicación: funciones/conecta.php

/* ====== Branding e interfaz (no imprimen nada) ====== */
if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'CarSense');          // Nombre público del sitio
}
if (!defined('BASE_URL')) {
    define('BASE_URL', '/CARSENSE/');         // Ruta base en Apache (ajusta si renombraste la carpeta)
}

/* ====== Configuración de base de datos (igual que antes) ====== */
define('HOST', 'localhost');
define('BD',   'proyecto');
define('USER_BD', 'root');
define('PASS_BD', '');

/* ====== Conexión ====== */
function conecta() {
    $con = new mysqli(HOST, USER_BD, PASS_BD, BD);

    if ($con->connect_errno) {
        // Si lo prefieres, cambia 'die' por manejo propio de errores/logs
        die('Error de conexión a la base de datos: ' . $con->connect_error);
    }

    // Charset para acentos/emojis y evitar problemas de collation
    if (method_exists($con, 'set_charset')) {
        $con->set_charset('utf8mb4');
    }

    return $con;
}
?>
