<?php
	session_start();
	if (isset($_SESSION['mode']) && $_SESSION['mode'] == 1) {
		header("Location: bienvenida.php");
		exit;
	}
	// Branding de apoyo por si no se ha incluido conecta.php aún
	if (!defined('SITE_NAME')) { define('SITE_NAME', 'CarSense'); }
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title><?php echo SITE_NAME; ?> · Login</title>

	<!-- Librerías existentes -->
	<script src="js/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="./css/Login.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

	<!-- Tema CarSense: se carga al final para sobrescribir estilos antiguos -->
	<link rel="stylesheet" href="css/theme-carsense.css">

	<!-- Favicon / PWA (lo dejamos igual) -->
	<link rel="apple-touch-icon" sizes="57x57" href="Favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="Favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="Favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="Favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="Favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="Favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="Favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="Favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="Favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="Favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="Favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="Favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="Favicon/favicon-16x16.png">
	<link rel="manifest" href="/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">

	<script>
		// Validación y login sin recargar (igual que antes, con mejoras menores)
		function validaCampos(ev) {
			if (ev) ev.preventDefault();
			var user = $("#user").val().trim();
			var pass = $("#pass").val().trim();

			if (user === "" || pass === "") {
				$("#mensaje").text("Faltan campos por llenar").addClass("cs-alert error");
				setTimeout(function(){ $("#mensaje").text("").removeClass("cs-alert error"); }, 5000);
				return false;
			}

			$("#btn-login").prop("disabled", true);

			$.ajax({
				url      : 'funciones/validaUsuario.php',
				type     : 'post',
				dataType : 'text',
				data     : 'mode=1&user=' + encodeURIComponent(user) + '&pass=' + encodeURIComponent(pass),
				success  : function(res) {
					if (res == 0) {
						$("#mensaje").text("Datos incorrectos").addClass("cs-alert error");
						setTimeout(function(){ $("#mensaje").text("").removeClass("cs-alert error"); }, 5000);
						$("#btn-login").prop("disabled", false);
					} else {
						window.location.href = "bienvenida.php";
					}
				},
				error    : function() {
					alert('Error: Archivo no encontrado.');
					$("#btn-login").prop("disabled", false);
				}
			});
			return false;
		}

		// Permitir Enter para enviar el formulario y evitar doble submit
		$(function(){
			$("#forma01").on("submit", validaCampos);
			$("#btn-login").on("click", validaCampos);
		});
	</script>

	<style>
		/* Ajustes mínimos para centrar usando el tema */
		.cs-auth-wrapper{min-height: calc(100vh - 120px); display:flex; align-items:center;}
		.cs-auth-card{max-width:520px;margin:24px auto;}
		.cs-brand-lockup{display:flex;align-items:center;gap:10px;margin-bottom:10px}
		.cs-brand-lockup img{height:34px;width:auto;display:block}
	</style>
</head>
<body>

	<?php require "./funciones/menu_principal.html"; ?>

	<div class="cs-container cs-auth-wrapper">
		<div class="cs-card cs-auth-card">
			<div class="cs-brand-lockup">
				<img src="imagenes/logo-carsense.png" alt="<?php echo SITE_NAME; ?>">
				<h1 style="margin:0;"><?php echo SITE_NAME; ?></h1>
			</div>

			<h2 style="margin-top:0;">Iniciar sesión</h2>
			<p class="cs-alert info" aria-live="polite">Usa tus credenciales para acceder al panel.</p>

			<form id="forma01" name="forma01" class="cs-form" method="post" action="javascript:void(0);">
				<label for="user">Correo</label>
				<input type="email" id="user" name="user" placeholder="Escribe tu correo" autocomplete="username" required>

				<label for="pass" style="margin-top:10px;">Contraseña</label>
				<input type="password" id="pass" name="pass" placeholder="Escribe tu contraseña" autocomplete="current-password" required>

				<div id="mensaje" style="margin-top:10px;"></div>

				<div style="margin-top:16px; display:flex; gap:10px; justify-content:flex-end;">
					<a class="cs-btn secondary" href="registrarse.php">Crear cuenta</a>
					<button id="btn-login" class="cs-btn" type="submit">Ingresar</button>
				</div>
			</form>

			<div style="margin-top:12px; color:#64748b;">
				¿Olvidaste tu contraseña? Contacta al administrador del sitio.
			</div>
		</div>
	</div>

	<?php require "./funciones/footer.html"; ?>

</body>
</html>
