<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registro</title>
	<link rel="stylesheet" href="./css/registro.css" />
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
	<script>
		function validaCampos() {
			var nombre		= document.forma01.nombre.value;
			var apellidos	= document.forma01.apellidos.value;
			var correo		= document.forma01.correo.value;
			var pass		= document.forma01.pass.value;

			if (nombre == "" || apellidos == "" || correo == "" || pass == "") {
				$("#mensaje").html("Faltan campos por llenar");
				setTimeout('$("#mensaje").html("");',5000);
				return;
			}

			$.ajax({
				url 		: 'funciones/validaCorreo.php',
				type 		: 'post',
				dataType 	: 'text',
				data 		: 'mode=0&id=-1&correo=' + correo,
				success		: function(res) {
					if (res == 0) {
						enviaDatos();
					} else {
						$("#mensajeCorreo").html("El correo " + correo + " ya existe");
						setTimeout('$("#mensajeCorreo").html("");',5000);
					}
				},
			});
		}

		function enviaDatos() {
			document.forma01.method  = "POST";
			document.forma01.action  = "clientes_salva.php";
			document.forma01.submit();
		}
	</script>
</head>
<body>
	<?php require "funciones/menu_principal.html"; ?><br><br><br>
	
	<br><b><div id="alta">
		<h1 class="h1">Nuevo registro</h1><br>
	<form name="forma01" class="form_box">
		<input type="text" name="nombre" placeholder="Nombre"><br>
		<input type="text" name="apellidos" placeholder="Apellidos"><br>
		<input type="email" name="correo" placeholder="Correo">
		<div id="mensajeCorreo" class="alerta"></div>
		<input type="password" name="pass" placeholder="Contraseña"><br><br>
		<input type="submit" onclick="validaCampos(); return false;" value="Guardar">
		<div id="mensaje" class="alerta"></div> <br><br>
	</form>
	
</body>
<?php require "funciones/footer.html"; ?>
</html>