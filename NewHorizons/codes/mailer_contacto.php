<?php
//  envio de datos del formulario al mi correo electronico
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception; la comente porque daba error con otro proyecto, no puede ser llamda dos veces.
require 'D:/XAMPP/htdocs/NewHorizons/PHPMailer/src/Exception.php';
require 'D:/XAMPP/htdocs/NewHorizons/PHPMailer/src/PHPMailer.php';
require 'D:/XAMPP/htdocs/NewHorizons/PHPMailer/src/SMTP.php';










//funcion para el envio de archivos
// function restructureArray(array $arr){
//     $result = array();
//     foreach($arr as $key => $value){
//         for ($i =  0; $i < count($value); $i++ ){
//             $result[$i][$key] = $value[$i];
//         }
//     }
//     return $result;
// }
        


if(isset($_POST['nombre']) && 
       
       isset($_POST['email']) &&
       
       isset($_POST['mensaje']) 
       
       ){

      
        $nombre = $_POST['nombre'];
     
        $email = $_POST['email'];
      
        $mensaje = $_POST['mensaje'];
      
       


    
    // usando funcion de envio de archivos en el caso de que hay an archivos cargados.

    // $files = [];
    // if (!empty($_FILES['archivo'])){
    //     $files = restructureArray($_FILES['archivo']);
    // }
    // $archivo = $_FILES['archivo'];

        
        



        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                        //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'mail.dois.cl';                         //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'diego.franco@dois.cl';                     //SMTP username
            $mail->Password   = 'k9O4KgG!MhAr';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('diego.franco@dois.cl' ,'Contacto');
            $mail->addAddress('jorge.ignacio131198@gmail.com', 'Contacto');     
            //$mail->addAddress('ellen@example.com');              
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');



            

            
            //   if(count($files)>0){
            //     foreach ($files as $key => $file){
                
            //         if(!empty($file['name'])){
            //             $mail->addAttachment(
            //                 $file['tmp_name'],
            //                 $file['name']
            //            );
            //         }
                    
            //    }
            // }

            //print_r ($files);   













            //Attachments, Este if era el anterior, el que era necesario porque en el caso que se mandara el mail sin un archivo daba error.
             //if (file_exists($archivo['name'])){ 

                //$mail->addAttachment($archivo['tmp_name'], $archivo['name']);

             //}
    


             
            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = 'NOMBRE: '  .$_POST['nombre'] ;
            $mail->Body    = 'CORREO ELECTRONICO: '.$_POST['email'] .' MENSAJE: ' .$_POST['mensaje'] ;
            $mail->AltBody  = 'NOMBRE: '  .$_POST['nombre'] ;
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo `<script language="javascript">alert("juas"); </script>`;
        } 




 
    }








?>