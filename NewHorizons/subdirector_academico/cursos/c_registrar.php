<?php
require '../seguridad_subdirector.php';
$error = array();




    $grado = $_POST["grado"];
    $nombre = $_POST["nombre"];
    $regexNombre = "/^[A-Za-z]+$/"; 
    $sala = $_POST["sala"];
    

    // 3.- formato nombre                   
    if(!preg_match($regexNombre, $nombre)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=formato_nombre';</script>";
        
    }  
    // 3.-   formato nombre    



    
    // 2.- Validacion SALA ya en uso
    
        $query2 = $mysqli->query("SELECT * FROM cursos WHERE ID_SALA LIKE '{$sala}' ");
        $res2 = mysqli_num_rows($query2);
        if($res2 > 0){
            array_push($error, "La sala ya esta en uso");
            echo "<script>location.href='index.php?mensaje=sala_clonada';</script>";
        }
    
    // 2.- Validacion SALA ya en uso
  




    // 3.- Validacion curso ya existe
    $query1 = $mysqli->query("SELECT * FROM cursos WHERE NOMBRE LIKE '{$nombre}' AND  ID_GRADO LIKE '{$grado}' ");
    $res1 = mysqli_num_rows($query1);
    if($res1 > 0){
        array_push($error, "El  curso ya existe");
        echo "<script>location.href='index.php?mensaje=curso_clonado';</script>";
        
    }
    // 3.- Validacion curso ya existe







    
    $query = "INSERT INTO cursos (NOMBRE,ID_GRADO,ID_SALA) VALUES ('{$nombre}','{$grado}','{$sala}') ";
    


if(count($error)==0) {     
    
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }
}
    
?>