<?php 

include '../seguridad_director.php'; 
$datos_usuario = $mysqli->query("SELECT * FROM usuarios  ORDER BY NIVEL ");  //obtiene datos de todos los usuarios MENOS los tipos de usuario Nivel 1 (servirá para pintar los datos en la tabla (250 fila))

//EXCEPT SELECT * FROM usuarios WHERE NIVEL = 1 



    $input = $_POST['input'];

    if(empty($input)){
        $query =  "SELECT * FROM usuarios  ORDER BY NIVEL";
        } else{
            
        $query = "SELECT * FROM usuarios WHERE NOMBRE LIKE '{$input}%'  OR EMAIL LIKE '{$input}%' OR RUT LIKE '{$input}%'  ORDER BY NIVEL    ";   //OR ID LIKE '{$input}%' OR EMAIL LIKE '{$input}%' OR NIVEL LIKE '{$input}%'
        }



    $result = mysqli_query($mysqli, $query);
    if(mysqli_num_rows($result) > 0 ){?>




  
                       <table class="table align-middle">
                            <thead>
                                <tr>
                                    
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre completo</th>   
                                    <th scope="col">Rut</th>   
                                    <th scope="col">Correo electrónico</th>
                                    <th scope="col">Nivel</th>

                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody >
                                <?php     //IMPRIMIR DATOS EN LOS td
   
                                while($fila =mysqli_fetch_assoc($result) ) {
    
                                ?>
                                <tr >

                                    <td scope="row"><?php echo $fila['ID']; ?></td>
                                    <td ><?php echo $fila['NOMBRE']; ?></td>
                                    <td ><?php echo $fila['RUT']; ?></td>
                                    <td ><?php echo $fila['EMAIL']; ?></td>
                                    <td ><?php echo $fila['NIVEL']; ?></td>

                                    <td><a class="text-primary" href="editar.php?codigo=<?php echo $fila['ID']; ?>">        <i class="bi bi-pencil-square"></i></a>  </td>
                                    <td><a onclick="return confirm('¿estas seguro de eliminar a este usuario?')" class="text-danger" href="c_eliminar.php?codigo=<?php echo $fila['ID']; ?>">   <i class="bi bi-trash"></i></a>  </td>  
                                    <!-- le envia por la url el id del usuario al c_eliminar -->
                                    
                                </tr>
                                <?php
                                }
                                ?>
                               
                            </tbody>
                       </table>
                 
        <?php 

    }else{
        echo'<h6 class="text-danger text-center mt-3">Datos no encontrados </h6>';
    }

?>