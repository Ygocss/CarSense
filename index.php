<?php
// index.php — Portada CarSense
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
  <title>CarSense — Educación vial y automotriz</title>

  <!-- Tipografía (opcional, recomendada) -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <!-- Tema CarSense -->
  <link rel="stylesheet" href="css/theme-carsense.css">

  <!-- Favicon (usa tus archivos actuales) -->
  <link rel="icon" type="image/png" sizes="32x32" href="Favicon/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="Favicon/favicon-16x16.png">
  <meta name="theme-color" content="#2563eb">
</head>
<body>

  <?php
    // Encabezado y chat (ya incluyen su propio CSS y script)
    require "funciones/menu_principal.html";
  ?>

  <!-- HERO -->
  <section id="hero" style="padding: 16px 0 10px; margin-top:0;">
    <div class="cs-container">
      <div class="cs-card" style="display:grid; grid-template-columns: 1.1fr 0.9fr; gap:22px; align-items:center;">
        <div>
          <h1 style="margin:0 0 10px; font-size: clamp(28px, 3.2vw, 38px);">
            Bienvenido a <span style="color:#2563eb;">CarSense</span>
          </h1>
          <p style="margin:0 0 16px; color:#475569; font-size:1.05rem;">
            Aprende mecánica automotriz básica y educación vial con contenido claro y visual.
            Nuestro objetivo: <strong>conducir más seguro</strong> y cuidar tu vehículo con buenas prácticas.
          </p>
          <div style="display:flex; gap:12px; flex-wrap:wrap;">
            <a class="cs-btn" href="clientes_productos.php">Ver artículos</a>
            <a class="cs-btn secondary" href="curiosidades.php">Datos interesantes</a>
          </div>
        </div>
        <div style="text-align:center">
          <!-- Usa tus imágenes existentes; ajusta si cambiaste nombres -->
          <img src="imagenes/inicio1.png" alt="CarSense portada" style="max-width:100%; height:auto; border-radius:14px; box-shadow:0 10px 30px rgba(2,8,23,.12);">
        </div>
      </div>
    </div>
  </section>

  <!-- SECCIÓN 2: Introducción breve -->
  <section style="padding: 10px 0 10px;">
    <div class="cs-container">
      <div class="cs-card">
        <p style="margin:0; font-size:1.05rem; color:#334155;">
          Esta aplicación web te ayuda a adquirir conocimientos esenciales sobre
          <strong>mecánica automotriz</strong> y <strong>educación vial</strong> mediante contenidos resumidos,
          ejemplos y material visual para aprender de forma práctica.
        </p>
      </div>
    </div>
  </section>

  <!-- SECCIÓN 3: Tres columnas temáticas -->
  <section style="padding: 10px 0 90px;">
    <div class="cs-container" style="display:grid; grid-template-columns: repeat(3, minmax(0,1fr)); gap:18px;">
      <!-- Columna 1 -->
      <div class="cs-card">
        <h2 style="margin:0 0 8px;">¿Qué es la educación vial?</h2>
        <p style="color:#475569">
          Es el conjunto de conocimientos y hábitos que promueven una convivencia segura en la vía
          para conductores, ciclistas y peatones. Su práctica reduce accidentes y fortalece la cultura de seguridad.
        </p>
        <div style="text-align:center; margin-top:8px;">
          <img src="imagenes/educacion vial.jpg" alt="Educación vial" style="max-width:100%; height:auto; border-radius:10px;">
        </div>
      </div>

      <!-- Columna 2 -->
      <div class="cs-card">
        <h2 style="margin:0 0 8px;">¿Qué es la mecánica automotriz?</h2>
        <p style="color:#475569">
          Rama de la mecánica que estudia cómo se genera y transmite el movimiento en un vehículo.
          Aplica principios de física para diagnosticar, mantener y optimizar el desempeño de tu auto.
        </p>
        <div style="text-align:center; margin-top:8px;">
          <img src="imagenes/mecanicaautomotriz.jpeg" alt="Mecánica automotriz" style="max-width:100%; height:auto; border-radius:10px;">
        </div>
      </div>

      <!-- Columna 3 -->
      <div class="cs-card">
        <h2 style="margin:0 0 8px;">Cultura vial en México</h2>
        <p style="color:#475569">
          El tráfico y la congestión son retos diarios. Respetar señalamientos, límites de velocidad y
          compartir la vía con peatones y ciclistas es clave para mejorar la seguridad.
        </p>
        <p style="color:#475569">
          La infraestructura segura y la educación continua reducen riesgos y fomentan una movilidad responsable.
        </p>
      </div>
    </div>
  </section>

  <?php require "funciones/footer.html"; ?>

</body>
</html>
