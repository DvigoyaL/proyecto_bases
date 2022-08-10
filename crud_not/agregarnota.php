<?php
include_once('../conexion.php');
include_once('../crud_est/template/footer.php');
include_once('../crud_est/template/header.php');
session_start();
$cod_nota= $_SESSION['cod_nota'];
$curso = $_SESSION['curso'];
$consulta = pg_query("select * from notas where nota='$cod_nota' and cod_cur='$curso'");
$objnota = pg_fetch_object($consulta);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
                <!-- inicio alerta -->
                
                <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Inconsistencia!</strong> Debe tener en cuenta que la suma de los porcentajes debe ser no mayor a 100 %
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
                ?> 

                <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="agregarproceso.php">
                    <div class="mb-3">
                        <label class="form-label">Descripción nota: </label>
                        <input type="text" class="form-control" name="desc" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Porcentaje: </label>
                        <input type="number" class="form-control" name="porcent" max="100" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Posicion: </label>
                        <input type="number" class="form-control" name="posic" max="30" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="codigo">
                        <input type="submit" class="btn btn-primary" value="Añadir">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>