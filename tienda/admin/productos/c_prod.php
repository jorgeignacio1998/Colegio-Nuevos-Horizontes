<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.




$error = array();


$regexPrecio = "/^[1-9][0-9]*$/";    //Numeros enteros sin decimales.
$regexStock = "/^[1-9][0-9]*$/";    //Numeros enteros sin decimales.







//1.-   VALIDACIONES   PRECIO              
if(!preg_match($regexPrecio, $_POST['precio'] )){
    array_push($error, "El formato es invalido");
    header('Location: C_producto.php?mensaje=precio'); //Enviandole ALERTA metodo GET(error1), REDIRECCION 
    
}  
//-  VALIDACIONES   PRECIO     



//2.-  VALIDACIONES   STOCK                     
if(!preg_match($regexStock, $_POST['stock'] )){
    array_push($error, "El formato es invalido");
    header('Location: C_producto.php?mensaje=stock'); //Enviandole ALERTA metodo GET(error1), REDIRECCION 
    
}  
//-  VALIDACIONES   STOCK   







if(count($error)==0){ 

    $nombre_img = $_FILES['imagen']['name'];
    if(!empty($nombre_img)){
        move_uploaded_file($_FILES['imagen']['tmp_name'],"../../img/prod/{$nombre_img}");
        
    }
   

    $nombre_producto = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];

    
    

     $mysqli->query("INSERT INTO productos (NOMBRE, MARCA, TIPO, STOCK, PRECIO, FOTO, DESCRIPCION) 
                         VALUES ('{$nombre_producto}', '{$marca}', '{$categoria}', '{$stock}', '{$precio}', '{$nombre_img}', '{$descripcion}') ");





    header('Location: index.php?mensaje=registrado');  //mensaje       
    
    
   
}

?>

