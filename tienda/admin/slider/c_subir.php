<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.
$error = array();
$nombre_img = $_FILES['imagen']['name'];




if(isset($nombre_img) && $nombre_img !=""){
    $tipo = $_FILES['imagen']['type'];
    $temp = $_FILES['imagen']['tmp_name'];

    if(!((strpos($tipo, 'gif') || strpos($tipo, 'jpeg')  || strpos($tipo, 'webp')   || strpos($tipo, 'jpg')    || strpos($tipo, 'png')   ))){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='index.php?mensaje=formato';</script>";

    }else{
        $query = "INSERT INTO slider_imagenes (NOMBRE_IMAGEN) values ('$nombre_img')";
        $resultado = mysqli_query($mysqli, $query);
        if($resultado){
            move_uploaded_file($_FILES['imagen']['tmp_name'],"../../slider/img/{$nombre_img}");
            echo "<script>location.href='index.php?mensaje=success';</script>";
        }
    }
}
?>