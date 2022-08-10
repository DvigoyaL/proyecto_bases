<?php 
    include_once ("../conexion.php");
    include_once ("../crud_est/template/header.php");
    include_once ("../crud_est/template/footer.php");
    session_start();
    $curso = $_SESSION['curso'];
    $consul_ncur = pg_query("select nomb_cur from cursos where cod_cur = '$curso'");
    $nomb_cur = pg_fetch_object($consul_ncur);
 ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <!-- inicio alerta -->
                <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
                ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> Nota eliminada.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
                ?> 

                <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
                ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                <strong>Editado!</strong> Nota editada correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
                ?> 

                <?php 
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Añadido!</strong> Nota añadida correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php 
                }
                ?> 

                <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    Agenda notas: <?php echo $nomb_cur->nomb_cur ?>
                </div>
                <div class="p-4">
                    <table class="table align-middle"> 
                        <thead>
                            <tr>
                                <th scope="col">Pos.</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Porcentaje</th>
                                <th scope="col" colspan="3">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $consulta = "select * from notas where cod_cur = '$curso'";
                                $resultado = pg_query($consulta);
                                while($obj = pg_fetch_object($resultado)){
                            ?>
                            <tr>
                                <td><?php echo $obj->posicion;?></td>
                                <td><?php echo $obj->desc_nota;?></td>
                                <td><?php echo $obj->porcentaje;?> % </td>
                                <td class= "text-warning"><a href="editarnota.php?nota=<?php echo $obj->nota?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td class= "text-danger"><a href="borrarnota.php?nota=<?php echo $obj->nota;?>"><i class="bi bi-trash"></i></a></td>
                                <td class= "text-info"><a href=""><i class="bi bi-clipboard-plus"></i></a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <div class="d-grid">
                        <a href="agregarnota.php" class="btn btn-success" role="button" aria-pressed="true">Adicionar nota</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
