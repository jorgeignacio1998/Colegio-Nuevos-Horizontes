<?php
require '../seguridad_subdirector.php';
$error = array();




    $profesor = $_POST["profesor"];
    $curso = $_POST["curso"];
 
    

   
  

    
    $query = "INSERT INTO jefaturas (ID_PROFESOR,ID_CURSO) VALUES ('{$profesor}','{$curso}') ";
    



    
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }
    
    
?>