<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'phpmailer/src/Exception.php';
    require 'phpmailer/src/PHPMailer.php';

    $mail = new PHPMailer(true);
    $mail->CharSet = 'UTF-8';
    $mail->SetLanguage('En', 'phpmailer/language/');
    $mail->isHTML(true);

    // Sender
    $mail->setForm('samsamow@gmail.com','Developer');
    // Reciever
    $mail->addAdress('serfid7@gmail.com');
    // Letter subject
    $mail->Subject = "Hello, from site developer!";

    // Letter body
    $body = '<h1>Hello my friend, how are you doing?</h1>';

    if(trim(!empty($_POST['date-in']))){
        $body.='<p><strong>Check-in date:</strong> '.$_POST['date-in'].'</p>';
    }
    if(trim(!empty($_POST['date-out']))){
        $body.='<p><strong>Check-out date:</strong> '.$_POST['date-out'].'</p>';
    }
    if(trim(!empty($_POST['guest']))){
        $body.='<p><strong>Number of guests:</strong> '.$_POST['guest'].'</p>';
    }
    if(trim(!empty($_POST['room']))){
        $body.='<p><strong>Number of rooms:</strong> '.$_POST['room'].'</p>';
    }
    if(trim(!empty($_POST['mail']))){
        $body.='<p><strong>E-mail:</strong> '.$_POST['mail'].'</p>';
    }






    $mail->Body = $body;

    // sending
    if (!$mail->send()) {
        $message = 'Mistake';
    } else {
        $message = 'Form sent to reciever';
    }

    $response = ['message' => $message];

    header('Content-type: application/json');
    echo json_encode($response);
?>


