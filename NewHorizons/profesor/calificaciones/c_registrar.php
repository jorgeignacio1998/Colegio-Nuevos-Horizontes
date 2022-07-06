<?php
include '../seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.
$error = array();




$id_clase = $_POST["id_clase"];


$evaID = $_POST["evaID"];
$nota = $_POST["nota"];
$id_alumno = $_POST["id_alumno"];
$Regexnota = "/^(\d{1,7})(\.\d{1,2}){0,1}$/";

// VALIDACIONES
    //1.-formato NOTA                      
    if(!preg_match($Regexnota, $nota)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=formato_nota&id_clase=$id_clase';</script>";  
        die;  
    }  
    //- formato NOTA       


    // 2.- VNOTA EXISTE
    
        $query2 = $mysqli->query("SELECT * FROM calificaciones WHERE ID_ALUMNO LIKE '{$id_alumno}' AND ID_EVALUACION LIKE '{$evaID}' ");
        $res2 = mysqli_num_rows($query2);
        if($res2 > 0){
            array_push($error, "Nota ya existe");
            echo "<script>location.href='index.php?mensaje=nota_existe&id_clase=$id_clase';</script>";
            die();
        }
    
    // 2.- VNOTA EXISTE


    // 2.- noya menor 1 mayor 7
    if($nota > 7 || $nota < 1 ){
        array_push($error, " nota Fuera de rango");
        echo "<script>location.href='index.php?mensaje=fuera_rango&id_clase=$id_clase';</script>";  
        die;  
    }
    // 2.- noya menor 1 mayor 7



// VALIDACIONES
    



$query = "INSERT INTO calificaciones (NOTA,ID_ALUMNO,ID_EVALUACION,ID_CLASE) VALUES ('{$nota}','{$id_alumno}','{$evaID}' , '{$id_clase}'   ) ";
    


if(count($error)==0) {     
    
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?mensaje=registrado&id_clase=$id_clase';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error&d_clase=$id_clase';</script>";
    
        die();
      
    }
}
    
?>