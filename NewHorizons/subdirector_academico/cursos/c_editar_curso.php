<?php
require '../seguridad_subdirector.php';
$error = array();
if(!isset($_POST['id_curso'])){
    header('Location: index.php?mensaje=error');
}

$grado = $_POST["grado"];
$nombre = $_POST["nombre"];
$regexNombre = "/^[A-Za-z]+$/"; 
$id_sala= $_POST["sala"];


$id_curso= $_POST["id_curso"];

// echo '<script language="javascript">alert("'.$row['ID_SALA'].'");</script>';
// echo '<script language="javascript">alert("'.$id_sala.'");</script>';



// esta sentencia es para usarlas para validar datos clonados.
$datos = $mysqli->query("SELECT * FROM cursos WHERE ID LIKE '{$id_curso}' ");
$row =mysqli_fetch_array($datos);





// 0.- curso clonado
if($row['ID_GRADO'] !== $grado ){
    $query0 = $mysqli->query("SELECT * FROM cursos WHERE NOMBRE LIKE '{$nombre}' and ID_GRADO LIKE '{$grado}'  ");
    $res0 = mysqli_num_rows($query0);
    if($res0 > 0){
        array_push($error, "El curso ya existe");  
        echo "<script>location.href='E_curso.php?id_curso=$id_curso&mensaje=curso_clonado';</script>";
    }
}
// 0.- curso clonado



// 1.- Validacion nombre ya en uso
if($row['NOMBRE'] !== $nombre ){
    $query1 = $mysqli->query("SELECT * FROM cursos WHERE NOMBRE LIKE '{$nombre}' AND  ID_GRADO LIKE '{$grado}' ");
    $res1 = mysqli_num_rows($query1);
    if($res1 > 0){
        array_push($error, "El nombre del curso ya esta en uso");
        echo "<script>location.href='E_curso.php?id_curso=$id_curso&mensaje=curso_clonado';</script>";
        
    }
}
// 1.- Validacion nombre ya en uso



// 2.- Validacion SALA ya en uso
if($row['ID_SALA'] !== $id_sala ){
    $query2 = $mysqli->query("SELECT * FROM cursos WHERE ID_SALA LIKE '{$id_sala}' ");
    $res2 = mysqli_num_rows($query2);
    if($res2 > 0){
        array_push($error, "La sala ya esta en uso");
        echo "<script>location.href='E_curso.php?id_curso=$id_curso&mensaje=sala_clonada';</script>";
    }
}
// 2.- Validacion SALA ya en uso




// 3.- formato nombre                   
if(!preg_match($regexNombre, $nombre)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='E_curso.php?id_curso=$id_curso&mensaje=formato_nombre';</script>";
    
}  
// 3.-   formato nombre    












if(count($error)==0) {     
    
    $query = "UPDATE cursos SET  NOMBRE = '{$nombre}', ID_GRADO = '{$grado}', ID_SALA = '{$id_sala}'  WHERE ID  = $id_curso ";

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
