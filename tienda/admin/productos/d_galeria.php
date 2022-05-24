<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.




//Recibiendo dos parametros. id de la imagen y el id del producto.
if(!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}
$codigo = $_GET['codigo'];

if(!isset($_GET['id_foto'])){
    header('Location: index.php?mensaje=error ');
    exit();
}
$id_foto = $_GET['id_foto'];










   
    

    //Eliminando los datos
$query = "DELETE FROM galeria WHERE ID_G = $id_foto ";



if(mysqli_query($mysqli, $query)){
    header("Location: E_producto.php?mensaje=eliminado&codigo=$codigo"); //Enviandole 2 POST, EL CODIGO Y LA ALERTA. 2 GETS.
    
}else{
    header('Location: index.php?mensaje=error');
    
}
?>