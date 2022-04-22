<?php

session_start();

if (!isset($_SESSION['username'])){
    header("Location: login.php");
}


?>
<h1>BIENVENIDO</h1> <br><br><br>
<a href="logout.php">desconectar</a>