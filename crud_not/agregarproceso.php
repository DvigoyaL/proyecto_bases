<?php
include_once("../conexion.php");
session_start();
$cod_nota= $_SESSION['cod_nota'];
$cod_cur = $_SESSION['curso'];
$desc_nota = $_POST['desc'];
$porcentaje = $_POST['porcent'];
$posicion = $_POST['posic'];
$consulta = pg_query("select SUM(porcentaje) as sumando from notas where cod_cur = '$cod_cur'");
$tot_porcent = pg_fetch_object($consulta);
$suma = $porcentaje + $tot_porcent->sumando;
if($suma > 100){
	header('location:agregarnota.php?mensaje=error');
    exit();
}else{
    pg_query("insert into notas (desc_nota,porcentaje,posicion,cod_cur) values ('$desc_nota',$porcentaje,$posicion,'$cod_cur')");
    header('location:index_notas.php?mensaje=registrado');
    exit();
}
?>