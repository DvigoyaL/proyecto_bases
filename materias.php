<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content="width = device-width, initial-scale = 1.0">
	<title>Login</title>
	<link rel="stylesheet" href="estilos_login.css">
	<link rel="icon" type="image/jpg" href="logito.ico">
</head>
<body>
<div class="login-box">
    <?php
    include_once("conexion.php");
    $temp = pg_query("select nomb_cur from cursos");
    while($temp2 = pg_fetch_object($temp)){
    echo $temp2->nomb_cur;
    }
    ?>
    <h2>Materias disponibles.</h2>
    <nav class="navegacion">
        <ul class="menu">
            <li><a href="#">Ecuaciones</a></li>
            <li><a href="#">Fisica</a></li>
            <li><a href="#">Bases</a></li>
            <li><a href="#">Redes</a></li>
</body>
</html>
