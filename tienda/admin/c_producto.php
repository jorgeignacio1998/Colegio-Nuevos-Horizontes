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
        
            <div class="col-md-4">    <!-- INICIO SEGUNDO COL  -->
                        <div class="card">
                            
                            <div class="card-header">
                                Ingresar datos:
                            </div>
                            <form action="../admin/c_registrar.php" method="POST" class="p-4" >
                                <div class="mb-3">
                                    <label for="_1" class="form-label">Nombre del producto: </label>
                                    <input type="text" class="form-control" name="txtNombre" autofocus required id="_1">
                                </div>           
                                
                                <div class="mb-3">
                                    <!-- SELECTBOX  DATOS DE BD  -->
                                    <label for="555" class="form-label">Marca: </label>
                                    <select name="nombre" class="form-control"  id="555">
                                                <?php
                                                $sqlMarcas = "SELECT * FROM marca order by ID";
                                                $dataMarcas = mysqli_query($mysqli, $sqlMarcas);

                                                while($data = mysqli_fetch_array($dataMarcas)){ ?>
                                                <option value="<?php echo $data["ID"]; ?>"><?php echo utf8_encode($data['NOMBRE']); ?>

                                                <?php } ?>
                                    </select>
                                    <!-- SELECT BOX  DATOS DE BD  -->
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











