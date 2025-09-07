<?php
	//Conexión a la base de datos
	require "funciones/conecta.php";
	$con = conecta();

	$id 		= $_REQUEST['id'];
	$nombre		= $_REQUEST['nombre'];
	$apellidos	= $_REQUEST['apellidos'];
	$correo		= $_REQUEST['correo'];
	$pass		= $_REQUEST['pass'];
	$rol		= $_REQUEST['rol'];
    $file_name	= $_FILES['archivo']['name'];		
	$file_tmp	= $_FILES['archivo']['tmp_name'];	

	$sql = "UPDATE administradores SET nombre = '$nombre', apellidos = '$apellidos', correo = '$correo', rol = $rol";
	
	if ($pass != "") {
		$passEnc = md5($pass);
		
		$sql = $sql . ", pass = '$passEnc'";
	}
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

	header("Location: administradores_lista.php");
?>