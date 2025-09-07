<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Detalle producto</title>
    <link rel="stylesheet" href="./css/style_productos_muestra.css">

	<script src="js/jquery-3.3.1.min.js"></script>
	

</head>
<body>
	<?php require "funciones/menu_principal.html"; ?>
	<br><br><br>
	<div class="titulo">Detalles de la parte del Auto</div>

	<?php
		$idP = $_REQUEST['idP'];

		require "funciones/conecta.php";
		$con = conecta();

		$sql = "SELECT * FROM productos WHERE id = $idP";
		$res = $con->query($sql);
		$row = $res->fetch_array();

		$nombre		= $row["nombre"];
		$descripcion= $row["descripcion"];
		$archivo	= "archivos/" . $row["archivo"];
	?>

	<div class="producto">
		<div class="producto_imagen">
			<img class="producto_imagen" src="<?php echo "$archivo";?>">
		</div>
		
		<div class="detalles">
		    <?php
            echo"<br><div>
                Nombre: $nombre<br><br>
				Descripcion: <br>$descripcion<br></div>";
            ?>
            
		</div>
	</div>

</body>
</html>