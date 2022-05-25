<?php
include '../c_seguridad.php';     //Seguridad y Base de datos.






 








?>





<!doctype html>
<html lang="en">
  <head>
    <title>Gestionar galeria principal</title>
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
                    <h3 id="_titulo">Seleccionar producto</h3> 


                    <form action="buscar.php">

                        <div class="mb-3">
                                <label class="form-label lab" for="_6">Filtrar por marca</label > 
                                            <select name="id_marca" class="form-control"    id="_6" >          
                                            <!-- este option es el dato visible seleccionado  -->
                                            <option value="" require>
                                                        <?php
                                                        $sqlMarca = "SELECT * FROM marcas order by ID";
                                                        $dataMarca = mysqli_query($mysqli, $sqlMarca);
                                                        //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                        //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                        while($data = mysqli_fetch_array($dataMarca)){ ?>
                                                        <!-- este option son las opciones disponibles para elegir -->
                                                        <option value="<?php echo $data["ID"];   //variable?     ?>"><?php echo utf8_encode($data['NOMBRE']); ?>
                                                        
                                                        <?php } ?>
                                            </select>  
                        </div>         




                        <div class="mb-3">
                                <label class="form-label lab" for="_6">Filtrar por categoria</label > 
                                            <select name="id_categoria" class="form-control"    id="_6" >          
                                            <!-- este option es el dato visible seleccionado  -->
                                            <option value="" require>
                                                        <?php
                                                        $sqlCate = "SELECT * FROM categorias order by ID";
                                                        $dataCate = mysqli_query($mysqli, $sqlCate);
                                                        //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                        //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                        while($data2 = mysqli_fetch_array($dataCate)){ ?>
                                                        <!-- este option son las opciones disponibles para elegir -->
                                                        <option value="<?php echo $data2["ID"];   //variable?     ?>"><?php echo utf8_encode($data2['NOMBRE']); ?>
                                                        
                                                        <?php } ?>
                                            </select>  
                        </div>    



                    


                        <div class="mb-3">
                                <label class="form-label lab" for="_6">Nombre del producto</label > 
                                            <select name="id_producto" class="form-control"    id="_6" >          
                                            <!-- este option es el dato visible seleccionado  -->
                                            <option value="" require>
                                                        <?php
                                                        $sqlNombre = "SELECT * FROM productos order by ID";
                                                        $dataNombre = mysqli_query($mysqli, $sqlNombre);
                                                        //el siguiente codigo: El PRIMER ECHO ID es lo dato que se enviara, en este caso el ID, 
                                                        //el utf8_encode es el dato de referencia a mostrar, es decir el nombre JUNTO EL NUMERO DEL ID
                                                        while($data3 = mysqli_fetch_array($dataNombre)){ ?>
                                                        <!-- este option son las opciones disponibles para elegir -->
                                                        <option value="<?php echo $data3["ID"];   //variable?     ?>"><?php echo utf8_encode($data3['NOMBRE']); ?>
                                                        
                                                        <?php } ?>
                                            </select>  
                        </div>   









                        
                        <div class="d-grid mt-5">
                                    <input type="hidden" name="oculto" value="1" >
                                    <input type="submit" class="btn btn-primary" value="Buscar">
                        </div>


                    </form>










                    
                    

                </div>
            </div>
        </div>

















        <div class="col-md-7">

            <!-- alertas -->




            <div class="card">
                <div class="card-header">
                    <h3 id="_titulo">Seleccionar Imagen</h3>   
                    <hr>  

                    <div class="row col1 ">


                        <?php  


                      
                            if(isset($_GET['id_producto'])) {
                                $id_producto = $_GET['id_producto'];


                                $query5 = ("SELECT * FROM galeria WHERE ID_PRODUCTO = $id_producto ");
                                $resultado = mysqli_query($mysqli, $query5);
                                //$sen2 =mysqli_fetch_array($sentencia);




                               

                                foreach( $resultado as $row ){
                            }
                                                            

                         

                        ?>                                    







                      

                        <div class="col-md-5 ms-5 mt-5">
                    
                            <div class="card-columns">
                        
                                <div class="card" style="width: 20rem;">
                                
                                    <img src="../productos/img/<?php  echo $row['FOTO'];      ?>" class="card-img-top" alt="...">
                                    
                                    <a onclick="return confirm('¿estas seguro quie quieres eliminar a esta imagen?')"
                                    class="text-danger" href="d_galeria.php?id_foto=<?php echo $row['ID_G'];?>&codigo=<?php echo $codigo;?>">   <i class="bi bi-trash"></i></a>  
                                </div>
                                
                            </div>
                        </div>

                        <?php } ?>
               
                
                    </div> 
                </div>
            </div>     <!-- card -->







        </div>
    </div>
</div>

</body>
</html>