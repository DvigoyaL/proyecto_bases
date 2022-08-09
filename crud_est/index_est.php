<?php 
    include_once ("../conexion.php");
    session_start();
    $curso = $_SESSION['curso'];
    $año = $_SESSION['año'];
    $periodo = $_SESSION['periodo'];
 ?>

<!doctype html>
<html lang="es">
  <head>
    <title>CRUD php y mysql b5</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- cdn icnonos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  </head>
  <body>
      <div class="container-fluid bg-warning">
          <div class="row">
              <div class="col-md">
                  <header class="py-3">
                      <h3 class="text-center">Estudiantes inscritos</h3>
                  </header>
              </div>
          </div>
      </div>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">
                    Lista de estudiantes
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
                                <td>Eliminar</td>
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
                    Ingresar datos:
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
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


      
  
<footer class="container-fluid bg-dark fixed-bottom">
        <div class="row">
            <div class="col-md text-light text-center py-3">
                Proyecto base de datos
            </div>
        </div>
    </footer>
      
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
  </body>
</html>
