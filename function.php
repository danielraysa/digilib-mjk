<?php
require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

function check_session($url = null, $dir = null){
    global $root_folder;
    if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == ""){
        if($root_folder == $dir){
            header('location:login.php?redirect='.$url);
            exit;
        }
        header('location:../login.php?redirect='.$url);
        exit;
    }
}

function generateRandomString($length = 20) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function kirimEmail($tujuan, $subjek, $konten){
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer(true);
    global $user_mail;
    global $pass_mail;
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = $user_mail;                     // SMTP username
        $mail->Password   = $pass_mail;                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom('info@digilib.app', 'Digilib');
        if(is_array($tujuan)){
            foreach($tujuan as $tjn){
                $mail->addAddress($tjn); // Name is optional
            }
        }else{
            $mail->addAddress($tujuan); // Name is optional
        }

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subjek;
        $mail->Body    = $konten;

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>