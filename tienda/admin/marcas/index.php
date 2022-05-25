<?php 
include '../c_seguridad.php';     //Seguridad y Base de datos.
$datos_marcas = $mysqli->query("SELECT * FROM marcas"); //obtiene datos de todos las marcas.




$datos2 = $mysqli->query("SELECT *,
marcas.ID as ma_id,
marcas.NOMBRE as ma_no,
marcas.ID_CATEGORIA as ma_ca
FROM marcas INNER JOIN categorias as c
ON marcas.ID_CATEGORIA = c.ID"); //obtiene datos de todos las marcas.










?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../styles/1.css?<?php echo time(); ?>" > <!-- CSS -->
    <title>Marcas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css"> <!-- BOOSTRAP -->  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  <!-- Ajax cdn jquery 3.6 -->
      <!-- Iconos --> <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <style>
        .col1{
            height:580px; overflow-y:scroll;
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








<!-- Inicio Gestor de marcas--  admin -->   
<div class="container-fluid mt-5">
       <div class="row justify-content-center">
           <div  class="col-md-4 col-sm-12">  <!-- Primer col, las siguientes ALERTAS tienen que estar entre medio de aca para que aparezcan dentro del primer col   -->










               


                
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





                <!-- siguiendo con la estructura de la tabla (primer col) -->
               <div  class="card "><br>
                   

            
              

                   <div class="card-header">  
                        <h4 id="t100"> Lista de Marcas </h4>
                        <div class="divbtn ">
                            <div class="divdentro">
                                <input type="text" class="form-control m-3 lupa" id="live_search" autocomplete="off" placeholder="Buscar...">  
                            </div>
                        </div>                                                                                      
                   </div>
                  
                      

                   <div  id="searchResult" class="p-4 col1 ">                                      
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                                        
                                    <th scope="col">NOMBRE</th>

                                    <th scope="col">CATEGORIA</th>
                
                                
                                    
 
                                    <th scope="col" >EDITAR</th>
                                    <th   scope="col" >ELIMINAR</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_array($datos2) ) {

                                    
                                ?>
                                <tr >

                                    <td scope="row"><?php echo $fila['ma_id']; ?></td>
                                    <td ><?php echo $fila['ma_no']; ?></td>
                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                                  

                                    <td><a class="text-primary" href="E_marca.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a este usuario?')" class="text-danger" href="d_marc.php?codigo=<?php echo $fila['ID']; ?>">   <i class="bi bi-trash"></i></a>  </td> 
                                    
                                    <!-- le envia por la url el id del usuario al c_eliminar -->
                                    
                                </tr>
                                <?php
                                }
                                ?>
                               
                            </tbody>
                       </table>
                   </div>
               </div><br>
            
           </div> <!-- TERMINO PRIMER COL  --> 

                     
           <div class="col-md-4">
                   
                   <div class="card">
                       
                       <div class="card-header">
                           <h4 id="t100"> Agregar Marca</h4>
                       </div>
                       <form action="c_marc.php"  method="POST" class="p-4" >
                           <div class="mb-3">
                               <label for="_1" class="form-label">Nombre de la Marca: </label>
                               <input type="text" class="form-control" name="nombre" autofocus required id="_1">
                           </div>     
                           
                           




                           <div class="mb-3">
                                <label class="form-label lab" for="_6">Categoria</label > 
                                            <select name="categoria" class="form-control"  required  id="_6" >          
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
                           

                           <div class="d-grid mt-5">
                               <input type="hidden" name="oculto" value="1" >
                               <input type="submit" class="btn btn-primary" value="Registrar">
                           </div>
   
                       </form>
   
                   </div>
               </div>
      








         </div>
      </div>  

</body>
<br>
</html>
