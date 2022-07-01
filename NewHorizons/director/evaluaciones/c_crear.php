<?php
require '../seguridad_director.php';
$error = array();

$numero = $_POST["numero"];
$nombre = $_POST["nombre"];
$asignatura = $_POST["asignatura"];
$descripcion = $_POST["descripcion"];

$regexNumeroNatural = "/^[1-9]*$/"; 
$regexNombre = "/^[a-zA-Z\s]+$/";



//1.-  NOMBRE VALIDACIONES                     
    if(!preg_match($regexNumeroNatural, $numero)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=formato_nombre';</script>";  
        die;  
    }  
//-   NOMBRE VALIDACIONES   







if(count($error)==0) {     

    //INYECCIONSQL
    $datita = $mysqli->query("SELECT * FROM  asignaturas WHERE ID_A LIKE '{$asignatura}'");
    $sentencia2 =mysqli_fetch_array($datita);
    $grado = $sentencia2['ID_GRADO'];
    //INYECCIONSQL
    
    
    //  echo '<script language="javascript">alert("' .  $grado   . '");</script>';
    $query = "INSERT INTO evaluaciones (NUMERO , NOMBRE,ID_ASIGNATURA ,DESCRIPCION, ID_GRADO ) VALUES ('{$numero}','{$nombre}','{$asignatura}','{$descripcion}','{$grado}') ";

       
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?mensaje=registrado&grado=$grado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }
   
}












    
?>