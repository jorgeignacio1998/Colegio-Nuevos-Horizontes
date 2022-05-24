<?php
include 'seguridad_subdirector.php';     //Seguridad y Base de datos.

if(!isset($_GET['codigo'])){
    header('Location: index.php?mensaje=error');
}
   $codigo = $_GET['codigo'];
   

    //Eliminando los datos
$query = "DELETE FROM asignaturas WHERE ID_A = $codigo ";



if(mysqli_query($mysqli, $query)){
    
    echo "<script>location.href='asignaturas.php?mensaje=eliminado';</script>";

    die();
}
else{
    echo "<script>location.href='asignaturas.php?mensaje=error';</script>";

    die();
  
}
?>