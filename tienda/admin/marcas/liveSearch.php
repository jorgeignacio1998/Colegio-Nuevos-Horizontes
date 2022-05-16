<?php 
include '../c_seguridad.php';  //Seguridad y Base de datos.
$datos_marcas = $mysqli->query("SELECT * FROM marcas "); //obtiene datos de todos los productos





    $input = $_POST['input'];

    if(empty($input)){
        $query =  "SELECT * FROM marcas  ";
        } else{
            
        $query = "SELECT * FROM marcas WHERE NOMBRE LIKE '{$input}%'  ";   //OR ID LIKE '{$input}%' OR EMAIL LIKE '{$input}%' OR NIVEL LIKE '{$input}%'
        }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>




        <div  id="col1" class="p-4 ">
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>                         
                                    <th scope="col">NOMBRE</th>
                              
                                    <th scope="col">EDITAR</th>
                                    <th   scope="col">ELIMINAR</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_assoc($result) ) {
    
                                ?>
                                <tr >

                                    <td scope="row"><?php echo $fila['ID']; ?></td>
                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                             
                                    <td><a class="text-primary" href="E_marca.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a este usuario?')" class="text-danger" href="d_marca.php?codigo=<?php echo $fila['ID']; ?>">   <i class="bi bi-trash"></i></a>  </td> 
                                   
                                    <!-- le envia por la url el id del usuario al c_eliminar -->
                                    
                                </tr>
                                <?php
                                }
                                ?>
                               
                            </tbody>
                       </table>
                   </div>
        <?php 

    }else{
        echo'<h6 class="text-danger text-center mt-3">Datos no encontrados </h6>';
    }

?>