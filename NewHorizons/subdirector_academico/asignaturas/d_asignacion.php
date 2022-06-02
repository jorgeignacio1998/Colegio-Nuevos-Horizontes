<?php 
include '../seguridad_subdirector.php';

if(!isset($_GET['id_asignacion'])){
    header('Location: index.php?mensaje=error');
}

    //recibiendo id de la asignacion para borrarlo.
    $id_asignacion = $_GET['id_asignacion'];


    //Eliminando los datos
    $query = "DELETE FROM asignaturas_profes WHERE ID_ASIGNACION = $id_asignacion ";



    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='asignar_asignatura.php?mensaje=eliminado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='asignar_asignatura.php?mensaje=error';</script>";
    
        die();
      
    }




?>