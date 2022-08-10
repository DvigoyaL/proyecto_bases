<?php 
    include_once ("../conexion.php");
    include_once ("template/header.php");
    include_once ("template/footer.php");
    session_start();
    $curso = $_SESSION['curso'];
    $año = $_SESSION['año'];
    $periodo = $_SESSION['periodo'];
 ?>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Lista de estudiantes inscritos
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Codigo</th>
                                <th scope="col">Nombre</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $consulta = "select * from inscripciones i join estudiantes e on e.cod_est=i.cod_est where cod_cur = '$curso' and year = '$año' and periodo = '$periodo'";
                                $resultado = pg_query($consulta);
                                while($obj = pg_fetch_object($resultado)){
                            ?>
                            <tr>
                                <td scope="row">1</td>
                                <td><?php echo $obj->cod_est;?></td>
                                <td><?php echo $obj->nombre_est;?></td>
                                <td>Editar</td>
                                <td class= "text-danger"><a href="eliminar.php?cod_est=<?php echo $obj->cod_est;?>"><i class="bi bi-person-dash"></i></a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Estudiantes disponibles a inscribir:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                    <select required name="codigo">
                    <?php 
                        $seleccionado= pg_query("SELECT * FROM estudiantes where cod_est not in (select cod_est from inscripciones where cod_cur='$curso' and year='$año' and periodo ='$periodo');");
                        while($obj = pg_fetch_object($seleccionado)){?>
                         <option value="<?php echo $obj->cod_est;?>"><?php echo $obj->cod_est,'   ||   ', $obj->nombre_est ?></option>
                    <?php }
                        ?>
                    </select>
                    </div>
                    <div class="d-grid">
                        <input type="submit" class="btn btn-primary" value="Inscribir">
                    </div>
                </form>
                <a href="../crud_not/index_notas.php" class="btn btn-secondary" role="button" aria-pressed="true">Ver notas</a>
            </div>
        </div>
    </div>
</div>
                    
                    


    
