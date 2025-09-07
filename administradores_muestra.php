<meta charset="utf-8">
<title>Mostrar administrador</title>
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
        border-color: whitesmoke;
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
     button {
        font-family: sans-serif;
    }
    
</style>

<body>
    <?php require "funciones/menu.php"; ?>
    
	<br><br><h1 class="titulo">Detalle Administradores</h1>

	<div class="titulo">
		<a href="administradores_lista.php"><< Regresar al listado</a>
	</div><br>

	<table class="tabla" border="2" align="center">
		<tr class="encabezado">
			<td align="center">
				ID
			</td>

			<td align="center">
				Nombre
			</td>

			<td align="center">
				Correo
			</td>

			<td align="center">
				Rol
			</td>
            <td>
				Status
			</td>
            <td>
				Fotografía
			</td>
		</tr>

		<?php
			require "funciones/conecta.php";
			$con = conecta();

			$id = $_REQUEST['id'];

			$sql = "SELECT * FROM administradores WHERE id = $id";
			$res = $con->query($sql);

			$row = $res->fetch_array();
			$id			= $row["id"];
			$nombre		= $row["nombre"];
			$apellidos	= $row["apellidos"];
			$correo		= $row["correo"];
			$rol		= $row["rol"] == 1 ? "Gerente" : "Ejecutivo";
			$status		= $row["status"] == 1 ? "Activo" : "Inactivo";
            $archivo	= "archivos/".$row["archivo"];

			echo "<tr>
				<td>
					$id
				</td>

				<td>
					$nombre $apellidos
				</td>

				<td>
					$correo
				</td>

				<td>
					$rol
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