<?php
include_once('../conexion.php');
session_start();
$cod_not = $_GET['nota'];
$_SESSION['cod_nota'] = $cod_not;
header('location:editarnota.php');
?>