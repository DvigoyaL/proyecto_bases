<?php
include_once("../conexion.php");
include_once("../crud_est/template/header.php");
include_once("../crud_est/template/footer.php");
$nota = $_SESSION['cod_nota'];
$curso = $_SESSION['curso'];
$año = $_SESSION['año'];
$periodo = $_SESSION['periodo'];
$connota = pg_query("select * from cursos c join notas n on c.cod_cur=n.cod_cur where nota = $nota and n.cod_cur= '$curso'");
$objnota = pg_fetch_object($connota);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
                <!-- inicio alerta -->
            <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> calificación eliminada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
                ?> 

                <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
                ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Editado!</strong> calificación editada correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
                ?> 

                <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Añadido!</strong> calificación añadida correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
                ?> 

                <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Materia:  <?php echo $objnota-> nomb_cur ?><br>
                    Descripción:  <?php echo $objnota-> desc_nota ?><br>
                    Porcentaje:  <?php echo $objnota-> porcentaje ?> % <br>
                </div>
                <div class="p-4">
                    <table class="table align-middle"> 
                        <thead>
                            <tr>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Nota</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $consulta = "select * from calificaciones c join estudiantes e on c.cod_est=e.cod_est where cod_cur = '$curso' and nota = $nota and year = '$año' and periodo = '$periodo'";
                                $resultado = pg_query($consulta);
                                while($obj = pg_fetch_object($resultado)){
                            ?>
                            <tr>
                                <td><?php echo $obj->cod_est;?></td>
                                <td><?php echo $obj->nombre_est;?></td>
                                <td><?php echo $obj->valor;?></td>
                                <td class= "text-warning"><a href="editarcal.php?cal=<?php echo $obj->cod_cal;?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td class= "text-danger"><a href="../crud_cal/borrarcal.php?cal=<?php echo $obj->cod_cal;?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-grid">
                        <a href="../crud_cal/agregarcal.php" class="btn btn-success" role="button" aria-pressed="true">Adicionar calificación</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
