<?php
include_once("../conexion.php");
session_start();
$cod_nota= $_SESSION['nota'];
$cod_cur = $_SESSION['curso'];
$desc_nota = $_POST['desc'];
$porcentaje = $_POST['porcent'];
$posicion = $_POST['posic'];
$consulta = pg_query("select SUM(porcentaje) as sumando from notas where cod_cur = '$cod_cur'");
$conporcenant = pg_query("select porcentaje from notas where nota = $cod_nota and cod_cur = '$cod_cur'");
$porcentviejo = pg_fetch_object($conporcenant);
$tot_porcent = pg_fetch_object($consulta);
$suma = $porcentaje + $tot_porcent->sumando - $porcentviejo->porcentaje;
if($suma > 100){
	header('location:editarnota.php?mensaje=error');
    exit();
}else{
    pg_query("update notas set desc_nota='$desc_nota',porcentaje=$porcentaje,posicion=$posicion where nota=$cod_nota and cod_cur = '$cod_cur'");
    header('location:index_notas.php?mensaje=editado');
    exit();
}
?>