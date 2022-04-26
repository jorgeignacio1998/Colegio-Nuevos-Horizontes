<?php
require 'D:/XAMPP/htdocs/PHPMailer/src/Exception.php';
require 'D:/XAMPP/htdocs/PHPMailer/src/PHPMailer.php';
require 'D:/XAMPP/htdocs/PHPMailer/src/SMTP.php';
require 'connect.php';

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;





$error = array();

if(isset($_POST['email'])){
    if(empty($_POST['email'])){
       array_push($error, "El correo electronico no puede estar vacío ");
       print_r('el correo electronico no puede estar vacio');
    }
}
$email = $_POST["email"];

if (count($error)==0){ 
    $existeEmail = $mysqli->query("SELECT * FROM datos_usuarios WHERE EMAIL LIKE '{$email}' ");
    if(empty($existeEmail->num_rows)){ 
       array_push($error, "el correo electronico ingresado no esta vinculado a ninguna cuenta");
       print_r('el correo electronico ingresado no esta vinculado a ninguna cuenta');
       echo'
         <script> 
               alert("el correo electronico ingresado no esta vinculado a ninguna cuenta");
               window.location = "../vistas/OlvidasteContraseña.php";
         </script>
   ';
    }
}


if (count($error)==0){ 
    //Funcion enviar contraseña al correo.
    print_r('el correo si está en la base de datos');
        $caracteres = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $longitud = 10;
        $newPass = substr(str_shuffle($caracteres),0,$longitud);
        //encriptar variable NewPass   
        $password = md5($newPass);  
        $mysqli->query("UPDATE datos_usuarios SET QPASSWORD = '{$password}' WHERE EMAIL LIKE '{$email}' "); 
        $email = $_POST["email"];
        $mail = new PHPMailer(true);
        
        
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                       //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.dois.cl';                         //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'diego.franco@dois.cl';                     //SMTP username
            $mail->Password   = '9azPN-TS,CCf';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('diego.franco@dois.cl' ,'Formulario');
            $mail->addAddress( $email , 'test');     
      
            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'Nueva Password' ;
            $mail->Body    = "su nueva Password es:  $newPass ";
            $mail->AltBody = 'se ha restablecido su contraseña exitosamente ';

            $mail->send();
            echo'
            <script> 
                  alert("Contraseña restablecida con exito, revisa tu correo para conocer tu nueva contraseña");
                  window.location = "../vistas/Login.php";
            </script>
      ';
            
        } catch (Exception $e) {
            echo `<script language="javascript">alert("juas"); </script>`;
        } 

}

?>