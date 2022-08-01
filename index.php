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
		<img class="avatar" src="grulla.png" alt="logo U">
	<form action = "sesion.php" method = "POST">
		<input type="text" name="user" placeholder="Ingrese su usuario">
		<br><br>
		<input type="password" name="contra" placeholder="Ingrese su contraseña">
		<br><br>
		<input type="submit" value="Ingresar"></input>
	</form>
</body>
</html>