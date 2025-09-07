<?php
	
	require "funciones/conecta.php";
	$con = conecta();

	
	$nombre			= $_REQUEST['nombre'];
	$codigo			= $_REQUEST['codigo'];
	$descripcion	= $_REQUEST['descripcion'];
	$costo			= $_REQUEST['costo'];
	$stock			= $_REQUEST['stock'];
	$file_name		= $_FILES['archivo']['name'];		
	$file_tmp		= $_FILES['archivo']['tmp_name'];	
	
	$cadena		= explode(".", $file_name);				
	$ext		= $cadena[count($cadena) - 1];			
	$dir		= "archivos/";							
	$file_enc	= md5_file($file_tmp);					
	$fileName1	= "$file_enc.$ext";						
	copy($file_tmp, $dir.$fileName1);					


	$sql = "INSERT INTO productos (nombre, codigo, descripcion, costo, stock, archivo_n, archivo) VALUES ('$nombre', '$codigo', '$descripcion', $costo, $stock, '$file_name', '$fileName1')";
	$res = $con->query($sql);

	header("Location: productos_lista.php");
?>