<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.






?>
<!doctype html>
<html lang="en">
  <head>
    <title>Gestionar Slider/Carrucel</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" type="text/css" href="../../styles/1.css?<?php echo time(); ?>" > <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->
</head>





<style>

.col1{
        height:600px; overflow-y:scroll;
    }
   

.separados {
    justify-content: space-between;
}

</style>
<body>



<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<br><br><br>




<div class="container mt-3">
    <div class="row">

        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h3 id="_titulo">Subir imagen</h3> 


                    <form action="c_subir.php"  enctype="multipart/form-data" method="POST" >

                        <div class="mb-3 col-12">
                            <label for="imagenId" class="form-label" >Seleccionar imagen: </label> <br>
                            <input type="file" name="imagen" id="imagenId" >      
                        </div>





                        <div class="d-grid mt-5">
                            <input type="submit" class="btn btn-primary" value="Subir ">
                        </div>


                    </form>










                    
                    

                </div>
            </div>
        </div>

















        <div class="col-md-7">

            <!-- alertas -->




            <div class="card">
                <div class="card-header">
                    <h3 id="_titulo"> Imagenes del slider</h3>   
                    <hr>  

                    <!-- AGREGADO CON EXITO-->

                        <?php
                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'success') {
                        ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>SE HA AGREGADO CORRECTAMENTE LA IMAGEN AL SLIDER</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                        <?php
                        }
                        ?>
                                        
                    <!-- AGREGADO CON EXITO-->


                    <!-- ELIMINADO  CON EXITO -->

                            <?php
                        if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                        ?>

                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>LA IMAGEN SE HA QUITADO CORRECTAMENTE DEL SLIDER</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                        <?php
                        }
                        ?>
                                    
                    <!-- ELIMINADO  CON EXITO-->

                    <div class="row col1 ">

                        <?php  

                        

                             
                                $query1 = ("SELECT * FROM slider_imagenes ");
                                $resultado = mysqli_query($mysqli, $query1);
                               
                      
                        ?>                                    
                        <?php  
                            
                             
                                foreach( $resultado as $row ){ 
   
                        ?>

                        <div class="col-md-5 ms-4 mt-5">
                    
                            <div class="card-columns">
                        
                                <div class="card" style="width: 19rem;">
                                    <img src="../../slider_2/img/<?php  echo $row['NOMBRE_IMAGEN'];      ?>" class="card-img-top" >           
                                   
                                        <a onclick="return confirm('¿estas seguro que quieres quitar esta imagen del slider? ')"
                                        class="text-danger"
                                        href="c_eliminar.php?id_imagen=<?php echo $row['ID'];?>">   
                                        <i class="bi bi-trash"></i> </a>
 
                                </div>
                               
                            </div>
                        </div>

                        <?php }   ?>
               
                      </div> 
                    </div>
            </div>     <!-- card -->
        </div>
    </div>
</div>





</body>
</html>

