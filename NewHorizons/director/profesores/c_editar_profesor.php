<?php
require '../seguridad_director.php';

$error = array();
$regexNombre = "/^[a-zA-Z\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";


$ruts = "SELECT RUT FROM profesores"; 
$sentencia1 = $mysqli->query($ruts);
$sentencia2 =mysqli_fetch_array($sentencia1);

$id_profesor=$_POST['id_profesor'];
$nombre=$_POST['nombre'];
$rut = $_POST['rut'];



//1.-  NOMBRE VALIDACIONES                     
if(!preg_match("/^[a-zA-Z\s]+$/", $nombre)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='E_profesor.php?mensaje=formato_nombre';</script>";
    
}  
//-   NOMBRE VALIDACIONES   


//2.-  RUT VALIDACIONES                     
if(!preg_match($regexRut, $rut)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_rut';</script>";
}  
//-  RUT VALIDACIONES   





// 2.- Validacion sala ya en uso
// if($row['ID_CURSO'] !== $id_curso ){
//     $query2 = $mysqli->query("SELECT * FROM jefaturas WHERE ID_CURSO LIKE '{$id_curso}' ");
//     $res2 = mysqli_num_rows($query2);
//     if($res2 > 0){
//         array_push($error, "Curso no disponible");
//         echo "<script>location.href='E_jefatura.php?id_jefatura=$id_jefatura&mensaje=curso_ocupado';</script>";
//     }
// }
// 2.- Validacion sala ya en uso








if(count($error)==0){

    
    $query = "UPDATE profesores SET NOMBRE = '{$nombre}', RUT = '{$rut}'   WHERE ID  = $id_profesor ";


    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='E_profesor.php?mensaje=editado&id_profesor=$id_profesor';</script>";

        die();
    }
    else{
        echo "<script>location.href='E_profesor.php?mensaje=error&id_profesor=$id_profesor';</script>";

        die();
    
    }
}
