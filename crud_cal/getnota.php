<?php
include_once("../conexion.php");
include_once("../crud_est/template/header.php");
include_once("../crud_est/template/footer.php");
session_start();
$nota = $_GET['nota'];
$_SESSION['cod_nota'] = $nota;
header('location:index_cal.php');
?>