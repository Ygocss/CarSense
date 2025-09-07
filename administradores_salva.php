<?php
	//Conexión a la base de datos
	require "funciones/conecta.php";
	$con = conecta();

	$nombre		= $_REQUEST['nombre'];
	$apellidos	= $_REQUEST['apellidos'];
	$correo		= $_REQUEST['correo'];
	$pass		= $_REQUEST['pass'];
	$rol		= $_REQUEST['rol'];
	$file_name	= $_FILES['archivo']['name'];		
	$file_tmp	= $_FILES['archivo']['tmp_name'];	
	
	$passEnc	= md5($pass);
	$cadena		= explode(".", $file_name);			
	$ext		= $cadena[count($cadena) - 1];		
	$dir		= "archivos/";						
	$file_enc	= md5_file($file_tmp);				
	$fileName1	= "$file_enc.$ext";					
	copy($file_tmp, $dir.$fileName1);			

	$sql = "INSERT INTO administradores (nombre, apellidos, correo, pass, rol, archivo_n, archivo) VALUES ('$nombre', '$apellidos', '$correo', '$passEnc', $rol, '$file_name', '$fileName1')";
	$res = $con->query($sql);

	header("Location: administradores_lista.php");