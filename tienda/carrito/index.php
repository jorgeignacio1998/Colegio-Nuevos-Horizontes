<?php 
include '../codes/connect.php';
session_start();
// session_destroy();
if(isset($_SESSION["carrito"])){
   foreach($_SESSION["carrito"] as $indice => $arreglo){
        echo ' <hr> ID del producto: ' . $indice . "<br>";
        foreach($arreglo as $key => $value){
            echo $key . ": " . $value;
        }
   }

}else{
    echo '<script language="javascript">alert("carrito vacio");</script>';
}


$cantidad1 = 2;









?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de compras</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->  
</head>
<style>

    .col1{
        height:580px; overflow-y:scroll;
    }
    .img_productos{
        height: 100%;
        width:100%;           
    }
    .not-active { 
            pointer-events: none; 
            cursor: default; 
        } 

</style>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>  
   
    <?php 
    include 'navbar.php';
    ?>

    <br><br>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">




            <div  class="col-md-6 col-sm-12">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->
                <div  class="card "><br>
                    <div class="card-header">  
                        <h3>Cesta</h3>                                                                                                <!-- aca-->
                    </div>
                    <div class="p-4 col1">   
                        
                    


                        <div class="row">  <!-- CADA  PRODUCTO   -->

                            <!--aca iria el FOR EACH   -->
                            <?php  

                                if(isset($_SESSION["carrito"])){

                               
                                $query5 = ("SELECT * FROM productos WHERE ID = $indice ");
                                $resultado = mysqli_query($mysqli, $query5);


                                if(isset($resultado)){
                                foreach( $resultado as $row ){ 
                                
                                    
                            

                            // if(isset($resultado)){
                            // foreach( $resultado as $row ){ 
                            ?>


                            <div class="col-3 m-3 ">
                                <img src="../admin/productos/img/<?php  echo 'nombre de la foto'  ?>" class="img_productos">       
                            </div>
                            <div class="col-6 mt-2">
                                <h3><?php if(isset($_SESSION["carrito"])){echo $row['NOMBRE'];}?></h3>
                                <a> DESCRIPCION: Lorem ipsum dolor sit amet consectetur adipisicing elit. Facili
                                    s voluptas quis unde consequatur, iste illum error fugiat modi assumenda asperiores e
                                    ius voluptatem dolor. Cum corrupti, similique laboriosam libero magni deleniti.</a> 
                                <h4 class="mt-2">$50.000</h4>
                            </div>


                            <div class="col-2 p-3 m-3  ">
                                <div class="row mt-5 p-2">
                                    <?php 
                                    if($cantidad1 == 1){
                                    ?>
                                    <div class="col-4 not-active" >
                                        <a href="" > <i class="fa-solid fa-minus" ></i></a>
                                    </div>
                                    <?php }else{ ?>
                                    <div class="col-4" >
                                        <a href="" > <i class="fa-solid fa-minus" ></i></a>
                                    </div>
                                    <?php }?>


                                    <div class="col-4">
                                        <a> <?php echo $cantidad1; ?></a>
                                    </div>
                                    <div class="col-4">
                                        <a href="">  <i class="fa-solid fa-plus"></i> </a>
                                    </div>
                                </div>
                            </div>
                            

                        </div>     <!-- CADA  PRODUCTO   -->
                        
                        




                    </div>
                    <?php }  } ?>
                </div>
            </div> 





            <div class="col-md-3 col-sm-12">
                <div  class="card "><br>
                    <div class="card-header">  
                        <h3>Resumen del pedido </h3>                                                                                                <!-- aca-->
                    </div>
                    <div class="p-4">      
                        <div class="row">
                            <div class="col-6">
                                <h4>Subtotal: </h4>
                            </div>
                            <div class="col-6 d-flex flex-row-reverse">
                                <h4 class="d-flex flex-row-reverse">$ 0</h4>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-6">
                                <h4>Envio: </h4>
                            </div>
                            <div class="col-6 d-flex flex-row-reverse">
                                <h4 class="d-flex flex-row-reverse">$ 0</h4>
                            </div>
                        </div>  
                        <br>
                        <div class="row mt-5">
                            <div class="col-6">
                                <h2>Total: </h2>
                            </div>
                            <div class="col-6 d-flex flex-row-reverse">
                                <h2 class="d-flex flex-row-reverse">$ 0</h2>
                            </div>
                        </div>  

                        <br><br>
                        <div class="">
                            <button type="button" class="btn btn-success btn-lg  ">COMPRAR</button>
                        </div>
                    
                    </div>
                </div>
            </div>





            <?php }   ?>
        </div>
    </div>  
</body>
</html>