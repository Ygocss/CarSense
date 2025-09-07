<html>
<head>
	<meta charset="utf-8">
	<title>Edicion de administradores</title>
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

		#mensajeCorreo {
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
            color:black;
            font-size: 12px;
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
			var apellidos	= document.forma01.apellidos.value;
			var correo		= document.forma01.correo.value;
			var pass		= document.forma01.pass.value;
			var rol			= document.forma01.rol.value;
            
			if (nombre == "" || apellidos == "" || correo == "" || pass == "" || rol == ""){
				$("#mensaje").html("Faltan campos por llenar");
				setTimeout('$("#mensaje").html("");',5000);
				return;
			}

			$.ajax({
				url 		: 'funciones/validaCorreo.php',
				type 		: 'post',
				dataType 	: 'text',
				data 		: 'mode=1&id=' + id + '&correo=' + correo,
				success		: function(res) {
					if (res == 0) {
						enviaDatos();
					} else {
						$("#mensajeCorreo").html("El correo " + correo + " ya existe");
						setTimeout('$("#mensajeCorreo").html("");',5000);
					}
				},
                error		: function() {
					alert('Error: Archivo no encontrado.');
				}
			});
		}

		function enviaDatos() {
			document.forma01.method  = "POST";
			document.forma01.enctype = "multipart/form-data";
			document.forma01.action  = "administradores_actualiza.php";
			document.forma01.submit();
		}
	</script>
</head>
<body>
    <?php require "funciones/menu.php"; ?>
    
	<br><br><h1 class="titulo">Edicion de Administradores</h1>
	<div class="titulo">
        <a href="administradores_lista.php"><< Regresar al listado</a>
	</div>
    
    <div class="editar">
        
	<?php
        require "funciones/conecta.php";
		$con = conecta();

		$id = $_REQUEST['id'];

		$sql = "SELECT * FROM administradores WHERE id = $id";
		$res = $con->query($sql);

		$row = $res->fetch_array();
		$nombre		= $row["nombre"];
		$apellidos	= $row["apellidos"];
		$correo		= $row["correo"];
		$rol		= $row["rol"];
        $archivo	= "archivos/".$row["archivo"];

		echo "<form name=\"forma01\">
			<input type=\"hidden\" name=\"id\" value=\"$id\"><br>

			<input type=\"text\" name=\"nombre\" value=\"$nombre\" placeholder=\"Nombre\"><br>

			<input type=\"text\" name=\"apellidos\" value=\"$apellidos\" placeholder=\"Apellidos\"><br>

			<input type=\"email\" name=\"correo\" value=\"$correo\" placeholder=\"Correo\">
			<div id=\"mensajeCorreo\" class=\"alerta\"></div>

			<input type=\"password\" name=\"pass\" placeholder=\"Nueva contraseña\"><br>

			<select  name=\"rol\">";

				if ($rol == 1) {
					echo "<option value=\"1\" selected>Gerente</option>
					<option value=\"2\">Ejecutivo</option>";
				} else if ($rol == 2) {
					echo "<option value=\"1\">Gerente</option>
					<option value=\"2\" selected>Ejecutivo</option>";
				}

			echo "</select><br><br>
            Fotografía:<input type=\"file\" id=\"archivos\" name=\"archivo\" accept=\"image/*\"><br><br>
			<img id=\"imagen\" src=\"$archivo\"><br><br>

			<input type=\"submit\" onclick=\"validaCampos(); return false;\" value=\"Enviar\">

			<div id=\"mensaje\" class=\"alerta\"></div>
		</form>";
	?>
        <script>
		document.getElementById("archivos").onchange = function () {
		    var reader = new FileReader();
		    reader.onload = function (e) {
		        document.getElementById("imagen").src = e.target.result;
		    };
		    reader.readAsDataURL(this.files[0]);
		};
	</script>
        

</body>
</html>