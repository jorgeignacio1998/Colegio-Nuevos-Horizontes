<?php
require '../seguridad_subdirector.php';
$error = array();
if(!isset($_POST['id_asignacion'])){
    header('Location: index.php?mensaje=error');
}

$id_asignacion = $_POST["id_asignacion"];
$id_asignatura = $_POST["id_asignatura"];
$id_profesor= $_POST["id_profesor"];









//1 .- Asignaciones clonadas no permitidas.
$validar_existencia = $mysqli->query("SELECT ID_ASIGNACION FROM asignaturas_profes WHERE ID_PROFESOR LIKE '{$id_profesor}' AND ID_ASIGNATURA LIKE  '{$id_asignatura}' ");
$res = mysqli_num_rows($validar_existencia);

if($res == 1){
    array_push($error, "Asignacion repetida");
    echo "<script>location.href='asignar_asignatura.php?mensaje=clonado';</script>";

}
//1.- Asignaciones clonadas no permitidas.







//NO ERRORES 
if(count($error)==0) {     

  
    //Editando los datos
    $query = "UPDATE asignaturas_profes SET  ID_ASIGNATURA = '{$id_asignatura}', ID_PROFESOR = '{$id_profesor}'  WHERE ID_ASIGNACION = $id_asignacion ";
    //$sentencia = $mysqli->query($query);

    if(mysqli_query($mysqli, $query)){
        
        echo "<script>location.href='asignar_asignatura.php?mensaje=editado';</script>";

        die();
    }
    else{
        echo "<script>location.href='asignar_asignatura.php?mensaje=error';</script>";

        die();
    
    }
   
}












?>
