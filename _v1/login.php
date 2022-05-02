<?php
include "db_usuarios.php";
session_start();
error_reporting(0);

if(isset($_SESSION["username"])){
    header('Location: panel.php');
}

if(isset($_POST["submit"])){
    $email=$_POST["email"];
    $password=md5($_POST["password"]);

    $sql="SELECT * FROM usuarios WHERE EMAIL='$email' AND PASSWORD='$password'";
    $result = mysqli_query($mysqli, $sql);

    if($result->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: panel.php");
    }else{
        echo "<script>alert('La contraseña o el email son incorrectos')</script>";
    }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;1,100;1,300&display=swap" rel="stylesheet"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>


</body>
</html>