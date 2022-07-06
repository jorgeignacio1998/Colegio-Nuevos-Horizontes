<?php
require '../seguridad_director.php';

if(!isset($_GET['id_sala'])){
    echo "<script>location.href='index.php?mensaje=error';</script>";
}

$id_sala = $_GET["id_sala"];







$query = "DELETE FROM salas WHERE ID = $id_sala ";



if(mysqli_query($mysqli, $query)){
    
    echo "<script>location.href='index.php?mensaje=eliminado';</script>";

    die();
}
else{
    echo "<script>location.href='index.php?mensaje=error';</script>";

    die();
  
}
?>
