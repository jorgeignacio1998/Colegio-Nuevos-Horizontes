<?php
require '../seguridad_subdirector.php';
$error = array();




    $grado = $_POST["grado"];
    $nombre = $_POST["nombre"];
    $sala = $_POST["sala"];
    

   
  

    
    $query = "INSERT INTO cursos (NOMBRE,ID_GRADO,ID_SALA) VALUES ('{$nombre}','{$grado}','{$sala}') ";
    



    
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }
    
    
?>