<?php 
include '../seguridad_director.php';

if(!isset($_GET['id_matriculado'])){
    echo "<script>location.href='index.php?mensaje=error';</script>";
}

    //recibiendo id de la asignacion para borrarlo.
    $id_matriculado = $_GET['id_matriculado'];


    //Eliminando los datos
    $query = "DELETE FROM matriculados WHERE ID = $id_matriculado ";



    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='index.php?mensaje=eliminado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }




?>