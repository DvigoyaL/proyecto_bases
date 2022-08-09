<?php
    include_once("conexion.php");
    session_start();
    $profesor = $_SESSION['profesor'];
?>

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
    <h2>Materias disponibles.</h2>
    <form action="cursoselecc/guardarinfor.php" method="POST">
        <select required name="elegircurso" id="curso">
            <?php 
                $seleccionado= pg_query("select * from cursos where cod_doc='$profesor'");
                while($obj = pg_fetch_object($seleccionado)){?>
                <option value="<?php echo $obj->cod_cur;?>"><?php echo $obj->nomb_cur ?></option>
           <?php }
             ?>
        </select>
        <input required type="number" id="año" name="elegiraño" min="2020" max="2023" placeholder="Año">
        <select required name="elegirperiodo" id="periodo">
            <option value="1">Periodo I</option>
            <option value="2">Periodo II</option>
        </select>
        <button type="submit">Ver listado</button>
    </form>
</body>
</html>
