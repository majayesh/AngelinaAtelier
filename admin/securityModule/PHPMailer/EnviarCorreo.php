<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';

class EnviarCorreo{

    public function enviar($destinatario,$codigoconfirmacion){
        
        $mail = new PHPMailer(true);
        
        try {
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'AngelinaAtelierConfection@gmail.com';
            $mail->Password   = 'angelinaatelier.321';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            $mail->setFrom('AngelinaAtelierConfection@gmail.com', 'Angelina Atelier Confection');
            $mail->addAddress($destinatario);
            
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');

            $mail->isHTML(true);
            $mail->Subject = utf8_decode('Recuperar contraseña Angelina Atelier');
            $mail->CharSet = 'UTF-8';
            $mail->Body    = "Buen día, se recibió una solicitud de recuperación de contraseña. <br><br> Ingrese el siguiente código para reestablecer su contraseña: <b>$codigoconfirmacion</b> <br><br> No comparta este código con nadie. <br><br> Si usted no realizó esta solicitud, ignore este correo. <br><br> No responder este correo.";

            $mail->send();
            
            return 1;
            
        } catch (Exception $e) {
            
            echo($e);
            return 0;
            
        }
        
    }

}