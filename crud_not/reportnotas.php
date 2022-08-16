<?php
 include_once ("../conexion.php");
 include_once ("../crud_est/template/header.php");
 include_once ("../crud_est/template/footer.php");
 $nota = $_SESSION['cod_nota'];
 $curso = $_SESSION['curso'];
 $año = $_SESSION['año'];
 $periodo = $_SESSION['periodo'];
 $con = "select nota from notas where cod_cur = '$curso'";
 $contnotas = pg_query($con);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
                <!-- inicio alerta -->


                <!-- fin alerta -->
            <div class="card">
                <div class="p-4">
                    <table class="table align-middle"> 
                        <thead>
                            <th scope="col"></th>
                        <?php
                                $consulta = "select * from notas where cod_cur='$curso'";
                                $resultado = pg_query($consulta);
                                while($obj = pg_fetch_object($resultado)){
                            ?>
                            <th scope="col">
                                <?php echo $obj->desc_nota;?>
                            <?php
                                }
                            ?>
                            </th>
                            <th scope="col">Definitiva
                            </th>
                            <tr>
                            </tr>
                            <th scope="col">Codigo</th>
                            <?php
                            $consulta = "select * from notas where cod_cur='$curso'";
                            $consulta2 = "select sum(porcentaje) as definitiva from notas where cod_cur='$curso'";
                            $obj2 = pg_fetch_object(pg_query($consulta2));
                            $resultado = pg_query($consulta);
                            while($obj = pg_fetch_object($resultado)){
                                ?>
                                <th scope="col">
                                    <?php echo $obj->porcentaje;?> %
                                <?php
                                    }
                                ?>
                                <th scope="col"><?php echo $obj2->definitiva ?> %
                                </th>
                        </thead>
                        <tbody>
                            <?php
                                $consulta3= pg_query("select valor from calificaciones where cod_cur = '$curso' and year = '$año' and periodo = '$periodo' order by cod_est");
                                $consultadefinitiva = pg_query("select sum(valor*(porcentaje)/100)as definitiva, cod_est from calificaciones c join notas n on c.nota=n.nota where c.cod_cur = '$curso' and c.year = '$año' and periodo='$periodo' group by cod_est");
                                $cont = 0;
                                while($cod_est = pg_fetch_object($consultadefinitiva)){
                                    ?><td><?php echo $cod_est -> cod_est; ?></td><?php 
                                    while($obj = pg_fetch_object($consulta3)){ 
                            ?>  
                                    <?php if($cont < pg_num_rows($contnotas)){ ?> <td> <?php $cont = $cont + 1; echo $obj->valor; echo $cont?></td> 
                            <?php
                                            }else{ $cont = 1?> <td><?php echo $cod_est->definitiva;?></td> <tr></tr> <td><?php echo $obj->valor;?></td>
                                                                    <?php
                                                             }    
                                                        }
                                                    }      
                                ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
