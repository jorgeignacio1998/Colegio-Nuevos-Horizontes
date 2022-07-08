<?php
// Aclarar, se eliminara el alumno de la tabla alumno pero sus datos seguiran en la base de datos por la tabla matriculados.
require '../seguridad_director.php';




$id_clase = $_GET['id_clase'];
$id_horario = $_GET['id_horario'];




// $query1 = "UPDATE matriculados SET ASIGNADO = '' WHERE RUT LIKE $rut";


$query2 = "DELETE FROM horarios_clases WHERE ID = $id_horario ";
        if(mysqli_query($mysqli, $query2)){
           
            echo "<script>location.href='index.php?id_horario=$id_horario&id_clase=$id_clase&mensaje=eliminado';</script>";
                die();
                
            }else{  
                echo "<script>location.href='index.php?id_horario=$id_horario&id_clase=$id_clase&mensaje=error';</script>";
   
                die();
            }
            


 ?>
