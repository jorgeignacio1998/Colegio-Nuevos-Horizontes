<?php 
include '../c_seguridad.php';  //Seguridad y Base de datos.
$datos2 = $mysqli->query("SELECT *,
marcas.ID as ma_id,
marcas.NOMBRE as ma_no,
marcas.ID_CATEGORIA as ma_ca
FROM marcas INNER JOIN categorias as c
ON marcas.ID_CATEGORIA = c.ID"); //obtiene datos de todos las marcas.






    $input = $_POST['input'];

    if(empty($input)){
        $query =  "SELECT *,
        marcas.ID as ma_id,
        marcas.NOMBRE as ma_no,
        marcas.ID_CATEGORIA as ma_ca
        FROM marcas INNER JOIN categorias as c
        ON marcas.ID_CATEGORIA = c.ID  ";
        } else{
            
        $query = "SELECT *,
        marcas.ID as ma_id,
        marcas.NOMBRE as ma_no,
        marcas.ID_CATEGORIA as ma_ca
        FROM marcas INNER JOIN categorias as c
        ON marcas.ID_CATEGORIA = c.ID WHERE marcas.NOMBRE LIKE '{$input}%'  ";   //OR ID LIKE '{$input}%' OR EMAIL LIKE '{$input}%' OR NIVEL LIKE '{$input}%'
        }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>




        <div  id="col1" class="p-4 ">
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>                         
                                    <th scope="col">NOMBRE</th>
                                    <th scope="col">CATEGORIA</th>
                              
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
                                    <td ><?php echo $fila['ma_no']; ?></td>
                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                             
                                    <td><a class="text-primary" href="E_marca.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('??estas seguro de eliminar a este usuario?')" class="text-danger" href="d_marca.php?codigo=<?php echo $fila['ID']; ?>">   <i class="bi bi-trash"></i></a>  </td> 
                                   
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