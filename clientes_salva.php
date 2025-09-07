<?php
	session_start();

	//Conexión a la base de datos
	require "funciones/conecta.php";
	$con = conecta();

	//Recibir variables
	$nombre		= $_REQUEST['nombre'];
	$apellidos	= $_REQUEST['apellidos'];
	$correo		= $_REQUEST['correo'];
	$pass		= md5($_REQUEST['pass']);

	//Consulta/operación SQL
	$sql = "INSERT INTO clientes (nombre, apellidos, correo, pass) VALUES ('$nombre', '$apellidos', '$correo', '$pass')";//Definimos la operación
	$res = $con->query($sql);//Ejecutamos la operación



	/*Abrimos la sesión del nuevo usuario*/

	$sql = "SELECT id FROM clientes WHERE correo = '$user' AND pass = '$pass' AND status = 1 AND eliminado = 0";
	$res = $con->query($sql);
	$row = $res->fetch_array();
	$_SESSION['idU']		= $row["id"];
	$_SESSION['mode']		= 0;
	$_SESSION['nombre'] 	= $nombre;
	$_SESSION['apellidos']	= $apellidos;
	$_SESSION['correo'] 	= $correo;

	header("Location: bienvenida.php");//Redireccionamos a otro archivo
?>