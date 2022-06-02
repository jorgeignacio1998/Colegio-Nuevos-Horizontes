<!-- curso clonado  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'curso_clonado') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> El curso ya existe.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- curso clonado   -->




<!-- sala en uso  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'sala_clonada') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> La sala ya está en uso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- 3 sala en uso  -->



<!-- formato nombre  -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_nombre') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> El formato del nombre es incorrecto.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato nombre  -->