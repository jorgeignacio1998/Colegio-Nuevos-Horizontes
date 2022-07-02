<?php 
include '../seguridad_subdirector.php';
$error = array();


$periodo = $_POST["periodo"];
$nombre = $_POST["nombre"];
$id_curso = $_POST["curso"];
$profesor = $_POST["profesor"];
$id_asignatura = $_POST["id_asignatura"];


//INYECCIONSQL
$datita2 = $mysqli->query("SELECT * FROM cursos WHERE ID LIKE $id_curso ");
$sentencia22 =mysqli_fetch_array($datita2);
$id_sala = $sentencia22['ID_SALA'];
//INYECCIONSQL

//  echo '<script language="javascript">alert("' . 'ALERTO: ' .  $id_sala   . '");</script>';





//1 .- Asignaciones clonadas no permitidas.
    $validar_existencia = $mysqli->query("SELECT * FROM clases WHERE ID_CURSO LIKE $id_curso AND ID_ASIGNATURA LIKE $id_asignatura ");
    $res = mysqli_num_rows($validar_existencia);

    if($res > 0){
        array_push($error, "Asignacion repetida");
        echo "<script>location.href='asignar_asignatura.php?mensaje=clonado';</script>";

    }
//1.- Asignaciones clonadas no permitidas.

//2.- FORMATO NOMBRE CURSO.
    $regexNombreCurso = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9.\s\-]+$/";                   
    if(!preg_match($regexNombreCurso, $nombre)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='asignar_asignatura.php?mensaje=formato_nombre';</script>";  //Enviandole ALERTA metodo GET(error1), REDIRECCION 
        
    }  
//2.- FORMATO NOMBRE CURSO.




if(count($error)==0) {     

    $query = "INSERT INTO clases (ID_PERIODO , NOMBRE, ID_CURSO, ID_PROFESOR, ID_ASIGNATURA,ID_SALA) VALUES ('{$periodo}','{$nombre}', '{$id_curso}','{$profesor}' , '{$id_asignatura}', '{$id_sala}') ";

    
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