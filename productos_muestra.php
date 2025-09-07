<meta charset="utf-8">
<title>Mostrar producto</title>
<head>

</head>

<style>
	 body {
		background-image: url("imagenes/fondo10.jpg");
		background-attachment: fixed;
		background-size: cover;
	}
    .titulo {
        text-align: center;
        font-family:'Times New Roman', Times, serif;
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
    	.a {
        text-align: center;
		color: black;
	}
    img {
		height: 200px;
	}
    a{
        color: gray;
    }
</style>

<body>
	<?php require "funciones/menu.php"; ?>

	<br><br><h1 class="titulo">Detalle de Productos</h1>

	<div class="titulo">
		<a href="productos_lista.php"><< Regresar al listado</a>
	</div><br>

	<table class="tabla" border="2" align="center">
		<tr class="encabezado">
			<td>
				ID
			</td>

			<td>
				Nombre
			</td>

			<td>
				Código
			</td>

			<td>
				Descripción
			</td>

			<td>
				Costo
			</td>

			<td>
				Stock
			</td>

			<td>
				Status
			</td>

			<td>
				Imagen
			</td>
		</tr>

		<?php
			require "funciones/conecta.php";
			$con = conecta();

			$id = $_REQUEST['id'];

			$sql = "SELECT * FROM productos WHERE id = $id";
			$res = $con->query($sql);

			$row = $res->fetch_array();
			$id				= $row["id"];
			$nombre			= $row["nombre"];
			$codigo			= $row["codigo"];
			$descripcion	= $row["descripcion"];
			$costo			= $row["costo"];
			$stock			= $row["stock"];
			$status			= $row["status"] == 1 ? "Activo" : "Inactivo";
			$archivo		= "archivos/".$row["archivo"];

			echo "<tr>
				<td>
					$id
				</td>

				<td>
					$nombre
				</td>

				<td>
					$codigo
				</td>

				<td class=\"texto\">
					$descripcion
				</td>

				<td>
					$costo
				</td>

				<td>
					$stock
				</td>

				<td>
					$status
				</td>

				<td>
					<img src=\"$archivo\">
				</td>
			</tr>";
		?>

	</table>
</body>