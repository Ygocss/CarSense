<?php
	//Conexión a la base de datos
	require "conecta.php";
	$con = conecta();

	//Recibir variables
	$id		= $_REQUEST['id'];
	$codigo	= $_REQUEST['codigo'];

	//Consulta/operación SQL
	$sql = "SELECT 1 FROM productos WHERE codigo = '$codigo' AND id != $id AND status = 1 AND eliminado = 0";

	//Ejecutamos la operación
	$res = $con->query($sql);
	
	echo $res->num_rows;//Retornamos el número de registros encontrados
?>