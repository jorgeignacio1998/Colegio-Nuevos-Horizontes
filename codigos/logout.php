<?php
 session_start();
 session_destroy();
 header("location: ../vistas/Login.php");

?>