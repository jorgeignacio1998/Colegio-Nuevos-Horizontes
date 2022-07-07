<?php
include '../seguridad_profesor.php';  




$id_clase = $_GET["id_clase"];
$id_anotacion = $_GET["id_anotacion"];







$query = "DELETE FROM anotaciones WHERE ID LIKE '{$id_anotacion}' ";



if(mysqli_query($mysqli, $query)){
    
    echo "<script>location.href='index.php?id_clase=$id_clase&mensaje=eliminado';</script>";

    die();
    

}
else{
    echo "<script>location.href='index.php?id_clase=$id_clase';</script>";

    die();
  
}
?>
