<?php
include_once("../conexion.php");
session_start();
$curso = $_SESSION['curso'];
$codigo = $_POST['codigo'];
$año = $_SESSION['año'];
$periodo = $_SESSION['periodo'];
$consultaestudiantes = pg_query("select * from inscripciones where cod_est = '$codigo' and cod_cur ='$curso' and year='$año' and periodo='$periodo'");
if(pg_num_rows($consultaestudiantes) > 0){
	?>
	<?php
	header('location:index_est.php?mensaje=repetido');
	?>
	<h1 class="bad">Estudiante ya inscrito anteriormente</h1>
	<?php
}else{
    pg_query("insert into inscripciones values ('$curso','$codigo','$año','$periodo')");
    header('location:index_est.php?mensaje=registrado');
}
?>