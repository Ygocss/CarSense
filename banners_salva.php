<?php
	//Conexión a la base de datos
	require "funciones/conecta.php";
	$con = conecta();

	//Recibir variables
	$nombre		= $_REQUEST['nombre'];
	$file_name	= $_FILES['archivo']['name'];		//Nombre real del archivo
	$file_tmp	= $_FILES['archivo']['tmp_name'];	//Nombre temporal del archivo
	
	$cadena		= explode(".", $file_name);			//Separa el nombre por cada "." que encuentre y lo va guardanto en un array
	$ext		= $cadena[count($cadena) - 1];		//Extensión
	$dir		= "archivos/";						//Carpeta donde se guardan los archivos
	$file_enc	= md5_file($file_tmp);				//Encriptamos el contenido del archivo temporal y lo utilizamos como 
	$fileName1	= "$file_enc.$ext";					//Nuevo nombre de mi archivo
	copy($file_tmp, $dir.$fileName1);				//Copiamos el archivo a la carpeta dentro de nuestro servidor

	//Consulta/operación SQL
	$sql = "INSERT INTO banners (nombre, archivo) VALUES ('$nombre', '$fileName1')";//Definimos la operación
	$res = $con->query($sql);//Ejecutamos la operación

	header("Location: banners_lista.php");//Redireccionamos a otro archivo
?>