<?php
include_once("../conexion.php");
session_start();
$cod_cal=$_GET['cal'];
$curso = $_SESSION['curso'];
pg_query("delete from calificaciones where cod_cur='$curso' and cod_cal='$cod_cal'");
header('location:index_cal.php?mensaje=eliminado');
?>