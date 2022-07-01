<?php
require '../seguridad_director.php';
$error = array();
if(!isset($_POST['curso'])){
    echo "<script>location.href='index.php?mensaje=error1';</script>";
}
if(!isset($_POST['id_alumno'])){
    echo "<script>location.href='index.php?mensaje=error2';</script>";
}
$id_alumno = $_POST['id_alumno'];
$id_curso = $_POST['curso'];


// echo '<script language="javascript">alert("' .  $id_curso   . '");</script>';


    
$query = "UPDATE alumnos SET ID_CURSO = '{$id_curso}'
WHERE ID  LIKE $id_alumno ";


if(mysqli_query($mysqli, $query)){
// echo '<script language="javascript">alert(" listo ");</script>';
echo "<script>location.href='editar.php?id_alumno=$id_alumno&mensaje=cambiado';</script>";
}
else{
    echo "<script>location.href='editar.php?id_alumno=$id_alumno&mensaje=error';</script>";

    die();
    
}

