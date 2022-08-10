<?php
include_once("../conexion.php");
session_start();
$cod_est=$_GET['cod_est'];
$curso = $_SESSION['curso'];
$año = $_SESSION['año'];
$periodo = $_SESSION['periodo'];
pg_query("delete from inscripciones where cod_cur='$curso' and cod_est='$cod_est' and year='$año' and periodo='$periodo'");
header('location:index_est.php');
?>