<?php
require '../seguridad_subdirector.php';
$error = array();

// $correos = "SELECT EMAIL FROM usuarios"; 
// $sentencia1 = $mysqli->query($correos);
// $sentencia2 =mysqli_fetch_array($sentencia1);



$id_grado = $_POST['id_grado'];
$cupos=$_POST['cupos'];
$id_periodo=$_POST['id_periodo'];
$precio_matricula=$_POST['precio_matricula'];
$f_inicio=$_POST['f_inicio'];
$f_final=$_POST['f_final'];


// $regexNombre = "/^[A-Za-z]+$/"; 
$regexNumeroNatural = "/^[1-9]*$/"; 



// 4  matricula_existe
$matricula_existe = $mysqli->query("SELECT * FROM matriculas WHERE ID_GRADO LIKE '{$id_grado}' AND ID_PERIODO LIKE '{$id_periodo}' ");
if(empty($matricula_existe->num_rows)){ 
    
}else{
    array_push($error, "La matricula ya existe ");
    echo "<script>location.href='index.php?mensaje=matricula_existe';</script>";
}
// 4  matricula_existe


//2 cupos no 0
if($cupos == 0){
    array_push($error, "cupos no puede ser 0");
    echo "<script>location.href='index.php?mensaje=cupo_cero';</script>";
}
//2 cupos no 0


//3 precio no menor a 10k
if($precio_matricula < 9999){
    array_push($error, "cupos no puede ser menor a 10000");
    echo "<script>location.href='index.php?mensaje=precio_bajo';</script>";
}
//3 precio no menor a 10k


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









if(count($error)==0){


    
    $query = "INSERT INTO matriculas (PRECIO_MATRICULA, FECHA_INICIO, FECHA_FINAL, CUPOS, ID_GRADO, ID_PERIODO)
    VALUES ('{$precio_matricula}', '{$f_inicio}', '{$f_final}', '{$cupos}', '{$id_grado}','{$id_periodo}') ";







    if(mysqli_query($mysqli, $query)){
       
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
        
    }else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
        exit();
    }
    
    
}



        
?>



