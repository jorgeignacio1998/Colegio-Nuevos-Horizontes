<?php
require '../seguridad_subdirector.php';
$error = array();

if(!isset($_POST['id_sala'])){
    header('Location: index.php?mensaje=error');
}
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
if(!isset($_POST['id_sede'])){
    array_push($error, "no esta el dato");
    echo "<script>location.href='index.php?mensaje=error';</script>";
    exit();
}



$id_sala = $_POST["id_sala"];
$numero = $_POST["numero"];
$piso = $_POST["piso"];

$id_sede = $_POST["id_sede"];



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





$datos = $mysqli->query("SELECT * FROM salas WHERE ID LIKE '{$id_sala}' ");
$row =mysqli_fetch_array($datos);
// 2.- Validacion SALA ya en uso

if($row['NUMERO'] !== $numero ){


   $query2 = $mysqli->query("SELECT * FROM salas WHERE NUMERO LIKE '{$numero}' AND ID_SEDE LIKE '{$id_sede}' ");
   $res2 = mysqli_num_rows($query2);
   if($res2 > 0){
       array_push($error, "La sala ya esta en uso");
       echo "<script>location.href='index.php?mensaje=sala';</script>";
   }


}

// 2.- Validacion SALA ya en uso





if(count($error)==0) {     
    
    $query = "UPDATE salas SET  NUMERO = '{$numero}', PISO = '{$piso}', ID_SEDE = '{$id_sede}'  WHERE ID  = $id_sala ";

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