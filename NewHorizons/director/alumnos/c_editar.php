<?php
require '../seguridad_director.php';

$error = array();
$regexNombre = "/^[a-zA-Z\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";


// $ruts = "SELECT RUT FROM profesores"; 
// $sentencia1 = $mysqli->query($ruts);
// $sentencia2 =mysqli_fetch_array($sentencia1);

$id_matriculado = $_POST["id_matriculado"];
$nombre1 = $_POST["nombre1"];
$nombre2 = $_POST['nombre2'];
$apellido1 = $_POST['apellido1'];
$apellido2 = $_POST['apellido2'];
$rut_alumno = $_POST['rut_alumno'];
$grado = $_POST['grado'];
$nombre_apoderado = $_POST['nombre_apoderado'];
$rut_apoderado = $_POST['rut_apoderado'];




// VALIDACIONES FORMATO DE LOS 5 NOMBRES                    
    if(!preg_match($regexNombre,$nombre1 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?id_matriculado=$id_matriculado&mensaje=nombre1';</script>";
    } 
    if(!preg_match($regexNombre,$nombre2 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?id_matriculado=$id_matriculado&mensaje=nombre2';</script>";
    } 
    if(!preg_match($regexNombre,$apellido1 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?id_matriculado=$id_matriculado&mensaje=apellido1';</script>";
    } 
    if(!preg_match($regexNombre,$apellido2 )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?id_matriculado=$id_matriculado&mensaje=apellido2';</script>";
    } 
    if(!preg_match($regexNombre,$nombre_apoderado )){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?id_matriculado=$id_matriculado&mensaje=nombre_apoderado';</script>";
    } 
// VALIDACIONES FORMATO DE LOS 5 NOMBRES   



// VALIDACIONES FORMATO DE LOS 2 RUTS                  
    if(!preg_match($regexRut, $rut_alumno)){
        array_push($error, "El RUT del estudiante es invalido");
        echo "<script>location.href='index.php?id_matriculado=$id_matriculado&mensaje=rut1';</script>";
    }  
    if(!preg_match($regexRut, $rut_apoderado)){
        array_push($error, "El RUT del apoderado es invalido");
        echo "<script>location.href='index.php?id_matriculado=$id_matriculado&mensaje=rut2';</script>";
    }  
// VALIDACIONES FORMATO DE LOS 2 RUTS    



// VALIDACIONES AMBOS RUT NO SEAN IGUALES  
    if($rut_alumno == $rut_apoderado){
        array_push($error, "ambos rut son iguales");
        echo "<script>location.href='index.php?id_matriculado=$id_matriculado&mensaje=rut3';</script>";
    }
// VALIDACIONES AMBOS RUT NO SEAN IGUALES  



// VALIDACION RUT ALUMNO YA MATRICULADO
    $datos = $mysqli->query("SELECT * FROM matriculados WHERE ID LIKE '{$id_matriculado}' ");
    $row =mysqli_fetch_array($datos);


    if($row['RUT_ALUMNO'] !== $rut_alumno ){
        $query2 = $mysqli->query("SELECT * FROM matriculados WHERE RUT_ALUMNO LIKE '{$rut_alumno}' ");
        $res2 = mysqli_num_rows($query2);
        if($res2 > 0){
            array_push($error, "El alumno ya ha sido matriculado anteriormente");
            echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=rut4';</script>";
        }
    }
// VALIDACION RUT ALUMNO YA MATRICULADO








if(count($error)==0){

    
    $query = "UPDATE matriculados SET NOMBRE1_ALUMNO = '{$nombre1}', NOMBRE2_ALUMNO = '{$nombre2}', APELLIDO1_ALUMNO = '{$apellido1}', APELLIDO2_ALUMNO = '{$apellido2}', 
    NOMBRE_APODERADO = '{$nombre_apoderado}', RUT_ALUMNO = '{$rut_alumno}', RUT_APODERADO = '{$rut_apoderado}', ID_GRADO = '{$grado}'
    WHERE ID  = $id_matriculado";


    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='editar.php?id_matriculado=$id_matriculado&mensaje=editado';</script>";

        die();
    }
    else{
        echo "<script>location.href='E_profesor.php?id_matriculado=$id_matriculado&mensaje=error';</script>";

        die();
    
    }
}
