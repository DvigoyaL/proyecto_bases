<?php 
$host = "ziggy.db.elephantsql.com";
$dbname = "jebdbwqd";
$user = "jebdbwqd";
$password = "fSMRqdoDfrQeJMY6ig7W2ks2NsQHG9bm";
$conexion = pg_connect("host =$host dbname = $dbname user = $user password = $password");

$usuario = $_POST['user'];
$contraseña = $_POST['contra'];

$queryProfesores = "SELECT * from docente WHERE nom_doc = '$usuario' AND clave = '$contraseña'";
$consultaProfesores = pg_query($conexion, $queryProfesores);

if(pg_num_rows($consultaProfesores) > 0){
	session_start();
	$_SESSION['profesor'] = $usuario;
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
