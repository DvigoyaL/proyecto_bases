<?php
include_once("../conexion.php");
session_start();
$nota = $_GET['nota'];
$_SESSION['cod_nota'] = $nota;
header('location:index_cal.php');
?>