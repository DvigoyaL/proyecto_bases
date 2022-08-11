<?php
    include_once("../conexion.php");
    include_once("../crud_est/template/header.php");
    include_once("../crud_est/template/footer.php");
    session_start();
    $cod_cal = $_GET['cal'];
    $_SESSION['cod_cal'] = $cod_cal;
    $seleccionado= pg_query("SELECT * FROM estudiantes e join calificaciones c on c.cod_est = e.cod_est where cod_cal = '$cod_cal'");
    $obj2 = pg_fetch_object($seleccionado);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar calificación
                </div>
                <form class="p-4" method="POST" action="editarcalproceso.php">
                    <div class="mb-3">
                    <label class="form-label">Estudiante: </label>
                    <select required name="codigo_est" class="form-select" disabled>
                    <?php 
                        $seleccionado= pg_query("SELECT * FROM estudiantes e join calificaciones c on c.cod_est = e.cod_est where cod_cal = '$cod_cal'");
                        while($obj = pg_fetch_object($seleccionado)){?>
                         <option value="<?php echo $obj->cod_est;?>"><?php echo $obj->cod_est,'   ||   ', $obj->nombre_est ?></option>
                    <?php }
                        ?>
                    </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Ingrese nueva calificación: </label>
                        <input type="number" class="form-control" name="calificacion" value="<?php echo $obj2->valor ?>" min = "1" max="5" step="0.1" autofocus required>
                    </div>
                    <div class="mb-3">
                    <label class="form-label">Fecha de la calificación: </label>
                    <input type="date" id="start" name="fecha" value="<?php echo $obj2->fecha?>" min="<?php echo $obj2->year?>-01-01" max="<?php echo $obj2->year?>-12-31">
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
