<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Agregar producto</title>
	
    
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

	<script src="js/jquery-3.3.1.min.js"></script>

	<script>
		function validaCampos() {
			var nombre		= document.forma01.nombre.value;
			var codigo		= document.forma01.codigo.value;
			var descripcion	= document.forma01.descripcion.value;
			var costo		= document.forma01.costo.value;
			var stock		= document.forma01.stock.value;
			var archivo		= document.forma01.archivo.value;

			if (nombre == "" || codigo == "" || descripcion == "" || costo == "" || stock == "" || archivo == "") {
				$("#mensaje").html("Faltan campos por llenar");
				setTimeout('$("#mensaje").html("");',5000);
				return;
			}

			$.ajax({
				url 		: 'funciones/validaCodigo.php',
				type 		: 'post',
				dataType 	: 'text',
				data 		: 'id=-1&codigo=' + codigo,
				success		: function(res) {
					if (res == 0) {
						enviaDatos();
					} else {
						$("#mensajeCodigo").html("El código " + codigo + " ya existe");
						setTimeout('$("#mensajeCodigo").html("");',5000);
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
			document.forma01.action  = "productos_salva.php";
			document.forma01.submit();
		}
	</script>

</head>
<body>
	<?php require "funciones/menu.php"; ?>
	<br><br><h1 class="titulo">Nuevo registro</h1>
	<div class="titulo">
        <a href="productos_lista.php"><< Regresar al listado</a><br>
	</div>
    <div class="alta">
        
	<form name="forma01">
		<input type="text" name="nombre" placeholder="Nombre"><br>

		<input type="text" name="codigo" placeholder="Código">
		<div id="mensajeCodigo" class="alerta"></div>

		<textarea name="descripcion" placeholder="Descripción" cols="22" rows="6"></textarea><br>

		Imagen:<input type="file" id="archivos" name="archivo" accept="image/*"><br>
		<img id="imagen" src=""><br><br>

		<input type="submit" onclick="validaCampos(); return false;" value="Guardar">

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