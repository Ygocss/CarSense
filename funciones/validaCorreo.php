<?php
	//Conexión a la base de datos
	require "conecta.php";
	$con = conecta();

	$mode	= $_REQUEST['mode'];
	$id		= $_REQUEST['id'];
	$correo	= $_REQUEST['correo'];
	$tabla;
	
	if ($mode == 1) {
		$tabla = "administradores";
	}  else {//($mode == 0)
		$tabla = "clientes";
	}
	$sql = "SELECT 1 FROM " . $tabla . " WHERE correo = '$correo' AND id != $id";
	$res = $con->query($sql);
	
	echo $res->num_rows;
?>