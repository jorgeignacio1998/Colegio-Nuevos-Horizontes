<?php
include '../seguridad_profesor.php';    //BD, SEGURIDAD NIVEL, SESSION.
$error = array();

if(!isset($_POST['id_calificacion'])){
    header('Location: index.php?mensaje=error3333');
}


$id_calificacion = $_POST["id_calificacion"];
$id_clase = $_POST["id_clase"];
$nota = $_POST["nota"];


$Regexnota = "/^(\d{1,7})(\.\d{1,2}){0,1}$/";


//1.-formato numero                      
// if(!preg_match($regexNumeroNatural, $numero)){
//     array_push($error, "El formato es invalido");
//     echo "<script>location.href='index.php?mensaje=formato_numero';</script>";  
//     die;  
// }  
//- formato numero       


  // 2.- noya menor 1 mayor 7
  if($nota > 7 || $nota < 1 ){
    array_push($error, " nota Fuera de rango");
    echo "<script>location.href='index.php?mensaje=fuera_rango&id_clase=$id_clase';</script>";  
    die;  
}
// 2.- noya menor 1 mayor 7




if(count($error)==0) {     
    
    $query = "UPDATE calificaciones SET  NOTA = '{$nota}' WHERE ID  = $id_calificacion ";

    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='index.php?id_clase=$id_clase';</script>";

        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error33';</script>";

        die();
    
    }
   
}

?>