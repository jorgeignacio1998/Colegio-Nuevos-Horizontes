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


<!-- cupo formatoe error -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'cupos_formato') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR DE FORMATO</strong> Solo se permiten numeros en los cupos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- cupo formatoe error  -->


<!-- cupo formatoe error -->
    <?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'precio_formato') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR DE FORMATO</strong> Solo se permiten numeros en el precio.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- cupo formatoe error  -->


<!--  cupos no 0 -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'cupo_cero') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR </strong> No se pueden crear matriculas sin cupos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- cupos no 0  -->


<!--  excede cupos -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'excede_cupos') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR </strong> El numero de cupos es muy alto.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- excede cupos  -->


<!--  excede PRECIO -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'excede_precio') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR </strong> El precio de la matricula no puede superar los $200.000 pesos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- excede PRECIO  -->


<!--  BAJO PRECIO -->
<?php
    if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'precio_bajo') {
    ?>

    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>ERROR </strong> El precio de la matricula no puede ser menor a los $10.000 pesos.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php
    }
    ?>
<!-- BAJO PRECIO  -->




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




