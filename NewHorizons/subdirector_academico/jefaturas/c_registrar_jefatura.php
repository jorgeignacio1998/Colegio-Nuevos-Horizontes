<?php
require '../seguridad_subdirector.php';
$error = array();




    $profesor = $_POST["profesor"];
    $curso = $_POST["curso"];
 
   
    


        // 1.- Validar profesor disponible
        $query2 = $mysqli->query("SELECT * FROM jefaturas WHERE ID_PROFESOR LIKE '{$profesor}' ");
        $respuesta2 = mysqli_num_rows($query2);
        if($respuesta2 > 0){
            array_push($error, "El  curso ya existe");
            echo "<script>location.href='index.php?mensaje=no_disponible';</script>";
            
        }
        // 1.- Validar profesor disponible



         // 2.- Validar curso ya con jefatura
         $query3 = $mysqli->query("SELECT * FROM jefaturas WHERE ID_CURSO LIKE '{$curso}' ");
         $respuesta3 = mysqli_num_rows($query3);
         if($respuesta3 > 0){
             array_push($error, "El  curso ya tiene una jefatura");
             echo "<script>location.href='index.php?mensaje=curso_no_disponible';</script>";
             
         }
         // 2.- Validar curso ya con jefatura










if(count($error)==0) {     
    
    $query = "INSERT INTO jefaturas (ID_PROFESOR,ID_CURSO) VALUES ('{$profesor}','{$curso}') ";

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