<?php
include '../seguridad_director.php'; 
$error = array();

// $correos = "SELECT EMAIL FROM usuarios"; 
// $sentencia1 = $mysqli->query($correos);
// $sentencia2 =mysqli_fetch_array($sentencia1);



$id_grado = $_POST['id_grado'];
$cupos=$_POST['cupos'];
$id_periodo=$_POST['id_periodo'];
$precio_matricula=$_POST['precio_matricula'];
$f_inicio=$_POST['f_inicio'];
$f_final=$_POST['f_final'];






// 4  RUT DUPLICADO
// $matricula_existe = $mysqli->query("SELECT * FROM usuarios WHERE RUT LIKE '{$rut}' ");
// if(empty($rut_existe->num_rows)){ 
//     //esta ok, el rut si está disponible para registar.
// }else{
//     array_push($error, "El rut ya esta en uso ");
//     echo "<script>location.href='index.php?mensaje=error10';</script>";
// }
// 4  RUT DUPLICADO








if(count($error)==0){


    
    $query = "INSERT INTO matriculas (PRECIO_MATRICULA, FECHA_INICIO, FECHA_FINAL, CUPOS, ID_GRADO, ID_PERIODO)
    VALUES ('{$precio_matricula}', '{$f_inicio}', '{$f_final}', '{$cupos}', '{$id_grado}','{$id_periodo}') ";







    if(mysqli_query($mysqli, $query)){
       
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
        
    }else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
        exit();
    }
    
    
}



        
?>



