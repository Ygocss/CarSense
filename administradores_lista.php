<title>Lista de administradores</title>
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
    a{
        color: gray;
    }
     button {
        font-family: sans-serif;
    }

</style>

<script src="js/jquery-3.3.1.min.js"></script>
<script>
	function Eliminar(fila) {
		if (!confirm("Confirma si desea eliminarlo")) {
			return;
		}

		$.ajax({
			url 		: 'administradores_elimina.php',
			type 		: 'post',
			dataType 	: 'text',
			data 		: 'id=' + fila,
			success		: function(res) {
				if (res == true) {
					$('#'+fila).hide();
				} else {(res == false)
					alert('Error: Falló la eliminación.');
				}
			},
		});
	}
</script>
<body>
    <?php require "funciones/menu.php"; ?>

	<br><br><h1 class="titulo">Listado de Administradores</h1>
    <div class="titulo">
		<a href="administradores_alta.php">Crear nuevo registro >></a>
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
            <td colspan="3">
            </td>    
		</tr>


<?php
//admisnitradores_lista.php
require "funciones/conecta.php";
$con = conecta();

$sql = "SELECT * FROM administradores
        WHERE status = 1 AND eliminado = 0";
$res = $con->query($sql);

while($row = $res->fetch_array()){
    $id        = $row["id"];
    $nombre    = $row["nombre"];
    $apellidos = $row["apellidos"];
    $correo	   = $row["correo"];
    $rol	   = $row["rol"] == 1 ? "Gerente" : "Ejecutivo";
    echo "<tr id=\"$id\">
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
             <button onclick=\"Eliminar($id);\">Eliminar</button>
          </td>
          <td>
            <button onclick=\"window.location.href = 'administradores_edita.php?id=$id'\">Editar</button>
          </td>
          <td>
			<button onclick=\"window.location.href = 'administradores_muestra.php?id=$id'\">Ver detalle</button>
          </td>

          </tr>";

}
?>  