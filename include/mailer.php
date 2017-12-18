<?php
header('Content-Type: text/html; charset=utf-8');
include_once('mailer/PHPMailer.php');
include_once('mailer/Exception.php');

//Load composer's autoloader
//require 'vendor/autoload.php';

$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
try {
    //Server settings
    $mail->Charset = "UTF-8";
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'huonghuong08.php@gmail.com';                 // SMTP username
    $mail->Password = '0123456789999';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('huonghuong08.php@gmail.com', 'Người gửi');
    $mail->addAddress('huongnguyen08.cv@gmail.com', 'Người nhận');     // Add a recipient
    $mail->addAddress('duc.huu128@gmail.com');               // Name is optional
    $mail->addReplyTo('huonghuong08.php@gmail.com', 'email reply');
   // $mail->addCC('cc@example.com');
   // $mail->addBCC('bcc@example.com');

    //Attachments
    //$mail->addAttachment('http://toplist.vn/images/800px/hoa-hong-10476.jpg');         // Add attachments
   // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Demo mailer PHP2509';

    $content = "Chào bạn A,
    <br/>Chào mừng bạn đến với website của chúng tôi <br/>
    <img src='https://hyt.r.worldssl.net/cms-images/news/431448_y-nghia-hoa-hong.jpg'>";
    $mail->Body    = $content;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();

    echo 'Message has been sent';
}
 catch (Exception $e) {
    echo 'Lỗi gửi mail.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
}