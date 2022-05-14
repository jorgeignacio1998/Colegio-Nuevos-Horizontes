<?php 
include './c_seguridad.php';     // SESSION y Base de datos.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../styles/1.css?<?php echo time(); ?>" > <!-- CSS -->
    <title>Agregar Producto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->  
</head>

<body>
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
        
            <div class="col-sm-12 col-md-8 col-lg-4">    
                        <div class="card">
                            
                            <div class="card-header">
                                <h4 id="t100"> Agregar producto</h4>
                            </div>
                            <form action="c_prod.php" enctype="multipart/form-data" method="POST" class="p-4" >
                                <div class="mb-3">
                                    <label for="_1" class="form-label">Nombre del producto: </label>
                                    <input type="text" class="form-control" name="nombre" autofocus required id="_1">
                                </div>           
                                




                                <div class="row">
                                    <div class="mb-3 col-6">
                                        <!-- SELECTBOX  DATOS DE BD  -->
                                        <label for="444" class="form-label">Categoria: </label>
                                        <select name="categoria" class="form-control"  required  id="444" >
                                        <option disabled selected value >  </option>
                                                    <?php
                                                    $sqlTipo = "SELECT * FROM categorias order by ID";
                                                    $dataMarcas = mysqli_query($mysqli, $sqlTipo);

                                                    while($data = mysqli_fetch_array($dataMarcas)){ ?>
                                                    <option value="<?php echo $data["NOMBRE"]; ?>"><?php echo utf8_encode($data['NOMBRE']); ?>

                                                    <?php } ?>
                                        </select>
                                        <!-- SELECT BOX  DATOS DE BD  -->
                                    </div> 
                                     
                                    <div class="mb-3 col-6">
                                        <!-- SELECTBOX  DATOS DE BD  -->
                                        <label for="555" class="form-label">Marca: </label>
                                        <select name="marca" class="form-control"  required id="555">
                                        <option disabled selected value>  </option>
                                                    <?php
                                                    $sqlMarcas = "SELECT * FROM marcas order by ID";
                                                    $dataMarcas = mysqli_query($mysqli, $sqlMarcas);

                                                    while($data = mysqli_fetch_array($dataMarcas)){ ?>
                                                    <option value="<?php echo $data["NOMBRE"]; ?>"><?php echo utf8_encode($data['NOMBRE']); ?>

                                                    <?php } ?>
                                        </select>
                                        <!-- SELECT BOX  DATOS DE BD  -->
                                    </div>                    
                                </div>
                                



                                <div class="row">

                                    <div class=" col-6 mb-3">
                                        <label for="46" class="form-label">Precio: </label>
                                        <input type="text" class="form-control" name="precio" autofocus required id="46">
                                    </div>
                                     <div class=" col-6 mb-3">
                                         <label for="66" class="form-label">Stock disponible: </label>
                                         <input type="text" class="form-control" name="stock" autofocus required id="66">
                                     </div>          
                                           
                                </div>

                                
                                
                                



                                <div class=" col-12">
                                    <label for="46" class="form-label" >Descripción:  </label>
                                    <textarea class="form-control" name="descripcion"  id="desProd"></textarea   > 
                                </div>

                                <div class="mb-3 col-12">
                                    <label for="43" class="form-label" >Imagen: </label> <br>
                                    <input type="file" name="imagen" id="43" >
                                
                                </div>
                                





                                <div class="d-grid mt-5">
                                    <input type="hidden" name="oculto" value="1" >
                                    <input type="submit" class="btn btn-primary" value="Registrar">
                                </div>
        
                            </form>
        
                        </div>
<br>
            </div>

        </div>
    </div>
</body>


</html>











