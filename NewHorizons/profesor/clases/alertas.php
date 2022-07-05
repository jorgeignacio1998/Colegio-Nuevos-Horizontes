   <!-- ALERTAS  -->
          
                 <!-- 1 alerta clonado  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'clonado') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR</strong> La asignacion ya existe.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 1 alerta clonado  -->


                 <!-- 2.  alerta    eliminado  success -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>SE ELIMINARON LOS DATOS CORRECTAMENTE </strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 2. alerta    eliminado  success, -->


                   <!-- 3 alerta ERROR, seguridad.  -->
                   <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR</strong> Vuelve a intentar.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                <!-- 3 alerta ERROR  -->


                 <!-- 4.  alerta  registrado  success -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>REGISTRO REALIZADO CORRECTAMENTE</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
                 <!-- 4. alerta registrado  success -->

                
                <!-- 5.  alerta    EDITADO  success -->
                <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                ?>

                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>CAMBIOS REALIZADO CON EXITO</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?> 
                <!-- 5. alerta  EDITADO  success -->

        <!-- ALERTAS  -->
