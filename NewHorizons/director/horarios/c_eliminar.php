<?php
// Aclarar, se eliminara el alumno de la tabla alumno pero sus datos seguiran en la base de datos por la tabla matriculados.
require '../seguridad_director.php';
$id_eva = $_GET['id_eva'];
if(!isset($_GET['id_eva'])) {
    header('Location: ../index.php?mensaje=error1');
    exit();
}

$grado = $_GET['grado'];
if(!isset($_GET['grado'])) {
    header('Location: ../index.php?mensaje=error2');
    exit();
}




// $query1 = "UPDATE matriculados SET ASIGNADO = '' WHERE RUT LIKE $rut";


$query2 = "DELETE FROM evaluaciones WHERE ID = $id_eva ";
        if(mysqli_query($mysqli, $query2)){
           
                echo "<script>location.href='index.php?mensaje=eliminado&grado=$grado';</script>";
                die();
                
            }else{  
                echo "<script>location.href='index.php?mensaje=error&grado=$grado';</script>";
   
                die();
            }
            


 ?>
