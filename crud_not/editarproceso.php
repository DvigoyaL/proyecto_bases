<?php
include_once("../conexion.php");
session_start();
$cod_nota= $_SESSION['cod_nota'];
$cod_cur = $_SESSION['curso'];
$desc_nota = $_POST['desc'];
$porcentaje = $_POST['porcent'];
$posicion = $_POST['posic'];
$consulta = pg_query("select SUM(porcentaje) as sumando from notas");
$conporcenant = pg_query("select porcentaje from notas where nota = 3");
$porcentviejo = pg_fetch_object($porcentviejo);
$tot_porcent = pg_fetch_object($consulta);
$suma = $porcentaje + $tot_porcent->sumando - $porcentviejo->porcentaje;
echo $suma;
?>