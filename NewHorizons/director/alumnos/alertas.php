
                <!-- alerta    eliminado  success -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
                    ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Se han ELIMINADO los datos exitosamente </strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?> 
                <!-- alerta    eliminado  success -->




                
                <!-- alerta  registrado  success -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>registro realizado exitosamente</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- alerta registrado  success -->

                
                <!-- alerta  registrado  success -->
                    <?php
                    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
                    ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Cambios Realizados Exitosamente</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php
                    }
                    ?>
                <!-- alerta registrado  success -->



                
            <!-- alerta ERROR  -->
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
            <!-- alerta ERROR  -->
                





            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'nombre1') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR de formato</strong> El primer nombre no puede tener simbolos o numeros .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->
            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'nombre2') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR de formato</strong> El segundo nombre no puede tener simbolos o numeros .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->
            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'apellido1') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR de formato</strong> El primero apellido no puede tener simbolos o numeros .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->
            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'apellido2') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR de formato</strong> El segundo apellido no puede tener simbolos o numeros .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->
            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'nombre_apoderado') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR de formato</strong> El nombre del apoderado no puede tener simbolos o numeros .
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->








            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'rut1') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR de formato</strong> El RUT del alumno no es valido, no se permiten espacios o simbolos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->
            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'rut2') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR de formato</strong> El RUT del apoderado no es valido, no se permiten espacios o simbolos.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->
            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'rut3') {
                ?>

                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>ERROR </strong> el rut del alumno es identico al del apoderado, ingrese rut validos
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->
            <!-- alerta ERROR  -->
                 <?php
                 if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'rut4') {
                ?>

                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>ERROR </strong> el alumno ya ha sido matriculado anteriormente para este semestre.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                }
                ?>
            <!-- alerta ERROR  -->