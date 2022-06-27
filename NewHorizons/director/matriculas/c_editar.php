<?php
require '../seguridad_director.php';
$error = array();
if(!isset($_POST['id_matricula'])){
    header('Location: index.php?mensaje=error');
}

$regexNumeroNatural = "/^[0-9]*$/"; 
$id_grado = $_POST["grado"];
$id_periodo= $_POST["id_periodo"];
$cupos= $_POST["cupos"];
$precio_matricula = $_POST["precio_matricula"];
$f_inicio= $_POST["f_inicio"];
$f_final= $_POST["f_final"];
$id_matricula= $_POST["id_matricula"];

// echo '<script language="javascript">alert("'.$row['ID_SALA'].'");</script>';
// echo '<script language="javascript">alert("'.$id_sala.'");</script>';
//usando alertas

// esta sentencia es para usarlas para validar datos clonados.
$datos = $mysqli->query("SELECT * FROM matriculas WHERE ID LIKE '{$id_matricula}' ");
$row =mysqli_fetch_array($datos);

// 5  cupos formato
if(!preg_match($regexNumeroNatural, $cupos)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=cupos_formato';</script>";
}  
// 5  cupos formato


// 6  precio formato
if(!preg_match($regexNumeroNatural, $precio_matricula)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=precio_formato';</script>";
}  
// 6  precio formato



// 7  limite cupos
if($cupos>400){
    array_push($error, "excede numero");
    echo "<script>location.href='index.php?mensaje=excede_cupos';</script>";
}
// 7  limite cupos

// 8  limite precio
if($precio_matricula>200000){
    array_push($error, "excede numero");
    echo "<script>location.href='index.php?mensaje=excede_precio';</script>";
}
// 8  limite precio

//3 precio no menor a 10k
if($precio_matricula < 9999){
    array_push($error, "cupos no puede ser menor a 10000");
    echo "<script>location.href='index.php?mensaje=precio_bajo';</script>";
}
//3 precio no menor a 10k



// 1.- Validacion  ya en uso
if($row['ID_GRADO'] !== $id_grado ){
    $query1 = $mysqli->query("SELECT * FROM matriculas WHERE ID_GRADO LIKE '{$id_grado}' AND ID_PERIODO LIKE '{$id_periodo}'");
    $res1 = mysqli_num_rows($query1);
    if($res1 > 0){
        array_push($error, "Matricula ya esta registrada anteriormente ");
        echo "<script>location.href='editar.php?codigo=$id_matricula&mensaje=matricula_existe';</script>";
        
    }
}
// 1.- Validacion  ya en uso










if(count($error)==0) {     
    
    $query = "UPDATE matriculas SET PRECIO_MATRICULA = '{$precio_matricula}', FECHA_INICIO = '{$f_inicio}', FECHA_FINAL = '{$f_final}',
    CUPOS = '{$cupos}',ID_GRADO = '{$id_grado}',ID_PERIODO = '{$id_periodo}'   WHERE ID  = $id_matricula ";

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
