<?php
$cod_est = $_POST['codgo_est'];
$valor = $_POST['calificacion'];
$fecha = $_POST['fecha'];
$cod_cal = $_SESSION['cod_cal'];
pg_query("update calificaciones set valor='$valor',fecha=$fecha where cod_cal=$cod_cal and cod_est = '$cod_est'");
header("location:index_cal.php?mensaje=editado");
?>