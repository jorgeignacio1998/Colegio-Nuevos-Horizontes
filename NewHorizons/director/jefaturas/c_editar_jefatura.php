<?php
require '../seguridad_director.php';
$error = array();
if(!isset($_POST['id_jefatura'])){
    header('Location: index.php?mensaje=error');
}


$id_profesor = $_POST["id_profesor"];
$id_curso= $_POST["id_curso"];
$id_jefatura= $_POST["id_jefatura"];

// echo '<script language="javascript">alert("'.$row['ID_SALA'].'");</script>';
// echo '<script language="javascript">alert("'.$id_sala.'");</script>';
//usando alertas

// esta sentencia es para usarlas para validar datos clonados.
$datos = $mysqli->query("SELECT * FROM jefaturas WHERE ID_JEFATURA LIKE '{$id_jefatura}' ");
$row =mysqli_fetch_array($datos);





// 1.- Validacion profesor ya en uso
if($row['ID_PROFESOR'] !== $id_profesor ){
    $query1 = $mysqli->query("SELECT * FROM jefaturas WHERE ID_PROFESOR LIKE '{$id_profesor}' ");
    $res1 = mysqli_num_rows($query1);
    if($res1 > 0){
        array_push($error, "El Profesor no está disponible ");
        echo "<script>location.href='E_jefatura.php?id_jefatura=$id_jefatura&mensaje=profesor_ocupado';</script>";
        
    }
}
// 1.- Validacion profesor ya en uso



// 2.- Validacion sala ya en uso
if($row['ID_CURSO'] !== $id_curso ){
    $query2 = $mysqli->query("SELECT * FROM jefaturas WHERE ID_CURSO LIKE '{$id_curso}' ");
    $res2 = mysqli_num_rows($query2);
    if($res2 > 0){
        array_push($error, "Curso no disponible");
        echo "<script>location.href='E_jefatura.php?id_jefatura=$id_jefatura&mensaje=curso_ocupado';</script>";
    }
}
// 2.- Validacion sala ya en uso








if(count($error)==0) {     
    
    $query = "UPDATE jefaturas SET   ID_PROFESOR = '{$id_profesor}', ID_CURSO = '{$id_curso}'  WHERE ID_JEFATURA  = $id_jefatura ";

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
