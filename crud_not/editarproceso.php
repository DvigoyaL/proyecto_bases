<?php
include_once("../conexion.php");
session_start();
$year=$_SESSION['año'];
$periodo=$_SESSION['periodo'];
$cod_nota= $_SESSION['cod_nota'];
$cod_cur = $_SESSION['curso'];
$desc_nota = $_POST['desc'];
$porcentaje = $_POST['porcent'];
$posicion = $_POST['posic'];
$consulta = pg_query("select SUM(porcentaje) as sumando from notas where cod_cur = '$cod_cur' and year= '$year' and periodo='$periodo'");
$conporcenant = pg_query("select porcentaje from notas where nota = $cod_nota and cod_cur = '$cod_cur' and year= '$year' and periodo='$periodo'");
$porcentviejo = pg_fetch_object($conporcenant);
$tot_porcent = pg_fetch_object($consulta);
$suma = $porcentaje + $tot_porcent->sumando - $porcentviejo->porcentaje;
$consultapos = pg_query("select * from (select posicion from notas where posicion = $posicion) as tabla where posicion = any (select posicion from notas where cod_cur = '$cod_cur' and year= '$year' and periodo='$periodo') ");
if(pg_num_rows($consultapos) > 0){
    header('location:editarnota.php?mensaje=error2');
    exit();
}else{if($suma > 100){
	header('location:editarnota.php?mensaje=error');
    exit();
}else{
    pg_query("update notas set desc_nota='$desc_nota',porcentaje=$porcentaje,posicion=$posicion where nota=$cod_nota and cod_cur = '$cod_cur' and year= '$year' and periodo='$periodo'");
    header('location:index_notas.php?mensaje=editado');
    exit();
}
}
?>