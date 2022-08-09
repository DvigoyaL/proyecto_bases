<?php 
    session_start();
    $_SESSION['curso']= $_POST['elegircurso'];
    $_SESSION['periodo']= $_POST['elegirperiodo'];
    $_SESSION['año']= $_POST['elegiraño'];
    header("location: ../crud_est/index_est.php");
 ?> 
