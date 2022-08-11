<?php
    include_once("conexion.php");
    include_once("crud_est/template/header.php");
    include_once("crud_est/template/footer.php");
    session_start();
    $profesor = $_SESSION['profesor'];
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Materias disponibles.:
                </div>
                <form class="p-4" method="POST" action="cursoselecc/guardarinfor.php">
                    <div class="mb-3">
                    <select required name="elegircurso" id="curso" class="form-select">
                     <?php 
                        $seleccionado= pg_query("select * from cursos where cod_doc='$profesor'");
                        while($obj = pg_fetch_object($seleccionado)){?>
                        <option value="<?php echo $obj->cod_cur;?>"><?php echo $obj->nomb_cur ?></option>
                    <?php }
                         ?>
                    </select>
                    </div>
                    <div class="mb-3">
                    <input required type="number" id="año" name="elegiraño" min="2020" max="2023" placeholder="Año">
                    </div>
                    <div class="mb-5">
                    <select required name="elegirperiodo" id="periodo" class="form-select">
                    <option value="1">Periodo I</option>
                    <option value="2">Periodo II</option>
                    </select>
                    </div>
                    <div class="d-grid">
                    <button type="submit" class="btn btn-primary" >Ver listado</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

