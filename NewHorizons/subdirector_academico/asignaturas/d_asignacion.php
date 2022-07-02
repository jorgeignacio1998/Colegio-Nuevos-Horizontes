<?php 
include '../seguridad_subdirector.php';

if(!isset($_GET['id_clase'])){
    echo "<script>location.href='asignar_asignatura.php?mensaje=error';</script>";
}

    //recibiendo id de la asignacion para borrarlo.
    $id_clase = $_GET['id_clase'];


    //Eliminando los datos
    $query = "DELETE FROM clases WHERE ID = $id_clase ";



    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='asignar_asignatura.php?mensaje=eliminado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='asignar_asignatura.php?mensaje=error';</script>";
    
        die();
      
    }




?>