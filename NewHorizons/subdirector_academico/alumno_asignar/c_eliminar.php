<?php
// Aclarar, se eliminara el alumno de la tabla alumno pero sus datos seguiran en la base de datos por la tabla matriculados.
require '../seguridad_subdirector.php';
$id_alumno = $_GET['id_alumno'];
if(!isset($_GET['id_alumno'])) {
    header('Location: ../index.php?mensaje=error1');
    exit();
}
$rut = $_GET['rut'];
if(!isset($_GET['rut'])) {
    header('Location: ../index.php?mensaje=error2');
    exit();
}
$curso = $_GET['curso'];
if(!isset($_GET['curso'])) {
    header('Location: ../index.php?mensaje=error2');
    exit();
}




// $query1 = "UPDATE matriculados SET ASIGNADO = '' WHERE RUT LIKE $rut";

$query1 = "UPDATE matriculados SET ASIGNADO = '' WHERE RUT_ALUMNO LIKE '$rut'";



        if(mysqli_query($mysqli, $query1)){

            $query2 = "DELETE FROM alumnos WHERE ID = $id_alumno ";
            if(mysqli_query($mysqli, $query2)){

            echo "<script>location.href='index.php?mensaje=eliminado&curso=$curso';</script>";
            die();
            }
        }else{
            $query1 = "UPDATE matriculados SET ASIGNADO = 'ASIGNADO' WHERE RUT_ALUMNO LIKE '$rut'";
            mysqli_query($mysqli, $query1);
            echo "<script>location.href='index.php?mensaje=error444';</script>";
        
            die();
          
        }
        


 ?>
