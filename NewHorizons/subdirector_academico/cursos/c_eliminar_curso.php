<?php
require '../seguridad_subdirector.php';
if(!isset($_GET['id_curso'])){
    echo "<script>location.href='index.php?mensaje=error';</script>";
}

$id_curso = $_GET["id_curso"];







$query = "DELETE FROM cursos WHERE ID = $id_curso ";



if(mysqli_query($mysqli, $query)){
    
    echo "<script>location.href='index.php?mensaje=eliminado';</script>";

    die();
}
else{
    echo "<script>location.href='index.php?mensaje=error';</script>";

    die();
  
}
?>
