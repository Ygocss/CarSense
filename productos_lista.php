<meta charset="utf-8">
<title>Listar productos</title>
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
        color:black;
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
			url 		: 'productos_elimina.php',
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
	
	<br><br><h1 class="titulo">Lista de imagenes</h1>

	<table class="tabla" border="2" align="center">
		<div class="titulo">
			<a href="productos_alta.php">Crear nuevo registro >></a>
	    </div><br>

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

			<td colspan="3">
			</td>
		</tr>

		<?php
			require "funciones/conecta.php";//Cargamos un archivo/libreria
			$con = conecta();//Función del archivo que acabamos de cargar

			$sql = "SELECT * FROM productos WHERE eliminado = 0";
			$res = $con->query($sql);
			$cont = 1;

			while ($row = $res->fetch_array()) {
				$id			= $row["id"];
				$nombre		= $row["nombre"];
				$codigo		= $row["codigo"];

				echo "<tr id=\"$id\">
					<td>
						$id
					</td>

					<td>
						$nombre
					</td>

					<td>
						$codigo
					</td>

					<td>
						<button onclick=\"eliminaFilas($id);\">Eliminar</button>
					</td>

					<td>
						<button onclick=\"window.location.href = 'productos_edita.php?id=$id'\">Editar</button>
					</td>

					<td>
						<button onclick=\"window.location.href = 'productos_muestra.php?id=$id'\">Ver detalle</button>
					</td>
				</tr>";

				$cont++;
			}
		?>

	</table>
</body>