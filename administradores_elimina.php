<?php
//administradores_elimina.php
require "funciones/conecta.php";
$con = conecta();

//recice variables
$id = $_REQUEST['id'];

//$sql = "DELETE FROM administradores WHERE id = $id";
$sql = "UPDATE administradores
        SET eliminado = 1
        WHERE id = $id";
$res = $con->query($sql);

header("Location: administradores_lista");
?>
