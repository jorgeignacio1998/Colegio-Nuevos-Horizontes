<?php 
include '../seguridad_director.php';

if(!isset($_GET['id_asignacion'])){
    header('Location: index.php?mensaje=error');
}

    //recibiendo id de la asignacion para borrarlo.
    $id_asignacion = $_GET['id_asignacion'];


    //Eliminando los datos
    $query = "DELETE FROM asignaturas_profes WHERE ID_ASIGNACION = $id_asignacion ";



    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='index.php?mensaje=eliminado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }




?>