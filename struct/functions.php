<?php

// Define name spaces
use PHPMailer\PHPMailer\PHPMailer;

function mailer($mailOfReceiver, $titleOfMail, $corpsOfMail)
{

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

function printPkgName($packageID)
{

    global $bdd;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
    $pkgName = $bdd->prepare("SELECT name FROM iw22_package WHERE id = ?");
    $pkgName->execute(array($packageID));
    $resultPkgName = $pkgName->fetch();

    return $resultPkgName["name"];
}

function modifUser($dataPost, int $idUser, string $tableName, $oldData)
{
    if ($dataPost != $oldData) {
        
        if (is_numeric($dataPost) && $dataPost < 0 || $dataPost > pow(10, 12)) {
            exit();
        }

        global $bdd;
        $updtU = $bdd->prepare("UPDATE iw22_user SET $tableName = ? WHERE id = ?");
        $updtU->execute(array($dataPost, $idUser));
?>
        <script>
            // console.log("<?php //echo $tableName; ?>");
            // console.log("<?php //echo $dataPost; ?>");
            // console.log("<?php //echo $idUser; ?>");
            // console.log("<?php //echo $oldData; ?>");
            var idu = <?php echo json_encode($idUser); ?>;
            var create = alert("La modification de l'utilisateur a bien été prise en compte.");
            document.location.href = "modify.php?userm=" + idu;
        </script>
<?php
    }
}
