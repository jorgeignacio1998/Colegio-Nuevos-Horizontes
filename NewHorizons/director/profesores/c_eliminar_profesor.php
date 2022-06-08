<?php
require '../seguridad_director.php';
if(!isset($_GET['id_profesor'])){
    echo "<script>location.href='index.php?mensaje=error';</script>";
}

$id_profesor = $_GET["id_profesor"];







$query = "DELETE FROM profesores WHERE ID = $id_profesor ";



if(mysqli_query($mysqli, $query)){
    
    echo "<script>location.href='index.php?mensaje=eliminado';</script>";

    die();
}
else{
    echo "<script>location.href='index.php?mensaje=error';</script>";

    die();
  
}
?>
