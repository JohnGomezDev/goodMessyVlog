<?php

require_once '../includes/connection.php';

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

echo !extension_loaded('openssl')?"Not Available":"Available";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer();
$mail->IsSMTP(); 
$mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );

//$mail->SMTPDebug = 2; //Propiedad para debuguear  
$mail->SMTPAuth = true;  
$mail->SMTPSecure = 'ssl'; 
$mail->SMTPAutoTLS = false; 
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->IsHTML(true);


//Tomar datos del formulario
if(isset($_POST['submit'])) {
    $name = !empty($_POST['name']) ? $_POST['name'] : false; 
    $email = !empty($_POST['email']) ? $_POST['email'] : false;
    $reason = !empty($_POST['reason']) ? $_POST['reason'] : false;
    $message = !empty($_POST['message']) ? $_POST['message'] : false;
    
    $subject = setSubject($reason);
    
    //Enviar email
    sendMail();
}


//Redireccio
header('Location:../contact.php');


function setSubject($reason) {
    $res = '';
    
    switch ($reason) {
        case 'post': $res = 'Problemas de Posts';
            break;
        case 'account': $res = 'Problemas de Cuenta';
            break;
        case 'report': $res = 'Reportar Mal Uso';
            break;
        case 'other': $res = 'Otro problema';
            break;
    }
    
    return $res;
}


function sendMail() {
    
    global $mail, $name, $email, $subject, $message;
    
    $mail->Username='goodmessyvlog@gmail.com';
    $mail->Password='m1c0ntrase$a';
    $mail->setFrom($email, 'address');
    $mail->addAddress('goodmessyvlog@gmail.com', 'addres2');
    $mail->Subject=$subject;
    $mail->msgHTML(
        "<h1>$subject</h1>".
        "<h3>Mensaje</h3>". 
        "<p>$message</p>".
        "<p><strong>Datos de usuario:</strong> <br> $name <br> $email </p>"
    );

    if(!$mail->send()) {
        $_SESSION['mail_error'] = 'error';
    } else {
        $_SESSION['mail_ok'] = 'ok';
    }

}

?>