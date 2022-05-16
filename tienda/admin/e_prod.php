<?php
include 'c_seguridad.php';

if(!isset($_POST['codigo'])){
    header('Location: R_producto.php?mensaje=error');
}

$error = array();
$regexPrecio = "/^[1-9][0-9]*$/";    //Numeros enteros sin decimales.
$regexStock = "/^[1-9][0-9]*$/";    //Numeros enteros sin decimales.







//1.-   VALIDACIONES   PRECIO              
if(!preg_match($regexPrecio, $_POST['precio'] )){
    array_push($error, "El formato es invalido");
    header('Location: R_producto.php?mensaje=precio'); //Enviandole ALERTA metodo GET(error1), REDIRECCION 
    
}  
//-  VALIDACIONES   PRECIO     



//2.-  VALIDACIONES   STOCK                     
if(!preg_match($regexStock, $_POST['stock'] )){
    array_push($error, "El formato es invalido");
    header('Location: R_producto.php?mensaje=stock'); //Enviandole ALERTA metodo GET(error1), REDIRECCION 
    
}  
//-  VALIDACIONES   STOCK   



$codigo = $_POST['codigo'];

$nombre_img = $_FILES['imagen']['name'];












if(count($error)==0){ 

    if(!empty($nombre_img)){
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],"../img/prod/{$nombre_img}")){    
            $mysqli->query("UPDATE productos SET FOTO ='{$nombre_img}' WHERE ID = $codigo "); 
            
    }
    }






    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];



    $mysqli->query("UPDATE productos SET  
    NOMBRE = '{$nombre}', MARCA = '{$marca}', TIPO = '{$categoria}', STOCK ='{$stock}', 
    PRECIO ='{$precio}' WHERE ID = $codigo ");

    header('Location: R_producto.php?mensaje=editado');

}



?>