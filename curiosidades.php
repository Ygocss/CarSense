<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>curiosidades</title>
    <link rel="stylesheet" href="./css/style_curiosidades.css">
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
<?php require "./funciones/menu_principal.html"; ?><br><br><br>



<?php
			require "funciones/conecta.php";
			$con = conecta();

			$sql = "SELECT * FROM banners WHERE eliminado = 0 AND status = 1 ORDER BY RAND() LIMIT 1";
			$res = $con->query($sql);
			$row = $res->fetch_array();
			$archivo = "./archivos/" . $row["archivo"];
			echo "<img class=\"banner\" src=\"$archivo\"><br><br>";

			while ($row = $res->fetch_array()) {
				
				$archivo	= "./archivos/" . $row["archivo"];
			}
?>

<section class="sec1">
        <div class="content">
            <h1>Datos<br>interesantes
            </h1>



            <div class="fila1">
                <a href="datos_accidentesviales.php">
                    <img src="imagenes/accidentesviales.jpg" width="100%" height="200px">
                    <p class="texto">Accidentes viales </p>
                </a>
            </div>

            <div class="fila2">
                <a href="datos_seguridadvial.php">
                    <img src="imagenes/seguridadvial3.jpg" width="100%" height="200px">
                    <p class="texto">Seguridad Vial </p>
                </a>
            </div>

			<div class="fila3">
                <a href="datos_transito.php">
                    <img src="imagenes/transito.jpeg" width="100%" height="200px">
                    <p class="texto">Transito </p>
                </a>
            </div>

            <div class="fila4">
                <a href="datos_multas.php">
                     <img src="imagenes/multas.jpg" width="100%" height="200px">
                     <p class="texto">Multas </p>
                </a>
            </div>

            <div class="fila5">
                <a href="datos_señalamiento.php">
                     <img src="imagenes/señales2.avif" width="100%" height="200px">
                     <p class="texto">Señalamiento</p>
                </a>
            </div>

            <div class="fila6">
                <a href="datos_reglamento.php">
                     <img src="imagenes/reglamento2.webp" width="100%" height="200px">
                     <p class="texto">Reglamento</p>
                </a>
            </div>
            <div class="fila7">
                <a href="datos_educacionvial.php">
                     <img src="imagenes/educacionvial2.png" width="100%" height="200px">
                     <p class="texto">Educacion Vial </p>
                </a>
            </div>

            <div class="fila8">
                <a href="datos_autos.php">
                     <img src="imagenes/autos.jpg" width="100%" height="200px">
                     <p class="texto">Autos</p>
                </a>
            </div>

            <div class="fila9">
                <a href="datos_señalesescolares.php">
                     <img src="imagenes/señalescolar.png" width="100%" height="200px">
                     <p class="texto">Señales Escolares </p>
                </a>
            </div>
    </div>
    </section><br><br><br><br><br>

    <?php require "funciones/footer.html"; ?>
</body>


</html>



