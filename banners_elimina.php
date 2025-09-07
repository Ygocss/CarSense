<?php
	//Conexión a la base de datos
	require "funciones/conecta.php";
	$con = conecta();

	//Recibir variables
	$id = $_REQUEST['id'];

	//Consulta/operación SQL
	$sql = "UPDATE banners SET eliminado = 1 WHERE id = $id";//Marcarlo como eliminado, pero sigue guardado en la tabla

	//Ejecutamos la operación
	$res = $con->query($sql);

	echo $res;//Retornamos $res
?>