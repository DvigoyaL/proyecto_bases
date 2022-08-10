<?php
include_once("../conexion.php");
session_start();
$cod_not=$_GET['nota'];
$curso = $_SESSION['curso'];
pg_query("delete from notas where cod_cur='$curso' and nota='$cod_not'");
header('location:index_notas.php?mensaje=eliminado');
?>