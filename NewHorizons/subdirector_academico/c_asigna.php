<?php
require 'seguridad_subdirector.php';
$error = array();




    $nombre = $_POST["nombre"];
    $grado = $_POST["grado"];
   
  

    
    $query = "INSERT INTO asignaturas (NOMBRE,ID_GRADO) VALUES ('{$nombre}','{$grado}') ";
    



    
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='asignaturas.php?mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='asignaturas.php?mensaje=error';</script>";
    
        die();
      
    }
    
    
?>