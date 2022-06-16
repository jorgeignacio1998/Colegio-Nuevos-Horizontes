<!-- MATRICULA YA EXISTE  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'matricula_existe') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> La matricula ya existe. 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- MATRICULA YA EXISTE  -->



<!-- ERROR -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> El Profesor no está disponible, ya tiene un curso asignado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- ERROR -->



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




