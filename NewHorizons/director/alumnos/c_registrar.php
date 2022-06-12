<?php
include '../seguridad_director.php'; 
$error = array();

$regexNombre = "/^[a-zA-Z\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";

$nombre1 = $_POST["nombre1"];
$nombre2 = $_POST['nombre2'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$rut_alumno = $_POST['rut_alumno'];
$grado = $_POST['grado'];
$nombre_apoderado = $_POST['nombre_apoderado'];
$rut_apoderado = $_POST['rut_apoderado'];
$periodo_id = $_POST['periodo_id'];




// VALIDACIONES FORMATO DE LOS 5 NOMBRES                    
    if(!preg_match($regexNombre,$nombre1 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=nombre1';</script>";
    } 
    if(!preg_match($regexNombre,$nombre2 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=nombre2';</script>";
    } 
    if(!preg_match($regexNombre,$apellido1 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=apellido1';</script>";
    } 
    if(!preg_match($regexNombre,$apellido2 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=apellido2';</script>";
    } 
    if(!preg_match($regexNombre,$nombre_apoderado )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=nombre_apoderado';</script>";
    } 
// VALIDACIONES FORMATO DE LOS 5 NOMBRES    




// VALIDACIONES FORMATO DE LOS 2 RUTS                  
    if(!preg_match($regexRut, $rut_alumno)){
        array_push($error, "El RUT del estudiante es invalido");
        echo "<script>location.href='index.php?mensaje=rut1';</script>";
    }  
    if(!preg_match($regexRut, $rut_apoderado)){
        array_push($error, "El RUT del apoderado es invalido");
        echo "<script>location.href='index.php?mensaje=rut2';</script>";
    }  
// VALIDACIONES FORMATO DE LOS 2 RUTS    




// VALIDACIONES AMBOS RUT NO SEAN IGUALES  
    if($rut_alumno == $rut_apoderado){
        array_push($error, "ambos rut son iguales");
        echo "<script>location.href='index.php?mensaje=rut3';</script>";
    }
// VALIDACIONES AMBOS RUT NO SEAN IGUALES  




// VALIDACION RUT ALUMNO YA MATRICULADO
    $rut_existe = $mysqli->query("SELECT * FROM matriculados WHERE RUT_ALUMNO LIKE '{$rut_alumno}' AND ID_PERIODO LIKE $periodo_id");
    if(empty($rut_existe->num_rows)){ 
        //esta ok, el rut si está disponible para registar.
    }else{
        array_push($error, "El estudiante ya esta matriculado ");
        echo "<script>location.href='index.php?mensaje=rut4';</script>";
    }
// VALIDACION RUT ALUMNO YA MATRICULADO




if(count($error)==0){


    $query = "INSERT INTO matriculados (NOMBRE1_ALUMNO , NOMBRE2_ALUMNO , APELLIDO1_ALUMNO , APELLIDO2_ALUMNO , NOMBRE_APODERADO ,  RUT_ALUMNO , RUT_APODERADO , ID_GRADO , ID_PERIODO) 
              VALUES ('{$nombre1}', '{$nombre2}', '{$apellido1}', '{$apellido2}', '{$nombre_apoderado}', '{$rut_alumno}' , '{$rut_apoderado}', '{$grado}', '{$periodo_id}') ";
              
    if(mysqli_query($mysqli, $query)){
       
        echo "<script>location.href='editar.php?mensaje=registrado';</script>";
        
    }else{
        echo "<script>location.href='editar.php?mensaje=error';</script>";
        exit();
    }
    
    
}



        
?>



