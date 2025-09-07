<html>
<head>
	<title>Alta de administradores</title>

	<script src="js/jquery-3.3.1.min.js"></script>

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
        .alta {
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
	

	<script>
		function validaCampos() {
			var nombre		= document.forma01.nombre.value;
			var apellidos	= document.forma01.apellidos.value;
			var correo		= document.forma01.correo.value;
			var pass		= document.forma01.pass.value;
			var rol			= document.forma01.rol.value;
			var archivo		= document.forma01.archivo.value;

			if (nombre == "" || apellidos == "" || correo == "" || pass == "" || rol == "" || archivo == "") {
				$("#mensaje").html("Faltan campos por llenar");
				setTimeout('$("#mensaje").html("");',5000);
				return;
			}

			$.ajax({
				url 		: 'funciones/validaCorreo.php',
				type 		: 'post',
				dataType 	: 'text',
				data 		: 'mode=1&id=-1&correo=' + correo,
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
			document.forma01.action  = "administradores_salva.php";
			document.forma01.submit();
		}
	</script>

</head>
<body>
    <?php require "funciones/menu.php"; ?>
	
	<br><br><h1 class="titulo">Alta de Administradores</h1>
	<div class="titulo">
        <a href="administradores_lista.php"><< Regresar al listado</a>
	</div><br>
    
    <div class="alta">
	<form name="forma01">
		<input type="text" name="nombre" placeholder="Nombre"><br>

		<input type="text" name="apellidos" placeholder="Apellidos"><br>

		<input type="email" name="correo" placeholder="Correo">
		<div id="mensajeCorreo" class="alerta"></div>

		<input type="password" name="pass" placeholder="Contraseña"><br>

		<select  name="rol">
			<option value="">Selecciona un rol</option>
			<option value="1">Gerente</option>
			<option value="2">Ejecutivo</option>
		</select><br><br>

		Fotografía:<input type="file" id="archivos" name="archivo" accept="image/*"><br>
		<img id="imagen" src=""><br><br>

		<input type="submit" onclick="validaCampos(); return false;" value="Enviar">

		<div id="mensaje" class="alerta"></div>
	</form>

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