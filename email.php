<?php

require_once('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();

$mail->IsSMTP();

$mail->Host = 'smtp.gmail.com';

$mail->SMTPAuth = true;

$mail->Username = 'tihzin@gmail.com';

include("senha.php");

$mail->SMTPSecure = 'tls';

$mail->Port = 587;

$mail->From = $from;

$mail->FromName = $fromName;

$mail->AddAddress($email_destinatario, $nome_destinatario);


$mail->IsHTML(true);

$mail->CharSet = 'UTF-8';

$mail->Subject = $subject;

$mail->Body = "<html>
                <head>
                    <meta charset='utf-8' />
                    </head>
                    <body>$mensagem</body>
					</html>";
                                
                                
 $mail->AltBody = $mensagem;
 
 if(!$mail->Send()){
     echo 'Mensagem nao pode ser enviado';
     echo $mail->ErrorInfo;
     exit;
 }
 else {
     echo "mensagem enviada com sucesso";
 }
 ?>