<!-- curso no disponible  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado') {
    ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Datos registrados existosamente!</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- curso no disponible  -->



<!-- curso no disponible  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- curso no disponible  -->


<!-- La sala ingresada ya esta en uso  -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'sala') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> La sala ingresada ya esta en uso.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- La sala ingresada ya esta en uso -->


<!-- nota_existe -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'nota_existe') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR</strong> La calificacion ya existe.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- nota_existe  -->

<!-- formato_nota -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_nota') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR DE FORMATO</strong> Solo se permiten ingresar numeros en la nota.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- formato_nota  -->

<!-- fuera_rango -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'formato_nota') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR DE RANGO </strong> Solo se notas del 1 al 7.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- fuera_rango  -->

<!-- eliminado -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado') {
    ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Nota eliminada con exito</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- eliminado  -->
<!-- EDITADO -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado') {
    ?>

    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Cambios realizados exitosamente</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- EDITADO  -->




