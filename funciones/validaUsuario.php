<?php
	session_start();//La función de inicio de seción debe ir al principio
	require "conecta.php";
	$con = conecta();

	$mode = $_REQUEST['mode'];
	$user = $_REQUEST['user'];//correo
	$pass = md5($_REQUEST['pass']);
	$tabla;

	if ($mode == 1) {
		$tabla = "administradores";
	} else {//($mode == 0)
		$tabla = "clientes";
	}

	$sql = "SELECT * FROM " . $tabla . " WHERE correo = '$user' AND pass = '$pass' AND status = 1 AND eliminado = 0";
	$res = $con->query($sql);
	$num = $res->num_rows;

	if ($num) {
		$row = $res->fetch_array();
		$_SESSION['mode']		= $mode;
		$_SESSION['idU']		= $row["id"];
		$_SESSION['nombre'] 	= $row["nombre"];
		$_SESSION['apellidos']	= $row["apellidos"];
		$_SESSION['correo'] 	= $user;
	}

	echo $num;
?>