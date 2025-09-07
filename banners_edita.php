<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar banner</title>
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
    <style>
		body {
		background-image:url(imagenes/fondo10.jpg);
		background-attachment: fixed;
		background-size: cover;
	    }
		.alerta {
			color: red;
            font-size: 20px;
		}

		#mensajeCodigo {
			float: center;
            font-size: 20px;
		}
        .titulo {
        text-align: center;
        font-family:'Times New Roman', Times, serif;
        color: black;
        font-weight: 100;
    }
        .editar {
            text-align: center;
            color:#D4F7F2;
            font-size: 12px;
            font-style: italic;
        }
        	#imagen {
			height: 200px;
		}
        a{
        color: gray;
		}
	</style>

	<script src="js/jquery-3.3.1.min.js"></script>

	<script>
		function validaCampos() {
			var id			= document.forma01.id.value;
			var nombre		= document.forma01.nombre.value;

			if (nombre == "") {
				$("#mensaje").html("Faltan campos por llenar");
				setTimeout('$("#mensaje").html("");',5000);
				return;
			}

			enviaDatos();
		}

		function enviaDatos() {
			document.forma01.method = "POST";
			document.forma01.enctype = "multipart/form-data";
			document.forma01.action = "banners_actualiza.php";
			document.forma01.submit();
		}
	</script>

	
</head>
<body>
	<?php require "funciones/menu.php"; ?>

	<br><br><h1 class="titulo">Edicion de Banners</h1>
	<div class="titulo">
        <a href="banners_lista.php"><< Regresar al listado</a>
	</div>
    
    <div class="editar">

	<?php
		require "funciones/conecta.php";
		$con = conecta();

		$id = $_REQUEST['id'];

		$sql = "SELECT * FROM banners WHERE id = $id";
		$res = $con->query($sql);

		$row = $res->fetch_array();
		$nombre		= $row["nombre"];
		$archivo	= "archivos/".$row["archivo"];

		echo "<form name=\"forma01\">
			<input type=\"hidden\" name=\"id\" value=\"$id\"><br>

			<input type=\"text\" name=\"nombre\" value=\"$nombre\" placeholder=\"Nombre\"><br><br>

			Imagen:<input type=\"file\" id=\"archivos\" name=\"archivo\" accept=\"image/*\"><br>
			<img id=\"imagen\" src=\"$archivo\"><br><br>

			<input type=\"submit\" onclick=\"validaCampos(); return false;\" value=\"Guardar\">

			<div id=\"mensaje\" class=\"alerta\"></div>
		</form>";
	?>

	<script>
		document.getElementById("archivos").onchange = function () {//La función getElementById() debe ubicarse en la parte inferior dentro del <body> </body> para funcionar
		    var reader = new FileReader();

		    reader.onload = function (e) {
		        // get loaded data and render thumbnail.
		        document.getElementById("imagen").src = e.target.result;
		    };

		    // read the image file as a data URL.
		    reader.readAsDataURL(this.files[0]);
		};
	</script>
</body>
</html>