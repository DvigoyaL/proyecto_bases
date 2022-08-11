<?php
    include_once("../conexion.php");
    session_start();
    $nota = $_SESSION['cod_nota'];
    $curso = $_SESSION['curso'];
    $año = $_SESSION['año'];
    $periodo = $_SESSION['periodo'];
    $cod_est = $_POST['codigo_est'];
    $calificacion = $_POST['calificacion'];
    $fecha = $_POST['fecha'];
    pg_query("insert into calificaciones (nota,valor,fecha,cod_cur,cod_est,year,periodo) values ($nota,$calificacion,'$fecha','$curso','$cod_est','$año','$periodo')");
    header('location:index_cal.php?mensaje=registrado');
?>