<?php
$pageTitle = "Confirmation";

if (isset($_GET['mail'], $_GET['mail'])) {

    $getMail = htmlspecialchars(urldecode($_GET['mail']));
    $key = htmlspecialchars($_GET['key']);

    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
    $reqConfirm = $bdd->prepare("SELECT * FROM iw22_user WHERE mail = ? AND confirm_key = ?");
    $reqConfirm->execute(array($getMail, $key));
    $userExist = $reqConfirm->rowCount();
    $user = $reqConfirm->fetch();

    if ($userExist < 1) $messageRe = "Compte inexistant";
    if ($userExist > 1) $messageDM = "Erreur #DUPLIMAIL <br><br> Veuillez contacter Electrot-easyscooter@hotmail.com";
    if ($user['account_confirm'] == 1) $messageCo = "Votre compte a déjà été confirmé !";

    if (empty($messageCo) && empty($messageRe) && empty($messageDM)) {
        $updateUser = $bdd->prepare("UPDATE iw22_user SET account_confirm = 1 WHERE mail = ? AND confirm_key = ?");
        $updateUser->execute(array($getMail, $key));
        $messageCo = "Votre compte a bien été confirmé !";
    }
}
?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Electrot, le transport nouvelle génération">
    <title><?php echo $pageTitle . " | Electrot" ?></title>
    <link rel="icon" href="./img/logo/electrotst.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <img style="display:block; margin:auto; width:15%; height:auto;" src="img/logo/electrotsf.png">

    <?php if (isset($messageCo) && !isset($messageDM)) { ?>
        <div style="text-align:center; margin-top:5%;">
            <h2><?php echo $messageCo; ?></h2>
            <div>
                <a style=margin-top:5%; type="button" class="btn btn-success" href="login.php">Connexion Electrot</a>
            </div>
        </div>
    <?php } ?>

    <?php if (isset($messageRe)) { ?>
        <div style="text-align:center; margin-top:5%;">
            <h2><?php echo $messageRe; ?></h2>
            <div>
                <a style=margin-top:5% type="button" class="btn btn-success" href="register.php">Inscription Electrot</a>
            </div>
        </div>
    <?php } ?>

    <?php if (isset($messageDM)) { ?>
        <div style="text-align:center; margin-top:5%;">
            <h2><?php echo $messageDM; ?></h2>
            <div>
                <a style=margin-top:5% type="button" class="btn btn-success" href="mailto:Electrot-easyscooter@hotmail.com?subject=HTML link">Cliquez ici pour nous envoyer un e-mail !</a>
            </div>
        </div>
    <?php } ?>

</body>

</html>