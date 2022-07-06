<?php
require '../seguridad_subdirector.php';
$error = array();




    $nombre = $_POST["nombre"];
    $grado = $_POST["grado"];
   
  




//No clonado
    //INYECCIONSQL
    $datita = $mysqli->query("SELECT * FROM  asignaturas WHERE NOMBRE LIKE '{$nombre}' and ID_GRADO  LIKE '{$grado}' ");
    $sentencia2 = mysqli_fetch_array($datita);
    


    //INYECCIONSQL



   
        if(empty($sentencia2)){
           //no hay registros del la asignatura. si se puede crear.
        }else{
            array_push($error, "ya existe");
            echo "<script>location.href='index.php?mensaje=asignatura_ya_existe';</script>";
            die();
        }
    
//No clonado




    
if(count($error)==0){

    //Editando los datos
    $query = "INSERT INTO asignaturas (NOMBRE,ID_GRADO) VALUES ('{$nombre}','{$grado}') ";
   


    if(mysqli_query($mysqli, $query)){
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
    
        die();
    }else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();


    }
    
    
}



    
    
    
?>