<!-- curso no disponible  -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'curso_ocupado') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> El curso no está disponible, ya tiene un profesor jefe asignado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- curso no disponible  -->



<!-- curso no disponible  -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'profesor_ocupado') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> El Profesor no está disponible, ya tiene un curso asignado.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- curso no disponible  -->




