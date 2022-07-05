<?php
require '../seguridad_subdirector.php';
$error = array();

$id_apoderado = $_POST['idapod'];
echo '<script language="javascript">alert("' . 'ALERTO: ' .  $id_apoderado   . '");</script>';
if(!isset($_POST['idapod'])) {

    header('Location: ../index.php?mensaje=error');
    exit();
}

if(!isset($_POST['nombre'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}
if(!isset($_POST['rut'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}
if(!isset($_POST['email'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}
if(!isset($_POST['telefono'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}
if(!isset($_POST['direccion'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}
if(!isset($_POST['rutalumno'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}

$nombre = $_POST["nombre"];
$rut = $_POST["rut"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$direccion = $_POST["direccion"];
$rutalumno = $_POST["rutalumno"];

$regexNombre = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ\s]+$/";
$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";
$regexDireccion = "/^[A-Za-z0-9'\.\-\s\,]+$/";
$regexTelefono = "/\A(\+?56)?(\s?)(0?9)(\s?)[9876543]\d{7}\z/";
$regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,3}+$/";

//INYECCIONSQL
$datita = $mysqli->query("SELECT * FROM  matriculados WHERE RUT_ALUMNO LIKE '{$rutalumno}'");
$sentencia2 =mysqli_fetch_array($datita);
$idmatriculado = $sentencia2['ID'];
//INYECCIONSQL

//1.-formato nombre                      
if(!preg_match($regexNombre, $nombre)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_nombre';</script>";  
    die;  
}  
//- formato nombre    

//1.-formato rut                  
if(!preg_match($regexRut, $rut)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_rut';</script>";  
    die;  
}  
//- formato rut 

//1.-formato email                  
if(!preg_match($regexEmail, $email)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_email';</script>";  
    die;  
}  
//- formato email

//1.-formato telefono               
if(!preg_match($regexTelefono, $telefono)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_telefono';</script>";  
    die;  
}  
//- formato telefono

//1.-formato direccion
if(!preg_match($regexDireccion, $direccion)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_direccion';</script>";  
    die;  
}  
//- formato direccion

//1.-formato rutalumno
if(!preg_match($regexRut, $rutalumno)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_rutalumno';</script>";  
    die;  
}  
//- formato rutalumno



    // 2.- Validacion Apoderado duplicado
    $datos = $mysqli->query("SELECT * FROM apoderados WHERE ID_MATRICULADO LIKE '{$idmatriculado}' ");
    $row =mysqli_fetch_array($datos);    
    // echo '<script language="javascript">alert("' . 'ALERTO: ' .  $row['RUT']   . '");</script>';

// 4  RUT DUPLICADO
$alumno_existe = $mysqli->query("SELECT * FROM matriculados WHERE RUT_ALUMNO LIKE '{$rutalumno}' ");
if(empty($alumno_existe->num_rows)){ 
    array_push($error, "El rut ya esta en uso ");
    echo "<script>location.href='index.php?mensaje=erroralumnoduplicado';</script>";

}else{
    //esta ok, el rut si está disponible para registar.
}

if($row['RUT'] !== $rut ){
    $query2 = $mysqli->query("SELECT * FROM apoderados INNER JOIN matriculados ON apoderados.ID_MATRICULADO = matriculados.ID WHERE apoderados.RUT LIKE '{$rut}' AND matriculados.RUT_ALUMNO LIKE '{$rutalumno}'");
    $res2 = mysqli_num_rows($query2);
    if($res2 > 0){
        array_push($error, "Error, Apoderado duplicado");
        echo "<script>location.href='index.php?mensaje=apoderadoduplicado';</script>";
    }
}

if($row['RUT_ALUMNO'] !== $rutalumno ){
    $query2 = $mysqli->query("SELECT * FROM apoderados INNER JOIN matriculados ON apoderados.ID_MATRICULADO = matriculados.ID WHERE apoderados.RUT LIKE '{$rut}' AND matriculados.RUT_ALUMNO LIKE '{$rutalumno}'");
    $res2 = mysqli_num_rows($query2);
    if($res2 > 0){
        array_push($error, "Error, Apoderado duplicado");
        echo "<script>location.href='index.php?mensaje=apoderadoduplicado';</script>";
    }
}



if(count($error)==0) {     
    
    $query = "UPDATE apoderados SET  NOMBRE = '{$nombre}', RUT = '{$rut}', EMAIL = '{$email}', TELEFONO = '{$telefono}', DIRECCION = '{$direccion}', ID_MATRICULADO = '{$idmatriculado}'  WHERE ID  = $id_apoderado ";

    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='index.php?mensaje=editado';</script>";

        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";

        die();
    
    }
   
}

?>