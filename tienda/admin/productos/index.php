<?php 
include '../c_seguridad.php';     //Seguridad y Base de datos.

$datos_productos = $mysqli->query("SELECT * FROM productos"); //obtiene datos de todos los usuarios MENOS los tipos de usuario Nivel 1 (servirá para pintar los datos en la tabla (250 fila))

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../styles/1.css?<?php echo time(); ?>" > <!-- CSS -->
    <title>Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
      <!-- Iconos --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
        .col1{
            height:580px; overflow-y:scroll;
        }
        .img_productos{
            height: 50px;
            width: 50px;
            
        }

    </style>

    </head>
<body>





          <!-- Inicio del Navbar admin -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>    
<nav class="navbar  navbar-expand-md border-primary navbar-dark bg-primary">
        <div class="container-fluid">
              <a href="../index.php" class="navbar-brand">Admin</a>
              <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNav" >
                 <span class="navbar-toggler-icon"></span>
              </button>
              
              <div id="MenuNav" class="collapse navbar-collapse d-flex flex-row-reverse">
                 <ul class="navbar-nav" ms-3>
                    <!--  <li class="nav-item"> <a class="nav-link" href="perfil.php">Perfíl</a></li> -->
                    
                    <li class="nav-item dropdown">
                       <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                          Opciones de soporte
                       </a>
                       <ul class="dropdown-menu">
                       <li> <a class="dropdown-item" href="../productos/index.php">Productos</a></li>       
                       <li> <a class="dropdown-item" href="../categorias/index.php">Categorias</a></li>  
                       <li> <a class="dropdown-item" href="../marcas/index.php">Marcas</a></li>  
                       <li> <a class="dropdown-item" href="../c_logout.php">Cerrar sesión</a></li>
                       </ul>
                    </li>
                 </ul>
              </div>
        </div>
     </nav>
     
  
  <!-- Termino del Navbar  admin -->

  <!-- Inicio BUSQUEDA con Jquery -->   
<script type="text/javascript">
    $(document).ready(function(){
        $("#live_search").keyup(function(){

            var input = $(this).val();
            //alert(input);   

                $.ajax({

                    url:"liveSearch.php",
                    method: "POST",
                    data: {input:input},

                    success:function(data){
                        $("#searchResult").html(data);
                        $("#searchResult").css("display","block");
                    }

                });
         
        });

    });
</script>
<!-- Termino BUSQUEDA con Jquery -->   




<!-- Inicio Gestor de prooductos--  admin -->   
<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-8 col-sm-12">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->










                <!--  1. Primera ALERTA, campos no vacios para el registro -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Los campos no pueden ir vacios.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!--  1. termino  CAMPOS VACIOS -->


                
                <!-- 2.  alerta  registrado  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>PRODUCTO REGISTRADO CON EXITO</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                 <!-- 2. alerta registrado  success -->


                 <!-- 3 alerta ERROR, seguridad.  -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 3 alerta ERROR  -->




                
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

               



                 <!--ALERTA ELIMINADO -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>EL PRODUCTO SE HA ELIMINADO EXITOSAMENTE</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- ALERTA ELIMINADO-->





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












                <!-- siguiendo con la estructura de la tabla (primer col) -->
               <div  class="card "><br>
                   

                   <div class="card-header">  
                   <h4 id="t100"> Lista de productos </h4>
              

                        <div class="divbtn ">
                            <div class="divdentro">
                                <input type="text" class="form-control m-3 lupa" id="live_search" autocomplete="off" placeholder="Buscar...">  
                            </div>

                


                           
                            <a class="btn btn-primary m-3"    id="btn-agregar"  data-bs-toggle="offcanvas" href="../productos/C_producto.php" role="button" aria-controls="offcanvasExample">Agregar producto</a>
                        </div>




                
                    
                       
                
                                                                                                                                <!-- aca-->
                   </div>
                  
                      

                   <div  id="searchResult" class="p-4 col1 ">                                      
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                                     
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">MARCA</th>
                                    <th scope="col">TIPO</th>
                                    <th scope="col">STOCK</th>
                                    <th scope="col">PRECIO</th>
                                    <th scope="col">DESCUENTO</th>
                                    <th scope="col">DESCRIPCION</th>
                                    
 
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($datos_productos) ) {

                                    
                                ?>
                                <tr >

                                    <td scope="row"><?php echo $fila['ID']; ?></td>



                              





                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                                    <td ><?php echo $fila['MARCA']; ?></td>            
                                    <td ><?php echo $fila['TIPO']; ?></td>
                                    <td ><?php echo $fila['STOCK']; ?></td>
                                    <td ><?php echo $fila['PRECIO']; ?></td>
                                    <td ><?php echo $fila['DESCUENTO']; ?></td>
                                    <td ><?php echo $fila['DESCRIPCION']; ?></td>

                                    <td><a class="text-primary" href="E_producto.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a este usuario?')" class="text-danger" href="d_prod.php?codigo=<?php echo $fila['ID']; ?>">   <i class="bi bi-trash"></i></a>  </td> 
                                    
                                    <!-- le envia por la url el id del usuario al c_eliminar -->
                                    
                                </tr>
                                <?php
                                }
                                ?>
                               
                            </tbody>
                       </table>
                   </div>
               </div>
            
           </div> <!-- TERMINO PRIMER COL  --> 


         </div>
      </div>  

</body>
</html>