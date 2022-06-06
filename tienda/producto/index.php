<?php 
include '../codes/connect.php'






?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->  
    
</head>






<body>
    <div class="container">
        <div class="row">
            <?php  
                if(isset($_GET['id_producto'])) {

                    $id_producto = $_GET['id_producto'];
                    $query5 = ("SELECT *,
                    productos.NOMBRE as NOMBRE,
                    productos.STOCK as STOCK,
                    productos.PRECIO as PRECIO
                    
                    FROM galeria
                    INNER JOIN productos
                    ON galeria.ID_PRODUCTO = productos.ID
                    WHERE ID_PRODUCTO = $id_producto AND PRINCIPAL = 1");
                    $resultado = mysqli_query($mysqli, $query5);
                
                }
              
                            
                    if(isset($resultado)){
                    foreach( $resultado as $row ){ 
   
                       
              
            ?>                              
            <div class="col-md-5 order-md-1">
                <img src="../admin/productos/img/<?php  echo $row['FOTO'];      ?>" class="card-img-top" alt="...">       
            </div>
            <?php  }} ?>



            <div class="col-md-7 order-md-2">
                <h2 class=""><?php  echo $row['NOMBRE'];      ?> </h2>
                <h2 class=""><?php  echo '$' .$row['PRECIO'];      ?> </h2>
                <h2 class=""><?php  echo 'CANTIDAD: ' . $row['STOCK'];      ?> </h2>

                <div class="d-grid gap-3 col-10 mx-auto"> 
                    <button class="btn btn-primary" type="button">Comprar ahora</button>
                    <button class="btn btn-outline-primary" type="button">Agregar al carrito</button>
                </div>



            </div>
        </div>

    </div>







</body>
</html>