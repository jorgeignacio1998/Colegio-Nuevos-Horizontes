<?php
require '../seguridad_subdirector.php';
if(!isset($_GET['id_jefatura'])){
    header('Location: index.php?mensaje=error');
}

$id_jefatura = $_GET["id_jefatura"];







$query = "DELETE FROM jefaturas WHERE ID_JEFATURA = $id_jefatura ";



if(mysqli_query($mysqli, $query)){
    
    echo "<script>location.href='index.php?mensaje=eliminado';</script>";

    die();
}
else{
    echo "<script>location.href='index.php?mensaje=error';</script>";

    die();
  
}
?>
