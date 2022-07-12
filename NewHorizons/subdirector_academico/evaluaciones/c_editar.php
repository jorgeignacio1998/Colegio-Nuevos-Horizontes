<?php
require '../seguridad_subdirector.php';
$error = array();

$id_eva = $_POST['id_eva'];
if(!isset($_POST['id_eva'])){
    echo "<script>location.href='index.php?mensaje=error2';</script>";
    die();
}
$grado = $_POST['grado'];
if(!isset($_POST['grado'])) {

    header('Location: ../index.php?mensaje=error3');
    die();
}




$descripcion = $_POST['descripcion'];
$asignatura = $_POST['asignatura'];
$nombre = $_POST['nombre'];
$numero = $_POST['numero'];
$fecha = $_POST['fecha'];


$regexNumeroNatural = "/^[1234567890]*$/"; 




//1.-  numero VALIDACIONES                     
    if(!preg_match($regexNumeroNatural, $numero)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=formato_numero&grado=$grado';</script>";  
        die;  
    }  
//-   numero VALIDACIONES   

//.-  Evaluaciones max 15                     
    if($numero > 15){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=max&grado=$grado';</script>";  
        die;  
    }  
//-   Evaluaciones max 15   





// echo '<script language="javascript">alert("' .  $id_curso   . '");</script>';





// 2.- Validacion evaluacion ya existe
    $datos = $mysqli->query("SELECT * FROM evaluaciones WHERE ID LIKE '{$id_eva}' ");
    $row =mysqli_fetch_array($datos);


    if($row['NUMERO'] !== $numero ){
        $query2 = $mysqli->query("SELECT * FROM evaluaciones WHERE NUMERO LIKE '{$numero}' AND ID_ASIGNATURA LIKE '{$asignatura}' ");
        $res2 = mysqli_num_rows($query2);
        if($res2 > 0){
            array_push($error, "EVALUACION ya existe");
            echo "<script>location.href='index.php?grado=$grado&mensaje=existe';</script>";
        }
    }
// 2.- Validacion evaluacion ya existe



// 3.- Validacion evaluacion ya existe pero si cambia la asignatura
    $datos2 = $mysqli->query("SELECT * FROM evaluaciones WHERE ID LIKE '{$id_eva}' ");
    $row =mysqli_fetch_array($datos2);


    if($row['ID_ASIGNATURA'] !== $asignatura ){
        $query2 = $mysqli->query("SELECT * FROM evaluaciones WHERE NUMERO LIKE '{$numero}' AND ID_ASIGNATURA LIKE '{$asignatura}' ");
        $res2 = mysqli_num_rows($query2);
        if($res2 > 0){
            array_push($error, "EVALUACION ya existe");
            echo "<script>location.href='index.php?grado=$grado&mensaje=existe';</script>";
        }
    }
// 3.- Validacion evaluacion ya existe









if(count($error)==0) {     

  
    //Editando los datos
    $query = "UPDATE evaluaciones SET  NUMERO = '{$numero}', NOMBRE = '{$nombre}' , ID_ASIGNATURA ='{$asignatura}', DESCRIPCION = '{$descripcion}' , FECHA = '{$fecha}'
    WHERE ID = $id_eva ";
    //$sentencia = $mysqli->query($query);

    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='index.php?mensaje=editado&grado=$grado';</script>";

        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";

        die();
    
    }
   
}
    

