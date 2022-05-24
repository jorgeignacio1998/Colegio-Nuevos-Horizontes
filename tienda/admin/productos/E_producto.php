<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.
$codigo = $_GET['codigo'];
if(!isset($_GET['codigo'])) {
    header('Location: index.php?mensaje=error');
    exit();
}

//Pintando datos Del ID = GET
$query = "SELECT NOMBRE,MARCA,TIPO,STOCK,PRECIO,DESCUENTO,DESCRIPCION,FOTO  FROM productos  WHERE ID = $codigo ";
$sentencia1 = $mysqli->query($query);
//print_r($sentencia1);  no entrega nada importante la sentencia es importante para la segunda.
$sentencia2 =mysqli_fetch_array($sentencia1);
//print_r($sentencia2);   //TIENE LOS DATOS ahora se pintan en lo value.





//Pintando Imagenes en la galeria
$query2 = "SELECT * FROM galeria WHERE ID_PRODUCTO = $codigo ";
$resultado = mysqli_query($mysqli, $query2);




?>





<!doctype html>
<html lang="en">
  <head>
    <title>Editar productos</title>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../../styles/1.css?<?php echo time(); ?>" > <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
</head>





    <!-- Bootstrap CSS v5.0.2 -->
    <style>
    body{
        background: #7F7FD5;
        background: -webkit-linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #91EAE4, #86A8E7, #7F7FD5); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    #close { position:absolute; left:10px; top:10px; right:10px; font-size: 30px; cursor: pointer; }

    .img_productos{
        height: 100px;
        width: 100px;  
    }

    .hidden{
      visibility:hidden;
    }
    .col1{
            height:600px; overflow-y:scroll;
        }
   


</style>
  </head>

  <body>



<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>








<br><br><br>
<div class="container mt-3 ">




    <!-- primer row -->
    <div class="row ">
    <div class="col-md-4">


          <!-- 4.  alerta    editado  success -->
          <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>CAMBIOS REALIZADOS EXITOSAMENTE.</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 4. alerta    registrado  success -->



                
                  <!--  ALERTA PRECIO -->
                  <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'precio') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR DE FORMATO. </strong> El precio solamente puede tener numeros enteros, sin espacios,letras o simbolos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                 <!--  ALERTA PRECIO -->



    
                  <!--  ALERTA STOCK -->
                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'stock') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR DE FORMATO. </strong> El Stock no puede tener espacios, letras ni simbolos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!--  ALERTA STOCK -->










        <div class="card">
            <div class="card-header">
            <a href="index.php"> <i  id="close"   class="fa-solid fa-circle-left" > </i> </a>
                <h3 id="_titulo">Editar datos</h3>
            </div>
<!-- form -->   <form action="e_prod.php" enctype="multipart/form-data"   method="POST" class="p-4" >
                <div class="mb-3">
                    <label for="_1" class="form-label">Nombre del producto: </label>
                    <input type="text" class="form-control" name="nombre" autofocus required id="_1" value="<?php echo $sentencia2['NOMBRE'];  ?>">
                </div>

                <div class="mb-3">
                    <label for="88" class="form-label">Marca: </label>
                    <select name="marca" class="form-control"  required id="88">
                    <option > <?php echo  $sentencia2['MARCA']; ?> </option>

                        <?php
                        $sqlMarcas = "SELECT * FROM marcas order by ID";
                        $dataMarcas = mysqli_query($mysqli, $sqlMarcas);

                        while($data = mysqli_fetch_array($dataMarcas)){ ?>
                        <option value="<?php echo $data["NOMBRE"]; ?>"><?php echo utf8_encode($data['NOMBRE']); ?>

                        <?php } ?>
                    </select>


                </div>
                <div class="mb-3">
                    <label for="555" class="form-label">Categoria: </label>
                    <select name="categoria" class="form-control"  required id="555">
                    <option > <?php echo  $sentencia2['TIPO']; ?> </option>

                        <?php
                        $sqlCategoria = "SELECT * FROM categorias order by ID";
                        $dataCate = mysqli_query($mysqli, $sqlCategoria);

                        while($data = mysqli_fetch_array($dataCate)){ ?>
                        <option value="<?php echo $data["NOMBRE"]; ?>"><?php echo utf8_encode($data['NOMBRE']); ?>

                        <?php } ?>
                    </select>
                </div>


                <div class="mb-3">
                  <label class="form-label lab" for="_99">Stock:</label >
                  <input type="text" class="form-control" name="stock" autofocus required id="99" value="<?php echo $sentencia2['STOCK'];  ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label lab" for="111">Precio:</label >
                  <input type="text" class="form-control" name="precio" autofocus required id="111" value="<?php echo $sentencia2['PRECIO'];  ?>">
                </div>



                
                <div class="mb-3 form-group">
                  <label class="form-label lab" for="input">Imagen:</label >
                  <div>
                       
                        <input type="file" class=""  name="imagen" id="input"  >
                
                  </div>
                </div>
                <br>
                
        

                


                <div class="form-group row justify-content-center d-grid ">
                    <div class="col-sm-6 ">
                        <input type="hidden"  name="codigo" value="<?php echo $codigo;  ?>">  <!-- Enviando el ID por metodo post usando la variable codigo = get -->
                        <input type="submit" class="btn btn-primary" value="Guardar cambios">
                    </div>

                </div>

            </form>
        </div>
        <br><br>
    </div> 




    <!-- segundo col GALERIA DE IMAGENES -->

    
<div class="col-md-8  ">

  
                <!-- 3 alerta Formato imagen incorrecto  -->
                <?php
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'archivo') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Archivo rechazado</strong> Solo se permiten archivos JPG , GIF, WEBP, JPEG y PNG.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 3 alerta Formato imagen incorrecto  -->


                
                 <!--ALERTA IMAGEN ELIMINADA -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>LA IMAGEN DEL PRODUCTO SE HA ELIMINADO EXITOSAMENTE</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- ALERTA IMAGEN ELIMINADA-->

              







    <div class="card">
        <div class="card-header">
            <h3 id="_titulo">Galeria</h3>   
            <hr>  

            <div class="row col1 ">



            <?php foreach( $resultado as $row ){ ?>
                <div class="col-md-5 ms-5 mt-5">
               
                    <div class="card-columns">
                   
                        <div class="card" style="width: 20rem;">
                           
                            <img src="img/<?php  echo $row['FOTO'];      ?>" class="card-img-top" alt="...">
                            
                            <a onclick="return confirm('¿estas seguro quie quieres eliminar a esta imagen?')"
                             class="text-danger" href="d_galeria.php?id_foto=<?php echo $row['ID_G'];?>&codigo=<?php echo $codigo;?>">   <i class="bi bi-trash"></i></a>  
                        </div>
                          
                    </div>
                   
                </div>
            <?php } ?>
               
                






            </div> 
            





        </div>
    </div>     <!-- row -->
</div>
</body>
</html>











