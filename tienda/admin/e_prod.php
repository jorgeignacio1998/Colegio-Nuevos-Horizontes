<?php
include 'c_seguridad.php';
if(!isset($_POST['codigo'])){
    header('Location: ../admin/gestionarUsuarios.php?mensaje=error');
}




$nombre_img = $_FILES['imagen']['name'];

if(!empty($nombre_img)){
    if(move_uploaded_file($_FILES['imagen']['tmp_name'],"../img/prod/{$nombre_img}")){     
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
PRECIO ='{$precio}', FOTO ='{$nombre_img}' WHERE ID = $codigo ");

header('Location: R_producto.php');


?>