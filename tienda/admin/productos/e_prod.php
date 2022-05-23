<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.

if(!isset($_POST['codigo'])){
    header('Location: index.php?mensaje=error');
}



$error = array();
$regexPrecio = "/^[1-9][0-9]*$/";    //Numeros enteros sin decimales.
$regexStock = "/^[1-9][0-9]*$/";    //Numeros enteros sin decimales.


//1.-   VALIDACIONES   PRECIO              
if(!preg_match($regexPrecio, $_POST['precio'] )){
    array_push($error, "El formato es invalido");
    header('Location: index.php?mensaje=precio'); //Enviandole ALERTA metodo GET(error1), REDIRECCION 
    
}  
//-  VALIDACIONES   PRECIO     



//2.-  VALIDACIONES   STOCK                     
if(!preg_match($regexStock, $_POST['stock'] )){
    array_push($error, "El formato es invalido");
    header('Location: index.php?mensaje=stock'); //Enviandole ALERTA metodo GET(error1), REDIRECCION 
    
}  
//-  VALIDACIONES   STOCK   



$codigo = $_POST['codigo'];

$nombre_img = $_FILES['imagen']['name'];





if(isset($nombre_img) && $nombre_img !=""){
    $tipo = $_FILES['imagen']['type'];
    $temp = $_FILES['imagen']['tmp_name'];

    if(!((strpos($tipo, 'gif') || strpos($tipo, 'jpeg')  || strpos($tipo, 'webp')   || strpos($tipo, 'jpg')    || strpos($tipo, 'png')   ))){
        array_push($error, "El formato es invalido");
        header('Location: index.php?mensaje=archivo'); //Enviandole ALERTA el archivo no es correcto.
    }else{
        $query = "INSERT INTO galeria (FOTO , ID_PRODUCTO) values ('$nombre_img','$codigo')";
        $resultado = mysqli_query($mysqli, $query);
        if($resultado){
            move_uploaded_file($_FILES['imagen']['tmp_name'],"img/{$nombre_img}");
        }
    }
}



if(count($error)==0){ 

    
//Subiendo imagen producto.


   






    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $categoria = $_POST['categoria'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];



    $mysqli->query("UPDATE productos SET  
    NOMBRE = '{$nombre}', MARCA = '{$marca}', TIPO = '{$categoria}', STOCK ='{$stock}', 
    PRECIO ='{$precio}' WHERE ID = $codigo ");

    header('Location: index.php?mensaje=editado');

}







?>