<?php
require '../seguridad_subdirector.php';
if(!isset($_POST['id_clase'])){
    header('Location: index?mensaje=error');
}
$id_clase = $_POST["id_clase"];


echo '<script language="javascript">alert("' . 'ALERTO: ' .  $id_clase   . '");</script>';


// $nombre = $_POST["nombre"];
// $grado= $_POST["grado"];

//Editando los datos
// $query = "UPDATE asignaturas SET  NOMBRE = '{$nombre}', ID_GRADO = '{$grado}'  WHERE ID_A = $codigo ";
//$sentencia = $mysqli->query($query);






// if(mysqli_query($mysqli, $query)){
    
//     echo "<script>location.href='index.php?mensaje=editado';</script>";

//     die();
// }
// else{
//     echo "<script>location.href='index.php?mensaje=error';</script>";

//     die();
  
// }

?>
