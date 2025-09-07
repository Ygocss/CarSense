<meta charset="utf-8">
<title>Listar banners</title>
<head>
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
</head>

<style>
	body {
		background-image: url("imagenes/fondo10.jpg");
		background-attachment: fixed;
		background-size: cover;
	}
    .titulo {
        text-align: center;
		font-family: 'Times New Roman', Times, serif;
        color: black;
        font-weight: 100;
    }
	.tabla {
		text-align: center;
        background-color:whitesmoke;
        width: 50%;
        border-color: aliceblue;
        font-size: 16px;
        font-family:sans-serif;
        border-radius: 5px;
	}
    .encabezado {
        background-color: #163250;
        color: white;
        font-weight: bold;
        
    }
    a{
        color: gray;
    }
    button {
        font-family: sans-serif;
    }
</style>
<script src="js/jquery-3.3.1.min.js"></script>

<script>
	function eliminaFilas(fila) {	
		if (!confirm("Confirma si desea eliminar este producto")) {
			return;
		}

		$.ajax({
			url 		: 'banners_elimina.php',
			type 		: 'post',
			dataType 	: 'text',
			data 		: 'id=' + fila,
			success		: function(res) {
				if (res == true) {
					$('#'+fila).hide();
				} else {//(res == false)
					alert('Error: Falló la eliminación.');
				}
			},
			error		: function() {
				alert('Error: Archivo no encontrado.');
			}
		});
	}
</script>



<body>
	<?php require "funciones/menu.php"; ?>
		<br><br><h1 class="titulo">Listado de Banners</h1>

	<table class="tabla" border="2" align="center">
		<div class="titulo">
			<a href="banners_alta.php">Crear nuevo registro >></a>
	    </div><br>

		<tr class="encabezado">
			<td>
				ID
			</td>

			<td>
				Nombre
			</td>

			<td colspan="3">
			</td>
		</tr>

		<?php
			require "funciones/conecta.php";//Cargamos un archivo/libreria
			$con = conecta();//Función del archivo que acabamos de cargar

			$sql = "SELECT * FROM banners WHERE eliminado = 0";
			$res = $con->query($sql);
			$cont = 1;

			while ($row = $res->fetch_array()) {
				$id			= $row["id"];
				$nombre		= $row["nombre"];

				echo "<tr id=\"$id\">
					<td>
						$id
					</td>

					<td>
						$nombre
					</td>

					<td>
						<button onclick=\"eliminaFilas($id);\">Eliminar</button>
					</td>

					<td>
						<button onclick=\"window.location.href = 'banners_edita.php?id=$id'\">Editar</button>
					</td>

					<td>
						<button onclick=\"window.location.href = 'banners_muestra.php?id=$id'\">Ver detalle</button>
					</td>
				</tr>";

				$cont++;
			}
		?>

	</table>
</body>