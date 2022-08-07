<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name = "viewport" content="width = device-width, initial-scale = 1.0">
	<title>Login</title>
	<!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<div class="login-box">
    <?php
    include_once("conexion.php");
    session_start();
    $_SESSION['ecuaciones'] = "Ecuaciones";
    $_SESSION['fisica'] = "Fisica";
    $_SESSION['bases'] = "Bases";
    $_SESSION['redes'] = "Redes";
    ?>
    <h2>Materias disponibles.</h2>
    <nav class="navegacion">
        <ul class="menu">
            <li><button type="button" class="btn btn-primary">Ecuaciones</button></li>
            <li><button type="button" class="btn btn-primary">Fisica</button></li>
            <li><button type="button" class="btn btn-primary">Bases</button></li>
            <li><button type="button" class="btn btn-primary">Redes</button></li>
</body>
</html>
