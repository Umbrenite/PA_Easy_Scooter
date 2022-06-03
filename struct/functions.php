<?php

// Define name spaces
use PHPMailer\PHPMailer\PHPMailer;

function mailer($mailOfReceiver, $titleOfMail, $corpsOfMail) {

    require($_SERVER['DOCUMENT_ROOT'] . '/includes/PHPMailer.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/includes/SMTP.php');
    require($_SERVER['DOCUMENT_ROOT'] . '/includes/Exception.php');

    // Create instance of phpmailer
    $mail = new PHPMailer();

    // Set mailer to use smtp
    $mail->isSMTP();

    // define smtp host
    $mail->Host = "smtp.gmail.com";

    // enable smtp authentification
    $mail->SMTPAuth = "true";

    // set type of encryption (ssl/tls)
    $mail->SMTPSecure = "tls";

    // set port to connect smtp
    $mail->Port = "587";

    // set gmail username
    $mail->Username = "electrot.easyscooter@gmail.com";

    // set gmail password
    $mail->Password = "Petitratio123+";

    // set email subject
    $mail->Subject = $titleOfMail;

    // Set sender email
    $mail->setFrom("funpark91@gmail.com");

    // Email body
    $mail->Body = $corpsOfMail;

    // Add recipient
    $mail->addAddress($mailOfReceiver);

    // Finally send mail
    $mail->Send();

    // Closing smtp connection
    $mail->smtpClose();
}

function printPkgName($packageID) {

    global $bdd;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
    $pkgName = $bdd->prepare("SELECT name FROM iw22_package WHERE id = ?");
    $pkgName->execute(array($packageID));
    $resultPkgName = $pkgName->fetchAll();
    
    return $resultPkgName[0]["name"];
}