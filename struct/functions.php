<?php

// Define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

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
    $mail->Host = "smtp-mail.outlook.com";

    // enable smtp authentification
    $mail->SMTPAuth = "true";

    // set type of encryption (ssl/tls)
    $mail->SMTPSecure = "tls";

    // set port to connect smtp
    $mail->Port = "587";

    // set gmail username
    $mail->Username = "Electrot-easyscooter@hotmail.com";

    // set gmail password
    $mail->Password = "Petitratio123+";

    // set email subject
    $mail->Subject = $titleOfMail;

    // Set sender email
    $mail->setFrom("Electrot-easyscooter@hotmail.com");

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
            const idu = <?php echo json_encode($idUser); ?>;
            alert("La modification de l'utilisateur a bien été prise en compte.");
            document.location.href = "modifyUser.php?userm=" + idu;
        </script>
    <?php
    }
}

function modifTrot($newData, int $idTrot, string $tableName, $oldData)
{
    if ($newData == "none") {
        $newData = null;
    }

    if ($newData != $oldData) {

        global $bdd;
        $updtU = $bdd->prepare("UPDATE iw22_scooter SET $tableName = ? WHERE id = ?");
        $updtU->execute(array($newData, $idTrot));
    ?>
        <script>
            alert("La modification de la trotinette a bien été prise en compte.");
            document.location.href = "admin_list_scooter.php";
        </script>
<?php }
}

function deleteT(int $idTrot, string $tableName, string $fileName)
{
    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
    $delT = $bdd->prepare("DELETE FROM $tableName WHERE id = ?");
    $delT->execute(array($idTrot));
    header("Location: backOffice/admin/" . $fileName . ".php");
}

function printUserInfo($userID)
{
    global $bdd;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
    $reqInfo = $bdd->prepare("SELECT firstname, lastname FROM iw22_user WHERE id = ?");
    $reqInfo->execute(array($userID));
    $userInfo = $reqInfo->fetch();
    return $userInfo["firstname"] . " " . $userInfo["lastname"];
}

function textalert($text)
{ ?>
    <script>
        const text = <?php echo json_encode($text); ?>;
        alert(text);
    </script>
<?php }