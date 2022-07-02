<?php
//  envio de datos del formulario al mi correo electronico
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception; la comente porque daba error con otro proyecto, no puede ser llamda dos veces.
require 'D:/XAMPP/htdocs/NewHorizons/PHPMailer/src/Exception.php';
require 'D:/XAMPP/htdocs/NewHorizons/PHPMailer/src/PHPMailer.php';
require 'D:/XAMPP/htdocs/NewHorizons/PHPMailer/src/SMTP.php';
$error = array();



if(isset($_POST['nombre']) && 
isset($_POST['email']) &&
isset($_POST['mensaje'])  &&
isset($_POST['g-recaptcha-response'])
){



    $nombre = $_POST['nombre'];
    $regexNombre = "/^[a-zA-Z\s]+$/";
    
    //NOMBRE VALIDACIONES                     
        if(!preg_match($regexNombre, $nombre)){
            array_push($error, "El formato es invalido");
            echo "<script>location.href='contacto.php?mensaje=formato1';</script>";  //Enviandole ALERTA metodo GET(error1), REDIRECCION 
            
        }  
    //NOMBRE VALIDACIONES   


    $email = $_POST['email'];
    $regexEmail = "/^[a-zA-Z\d\._]+@[a-zA-Z\d\._]+\.[a-zA-Z\d\.]{2,3}+$/";

    //CORREO VALIDACIONES                     
        if(!preg_match($regexEmail, $email)){
            array_push($error, "El formato es invalido");
            echo "<script>location.href='contacto.php?mensaje=formato2';</script>";  //Enviandole ALERTA metodo GET(error1), REDIRECCION 
            
        }  
    //CORREO VALIDACIONES

    $mensaje = $_POST['mensaje'];
    $regexMensaje = "/^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9?¿!\.\s\-\,]+$/";

    //CORREO VALIDACIONES                     
    if(!preg_match($regexMensaje, $mensaje)){
        array_push($error, "El formato es invalido");
        echo "<script>location.href='contacto.php?mensaje=formato3';</script>";  //Enviandole ALERTA metodo GET(error1), REDIRECCION 
        
    }  
    //CORREO VALIDACIONES








    if(count($error)==0){
        $captcha = $_POST['g-recaptcha-response'];

        $secret = '6Lc9qtkfAAAAALEPwbZNQR_bT0if8lKhdX9bHOl2';
        if(!$captcha){
            echo'error';
        }
        $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
        var_dump($response);  //recibimos datos success
    
        $arr = json_decode($response, TRUE);
        if($arr['success']){
    
            header('Location: ../views/contacto.php?mensaje=exito');
            
            //  INICIO ENVIO DEL CORREO
            $mail = new PHPMailer(true);
    
            try {
                //Server settings
                $mail->SMTPDebug = 2;                                        //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'mail.dois.cl';                         //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'diego.franco@dois.cl';                     //SMTP username
                $mail->Password   = 'uzZWeE]lH[VT';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
                //Recipients
                $mail->setFrom('diego.franco@dois.cl' ,'Contacto');
                $mail->addAddress('jorge.ignacio131198@gmail.com', 'Contacto');     
                //$mail->addAddress('ellen@example.com');              
                //$mail->addReplyTo('info@example.com', 'Information');
                //$mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');
    
    
    
            
                
                //Content
                $mail->isHTML(true);                                  
                $mail->Subject = 'NOMBRE: '  .$_POST['nombre'] ;
                $mail->Body    = 'DE:' .$_POST['nombre'] . ' ' .  'CORREO ELECTRONICO: '.$_POST['email'] .' MENSAJE: ' .$_POST['mensaje'] ;
                $mail->AltBody  =  $_POST['nombre'] ;
                $mail->send();
                echo 'Message has been sent';
            } catch (Exception $e) {
                echo `<script language="javascript">alert("juas"); </script>`;
            } 
            //  FIN ENVIO DEL CORREO
    
            
        }else{
            header('Location: ../views/contacto.php?mensaje=error');
        }
            
    

    }else{
        echo '<script language="javascript">alert("ERROR");</script>';
    }

 
}

        



 
    








?>