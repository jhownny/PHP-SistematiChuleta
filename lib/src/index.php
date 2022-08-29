<?php /*
require_once('../src/PHPMailer.php');
require_once('../src/SMTP.php');
require_once('../src/Exception.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try{

    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'jho.bat9@gmail.com';
    $mail->Password = '1920764svsu';
    $mail->Port = 587;

    $mail->setFrom('jho.bat9@gmail.com');
    $mail->addAddress('jho.bat00@gmail.com');

    $mail->isHTML(true);
    $mail->Subject = 'teste de email via gmail olha lá';
    $mail->Body = 'chegou o email teste do <strong>olhs lá</strong>';
    $mail->AltBody = 'jhjdhjhdf';

    if($mail->send()){

        echo 'email enviado com sucesso';

    }else{

        echo 'email não enviado';

    }

}catch(Exception $e){

    echo "Erro ao enviar mensagem: {$mail->ErrorInfo}";

}*/
?>