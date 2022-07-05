<?php
require '../seguridad_subdirector.php';

if(!isset($_GET['id_apoderado'])){
    echo "<script>location.href='index.php?mensaje=error1';</script>";
}

$id_apoderado = $_GET['id_apoderado'];
// echo '<script language="javascript">alert("' . 'ALERTO: ' .  $id_apoderado   . '");</script>';






$query = "DELETE FROM apoderados WHERE ID = $id_apoderado ";



if(mysqli_query($mysqli, $query)){
    
    echo "<script>location.href='index.php?mensaje=eliminado';</script>";

    die();
}
else{
    echo "<script>location.href='index.php?mensaje=error2';</script>";

    die();
  
}
?>
