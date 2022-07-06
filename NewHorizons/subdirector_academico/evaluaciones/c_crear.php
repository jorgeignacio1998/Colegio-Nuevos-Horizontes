<?php
require '../seguridad_subdirector.php';
$error = array();

$numero = $_POST["numero"];
$nombre = $_POST["nombre"];
$asignatura = $_POST["asignatura"];
$descripcion = $_POST["descripcion"];
$fecha = $_POST["fecha"];

$regexNumeroNatural = "/^[1-9]*$/"; 


 //INYECCIONSQL
 $datita = $mysqli->query("SELECT * FROM  asignaturas WHERE ID_A LIKE '{$asignatura}'");
 $sentencia2 =mysqli_fetch_array($datita);
 $grado = $sentencia2['ID_GRADO'];
 //INYECCIONSQL



 

//1.-  NOMBRE VALIDACIONES                     
    if(!preg_match($regexNumeroNatural, $numero)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=formato_numero&grado=$grado';</script>";  
        die;  
    }  
//-   NOMBRE VALIDACIONES   


//.-  Evaluaciones max 15                     
if($numero > 15){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=max&grado=$grado';</script>";  
    die;  
}  
//-   Evaluaciones max 15   



//-   Validar evaluacion ya existe
$query2 = $mysqli->query("SELECT * FROM evaluaciones WHERE NUMERO LIKE '{$numero}' AND ID_ASIGNATURA LIKE '{$asignatura}' ");
$res2 = mysqli_num_rows($query2);
if($res2 > 0){
    array_push($error, "EVALUACION ya existe");
    echo "<script>location.href='index.php?grado=$grado&mensaje=existe';</script>";
}
//-   Validar evaluacion ya existe

if(count($error)==0) {     

   
    
    
    //  echo '<script language="javascript">alert("' .  $grado   . '");</script>';
    $query = "INSERT INTO evaluaciones (NUMERO , NOMBRE,ID_ASIGNATURA ,DESCRIPCION, ID_GRADO , FECHA ) VALUES ('{$numero}','{$nombre}','{$asignatura}','{$descripcion}','{$grado}','{$fecha}' )";

       
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