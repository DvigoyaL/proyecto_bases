<?php
    include_once("../conexion.php");
    include_once("../crud_est/template/header.php");
    include_once("../crud_est/template/footer.php");
    session_start();
    $nota = $_SESSION['cod_nota'];
    $curso = $_SESSION['curso'];
    $año = $_SESSION['año'];
    $periodo = $_SESSION['periodo'];
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.2/css/bootstrap-responsive.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.js"></script>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Nueva calificación
                </div>
                <form class="p-4" method="POST" action="agregarproceso.php">
                    <div class="mb-3">
                    <label class="form-label">Seleccione estudiante: </label>
                    <select required name="codigo_est" class="form-select">
                    <?php 
                        $seleccionado= pg_query("SELECT * FROM estudiantes e join inscripciones i on e.cod_est = i.cod_est where i.cod_cur = '$curso' and i.year = '$año' and i.periodo = '$periodo'");
                        while($obj = pg_fetch_object($seleccionado)){?>
                         <option value="<?php echo $obj->cod_est;?>"><?php echo $obj->cod_est,'   ||   ', $obj->nombre_est ?></option>
                    <?php }
                        ?>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ingrese calificación: </label>
                        <input type="number" class="form-control" name="calificacion" min = "1" max="5" step="0.1" autofocus required>
                    </div>
                    <div class="mb-3">
                    <input type="date" id="start" name="fecha" value="<?php echo $año?>-01-29" min="<?php echo $año?>-01-01" max="<?php echo $año?>-12-31">
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Añadir">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
