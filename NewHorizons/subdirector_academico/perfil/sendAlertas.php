  <!-- CAMBIOS REALIZADOS CON EXITO -->

  <?php
                     if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'guardado') {
                     ?>

                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>CAMBIOS REALIZADOS CON EXITO!</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     
                     <?php
                     }
                     ?>
                                    
                     <!-- CAMBIOS REALIZADOS CON EXITO-->



                       
                     <!-- PASS CHANGED -->

                     <?php
                     if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'pass') {
                     ?>

                     <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>SE HA CAMBIADO LA CONTRASEÑA</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                     
                     <?php
                     }
                     ?>
                                    
                     <!-- PASS CHANGED -->





                     <!-- MENSAJE  FORMATO MALO DEL TELEFONO-->
                   
                     <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error4') {
                                    ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>ERROR, FORMATO INVALIDO.</strong> <br> El numero telefonico NO cumple con el formato requerido.
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?> 

                     <!-- MENSAJE  FORMATO MALO DEL TELEFONO  -->

                     <!-- MENSAJE  FORMATO MALO DEL NOMBRE -->
                   
                     <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_nombre') {
                                    ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>ERROR, FORMATO INVALIDO.</strong> <br> El nombre NO cumple con el formato requerido.
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?> 

                     <!-- MENSAJE  FORMATO MALO DEL NOMBRE  -->                     

                     <!-- MENSAJE  FORMATO MALO DEL RUT -->
                   
                     <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_rut') {
                                    ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>ERROR, FORMATO INVALIDO.</strong> <br> El rut NO cumple con el formato requerido.
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?> 

                     <!-- MENSAJE  FORMATO MALO DEL RUT  -->   

                     <!-- MENSAJE  FORMATO MALO DEL EMAIL -->
                   
                     <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_email') {
                                    ?>

                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                       <strong>ERROR, FORMATO INVALIDO.</strong> <br> El email NO cumple con el formato requerido.
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                                    ?> 

                     <!-- MENSAJE  FORMATO MALO DEL EMAIL  -->   






                     <!-- MENSAJE  sin cambios -->
                   
                         <?php
                                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error6') {
                                    ?>

                                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                       <strong>NO SE HAN REALIZADO CAMBIOS </strong> <br>
                                       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <?php
                                    }
                        ?> 

                      <!-- MENSAJE  sin cambios -->
                  
                    

                      