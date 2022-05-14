<?php
include 'c_seguridad.php';




$error = array();


$regexPrecio = 'solo numeros no mayor a 99.999.999 ni menor a 100';
$regexStock = 'solo numeros  no mayor a 9999';

// El precio se coloque con puntos y signo $ automaticamente. precio con descuento se coloquen automaticamente digitando precio y descuento







// if(count($error)==0){ 

    $nombre_img = $_FILES['imagen']['name'];
    if(!empty($nombre_img)){
        move_uploaded_file($_FILES['imagen']['tmp_name'],"../img/prod/{$nombre_img}");
        
    }
   

    $nombre_producto = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];
    $descripcion = $_POST['descripcion'];

    
    

     $mysqli->query("INSERT INTO productos (NOMBRE, MARCA, TIPO, STOCK, PRECIO, FOTO, DESCRIPCION) 
                         VALUES ('{$nombre_producto}', '{$marca}', '{$categoria}', '{$stock}', '{$precio}', '{$nombre_img}', '{$descripcion}') ");





    header('Location: C_producto.php?mensaje=guardado');  //mensaje       
    
    
   
// }

?>

