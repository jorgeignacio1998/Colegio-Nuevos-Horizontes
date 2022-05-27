<?php
require '../seguridad_subdirector.php';
$error = array();




    $profesor = $_POST["profesor"];
    $curso = $_POST["curso"];
 
    

   
  

    
    $query = "INSERT INTO profesores_jefes (ID_CURSO,ID_PROFESOR) VALUES ('{$curso}','{$profesor}') ";
    



    
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }
    
    
?>