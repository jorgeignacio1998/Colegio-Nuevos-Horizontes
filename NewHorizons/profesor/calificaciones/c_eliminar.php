<?php
include '../seguridad_profesor.php';  



$id_calificacion = $_GET["id_calificacion"];
$id_clase = $_GET["id_clase"];







$query = "DELETE FROM calificaciones WHERE ID LIKE '{$id_calificacion}' ";



if(mysqli_query($mysqli, $query)){
    
    echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=eliminado';</script>";

    die();
    

}
else{
    echo "<script>location.href='index.php?id_clase=$id_clase';</script>";

    die();
  
}
?>
