<?php 
include_once("conexion.php");

$usuario = $_POST['user'];
$contraseña = $_POST['contra'];

$queryProfesores = "SELECT * from docente WHERE nom_doc = '$usuario' AND clave = '$contraseña'";
$obj = pg_fetch_object(pg_query($queryProfesores));
$consultaProfesores = pg_query($queryProfesores);

if(pg_num_rows($consultaProfesores) > 0){
	session_start();
	$_SESSION['profesor'] = $obj->cod_doc;
	header("location: materias.php");
	exit();
} else {
	?>
	<?php
	include("index.php");
	?>
	<h1 class="bad">ERROR EN LA AUTENTICACION</h1>
	<?php
}
