<?php
include '../seguridad_director.php'; 
//print_r($_POST);
if(!isset($_POST['codigo'])){
    echo "<script>location.href='index.php?mensaje=error';</script>";
}
$error = array();

$codigo = $_POST['codigo'];
$nombre = $_POST['txtNombre'];
$rut = $_POST['rut'];
$correo = $_POST['txtCorreo'];
$contraseña1 = $_POST['txtPass'];
$contraseña2 = md5($contraseña1);
$nivel = $_POST['txtNivel'];


$regexRut = "/^\d{1,2}\.\d{3}\.\d{3}[-][0-9kK]{1}$/";
$regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,3}+$/";





//1.-  EMAIL VALIDACIONES  
if(!preg_match($regexEmail, $correo)){
    array_push($error, "El formato del correo es invalido");  //este mensaje no es visible al usuario, se llena en la lista error, la cual sí está vacia hara cambios en la base de datos.
    echo "<script>location.href='editar.php?codigo=$codigo&mensaje=formato2';</script>";
};

//1.-  EMAIL VALIDACIONES  


//2.-  RUT VALIDACIONES                     
if(!preg_match($regexRut, $rut)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='editar.php?codigo=$codigo&mensaje=formato3';</script>";
        
}  
//2-  RUT VALIDACIONES   






// 3.- Validacion Email ya existe
$datos1 = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$codigo}' ");
$row1 =mysqli_fetch_array($datos1);


if($row1['EMAIL'] !== $correo ){
    $query3 = $mysqli->query("SELECT * FROM usuarios WHERE EMAIL LIKE '{$correo}' ");
    $res3 = mysqli_num_rows($query3);
    if($res3 > 0){
        array_push($error, "CORREO ya existe");
        echo "<script>location.href='editar.php?codigo=$codigo&mensaje=correo_clonado';</script>";
    }
}
// 3.- Validacion Email ya en uso











// 11.- Validacion Rut ya existe en EDITAR USUARIO
$datos = $mysqli->query("SELECT * FROM usuarios WHERE ID LIKE '{$codigo}' ");
$row =mysqli_fetch_array($datos);


if($row['RUT'] !== $rut ){
    $query2 = $mysqli->query("SELECT * FROM usuarios WHERE RUT LIKE '{$rut}' ");
    $res2 = mysqli_num_rows($query2);
    if($res2 > 0){
        array_push($error, "Rut ya esta en uso");
        echo "<script>location.href='editar.php?codigo=$codigo&mensaje=error10';</script>";
    }
}
// 11.- Validacion Rut ya en uso EDITAR USUARIO












if(count($error)==0){
    //Editando los datos
    $query = "UPDATE usuarios SET  NOMBRE = '{$nombre}', RUT = '{$rut}', EMAIL = '{$correo}', CONTRASENA = '{$contraseña2}', NIVEL ='{$nivel}'  WHERE ID = $codigo ";
    //$sentencia = $mysqli->query($query);


    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?mensaje=editado';</script>";
    }else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    }

}

?>