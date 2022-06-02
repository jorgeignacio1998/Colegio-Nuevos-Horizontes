<?php 
include '../seguridad_subdirector.php';
$error = array();


$profesor = $_POST["profesor"];
$asignatura = $_POST["asignatura"];










//1 .- Asignaciones clonadas no permitidas.
    $validar_existencia = $mysqli->query("SELECT ID_ASIGNACION FROM asignaturas_profes WHERE ID_PROFESOR LIKE '{$profesor}' AND ID_ASIGNATURA LIKE  '{$asignatura}' ");
    $res = mysqli_num_rows($validar_existencia);

    if($res == 1){
        array_push($error, "Asignacion repetida");
        echo "<script>location.href='asignar_asignatura.php?mensaje=clonado';</script>";

    }
//1.- Asignaciones clonadas no permitidas.




//NO ERRORES 
if(count($error)==0) {     

    $query = "INSERT INTO asignaturas_profes (ID_PROFESOR , ID_ASIGNATURA) VALUES ('{$profesor}','{$asignatura}') ";

       
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='asignar_asignatura.php?mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='asignar_asignatura.php?mensaje=error';</script>";
    
        die();
      
    }
   
}



?>