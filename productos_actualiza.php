<?php
	
	require "funciones/conecta.php";
	$con = conecta();

	$id 			= $_REQUEST['id'];
	$nombre			= $_REQUEST['nombre'];
	$codigo			= $_REQUEST['codigo'];
	$descripcion	= $_REQUEST['descripcion'];
	$costo			= $_REQUEST['costo'];
	$stock			= $_REQUEST['stock'];
	$file_name		= $_FILES['archivo']['name'];		
	$file_tmp		= $_FILES['archivo']['tmp_name'];


	$sql = "UPDATE productos SET nombre = '$nombre', codigo = '$codigo', descripcion = '$descripcion', costo = $costo, stock = $stock";

	if ($file_name != "") {
		$cadena		= explode(".", $file_name);			
		$ext		= $cadena[count($cadena) - 1];		
		$dir		= "archivos/";						
		$file_enc	= md5_file($file_tmp);				
		$fileName1	= "$file_enc.$ext";					
		copy($file_tmp, $dir.$fileName1);				

		$sql = $sql . ", archivo_n = '$file_name', archivo = '$fileName1'";
	}

	$sql = $sql . " WHERE id = $id";



	$res = $con->query($sql);

	header("Location: productos_lista.php");
?>