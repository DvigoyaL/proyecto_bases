<?php
include_once("../conexion.php");
session_start();
$year=$_SESSION['año'];
$periodo=$_SESSION['periodo'];
$cod_not=$_GET['nota'];
$curso = $_SESSION['curso'];
pg_query("delete from notas where cod_cur='$curso' and nota='$cod_not' and year= '$year' and periodo='$periodo'");
header('location:index_notas.php?mensaje=eliminado');
?>