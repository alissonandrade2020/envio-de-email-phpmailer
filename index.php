<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Alisson - Enviar e-mail com PHPMailer</title>
    </head>
    <body>
        <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

require './lib/vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '';
            $mail->Password = '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '';

            $mail->setFrom('teste@.pb.gov.br', 'Atendimento');
            $mail->addAddress('teste@.pb.gov.br', 'Alisson Andrade');
            
            $mail->isHTML(true);                                 
            $mail->Subject = 'Titulo do E-mail';
            $mail->Body = "Olá Alisson, Sua solicitação sobre o <b>curso de PHP Developer</b>.<br>Texto da segunda linha.";
            $mail->AltBody = "Olá Alisson, Sua solicitação sobre o curso de PHP Developer.\nTexto da segunda linha.";

            $mail->send();
            
            echo '<strong>E-mail enviado com sucesso!</strong><br>';
        } catch (Exception $e) {
            echo "Erro: E-mail não enviado com sucesso. Error PHPMailer: {$mail->ErrorInfo}";
            //echo "Erro: E-mail não enviado com sucesso.<br>";
        }
        ?>
    </body>
</html>
