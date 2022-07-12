<?php
require '../seguridad_director.php';
$error = array();

if(!isset($_POST['numero'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}
if(!isset($_POST['piso'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}
if(!isset($_POST['sede'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}



$numero = $_POST["numero"];
$piso = $_POST["piso"];
$id_sede = $_POST["sede"];


$regexNumeroNatural = "/^[1234567890]*$/"; 

//1.-formato numero                      
if(!preg_match($regexNumeroNatural, $numero)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_numero';</script>";  
    die;  
}  
//- formato numero       
//1.-formato piso                    
if(!preg_match($regexNumeroNatural, $piso)){
    array_push($error, "El formato es invalido");
    echo "<script>location.href='index.php?mensaje=formato_piso';</script>";  
    die;  
}  
//- formato piso       
   

    // 2.- Validacion SALA ya en uso
    
        $query2 = $mysqli->query("SELECT * FROM salas WHERE NUMERO LIKE '{$numero}' AND ID_SEDE LIKE '{$id_sede}' ");
        $res2 = mysqli_num_rows($query2);
        if($res2 > 0){
            array_push($error, "La sala ya esta en uso");
            echo "<script>location.href='index.php?mensaje=sala';</script>";
        }
    
    // 2.- Validacion SALA ya en uso
  




   







    
     $query = "INSERT INTO salas (NUMERO,PISO,ID_SEDE) VALUES ('{$numero}','{$piso}','{$id_sede}'   ) ";
    


if(count($error)==0) {     
    
    if(mysqli_query($mysqli, $query)){
    
        echo "<script>location.href='index.php?mensaje=registrado';</script>";
    
        die();
    }
    else{
        echo "<script>location.href='index.php?mensaje=error';</script>";
    
        die();
      
    }
}
    
?>