<?php
// Ubicación: funciones/menu.php
session_start();

// Proteger área de admin (igual que antes)
if (!isset($_SESSION['mode']) || $_SESSION['mode'] != 1) {
    header("Location: administradores_login.php");
    exit;
}

$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';
$safeNombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');

// Branding (por si no se incluyó conecta.php antes)
$SITE_NAME = defined('SITE_NAME') ? SITE_NAME : 'CarSense';
?>
<!-- Hoja de tema (puede ir en el <head>, pero aquí funciona igual) -->
<link rel="stylesheet" href="css/theme-carsense.css">

<!-- Navbar CarSense (admin) -->
<div class="cs-navbar">
  <div class="brand">
    <img src="imagenes/logo-carsense.png" alt="<?php echo $SITE_NAME; ?>" />
    <span><?php echo $SITE_NAME; ?> · Admin</span>
  </div>

  <nav>
    <a href="bienvenida.php">Inicio</a>
    <a href="administradores_lista.php">Administradores</a>
    <a href="productos_lista.php">Imágenes</a>
    <a href="banners_lista.php">Banners</a>
    <a href="salir.php?mode=1" title="Cerrar sesión de <?php echo $safeNombre; ?>">Salir</a>
  </nav>
</div>
