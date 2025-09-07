<?php
	session_start();
	if (isset($_SESSION['mode']) && $_SESSION['mode'] == 1) {
		header("Location: bienvenida.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" href="./css/style_login.css" />
	<link rel="stylesheet" href="./css/style_menu.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
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
	<script src="js/jquery-3.3.1.min.js"></script>

	<script>
		function validaCampos() {
			var user = $("#user").val();
			var pass = $("#pass").val();

			if (user == "" || pass == "") {
				$("#mensaje").html("Faltan campos por llenar");
				setTimeout('$("#mensaje").html("");',5000);
				return;
			}

			$.ajax({
				url 		: './funciones/validaUsuario.php',
				type 		: 'post',
				dataType 	: 'text',
				data 		: 'mode=1&user=' + user + '&pass=' + pass,
				success		: function(res) {
					if (res == 0) {
						$("#mensaje").html("Datos incorrectos");
						setTimeout('$("#mensaje").html("");',5000);
					} else {
						window.location.href = "bienvenida.php";
					}
				},
				error		: function() {
					alert('Error: Archivo no encontrado.');
				}
			});
		}
	</script>

</head>
<body>

<?php require "./funciones/menu_principal.html"; ?>
	<div class="login">
		<h1>Login</h1><br>
		<form name="forma01">
			<input type="email" id="user" name="user" placeholder="Escribe tu correo"><br><br>

			<input type="password" id="pass" name="pass" placeholder="Escribe tu contraseña"><br><br>

			<input type="submit" onclick="validaCampos(); return false;" value="Enviar">

			<div id="mensaje" class="alerta"></div>
		</form><br><br>
	</div>
	
</body>
</html>