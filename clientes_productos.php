<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Productos</title>
	<link rel="stylesheet" href="./css/style_productos.css" />
	<script src="js/jquery-3.3.1.min.js"></script>
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
<body>
	<?php require "funciones/menu_principal.html"; ?>
    
	<br><br><br>
	<div class="titulo">Conoce las partes más importantes de un Auto</div>

	<div class="opciones">

		<?php
			require "funciones/conecta.php";
			$con = conecta();

			$sql = "SELECT * FROM productos WHERE eliminado = 0 AND status = 1";
			$res = $con->query($sql);

			while ($row = $res->fetch_array()) {
				$idP		= $row["id"];
				$nombre		= $row["nombre"];
				$archivo	= "archivos/" . $row["archivo"];
		?>

		<div class="producto">
			<a href="clientes_muestra.php?idP=<?php echo "$idP";?>">
				<div class="producto_imagen">
					<img class="producto_imagen" src="<?php echo "$archivo";?>">
				</div>

				<div class="nombre_producto">
					<?php
					    echo"<br>
					    $nombre";
					;?>
				</div>

			</a>	
		</div>
		
		<?php
			}
		?>
	</div>
    
</body>
</html>

