<?php
session_start();
$pageTitle = "Mon profil";

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');

$member = $bdd->prepare("SELECT * FROM iw22_user where id = $_SESSION[id]");
$member->execute();
$resultMember = $member->fetch();
$fg_pack_member = $resultMember['fg_package'];

$package_per_users = $bdd->prepare('SELECT name,price FROM iw22_package left join iw22_user on iw22_package.id = iw22_user.fg_package where fg_package = "' . $fg_pack_member . '"');
$package_per_users->execute();
$resultPackage_per_users = $package_per_users->fetch();

if (isset($_POST['formProfil'])) {

    // PARTIE VERIF CHAMPS MDPS
    if (isset($_POST['oldPwd']) && empty($_POST['newPwd']) && empty($_POST['confirmNewPwd'])) $errorNewPwd = "Tous les champs doivent être renseignés pour modifier le mot de passe";
    if (isset($_POST['newPwd']) && empty($_POST['oldPwd']) && empty($_POST['confirmNewPwd'])) $errorNewPwd = "Tous les champs doivent être renseignés pour modifier le mot de passe";
    if (isset($_POST['confirmNewPwd']) && empty($_POST['newPwd']) && empty($_POST['oldPwd'])) $errorNewPwd = "Tous les champs doivent être renseignés pour modifier le mot de passe";
    if (empty($_POST['newPwd']) && empty($_POST['newPwd']) && empty($_POST['oldPwd'])) $errorNewPwd = "Tous les champs doivent être renseignés pour modifier le mot de passe";

    // PARTIE VERIF CHAMPS NOM ET PRENOM
    if ($_POST['newName'] == $_SESSION['lastname']) $erreurNewName = "Le nom doit être différent";
    if ($_POST['newFirstName'] == $_SESSION['firstname']) $erreurNewFirstName = "Le nom doit être différent";


    if (!isset($errorNewPwd)) {
        $newPwd = $_POST['confirmNewPwd'];

        require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
        $stmt = $bdd->prepare('SELECT * FROM iw22_user WHERE id = :id');
        $stmt->bindValue('id', $_SESSION['id'], PDO::PARAM_INT); // Représente le type de données INTEGER SQL.
        $result = $stmt->execute();
        $infoUser = $stmt->fetch();
        $pwdcryptUser = $infoUser['password'];

        if (!password_verify($_POST['oldPwd'], $pwdcryptUser)) $errorOldPwd = "Mot de passe incorrect";
        if (!preg_match('/^(?=.*\d)(?=.*[&\-é_èçà^ù*:!ù#~@°%§+.])(?=.*[a-z])(?=.*[A-Z])[0-9A-Za-z&\-é_èçà^ù*:!ù#~@°%§+.]{4,50}$/', $newPwd)) $errorNewPwd = "Le mot de passe doit comporter au moins 1 majuscule, 1 minuscule, 1 chiffre et 1 caractère spécial parmis [à@éè&çù_!.+-:#%§^*~°]";
        if ($_POST['newPwd'] != $_POST['confirmNewPwd']) $errorNewPwd = "Les nouveaux mots de passe ne correspondent pas";

        if (!isset($errorNewPwd)) {
            $newPwdCrypt = password_hash($newPwd, PASSWORD_BCRYPT);
            $insertNewPwd = $bdd->prepare('UPDATE iw22_user SET password = ? WHERE id = ?');
            $insertNewPwd->execute(array($newPwdCrypt, $_SESSION['id']));
?>
            <script>
                var idu = <?php echo json_encode($_SESSION['id']); ?>;
                var create = alert("La modification de votre mot de passe à bien été prise en compte.");
                document.location.href = "client_profil.php?id=" + idu;
            </script>
        <?php
        }
    }


    // PARTIE MODIF PRENOM
    if (isset($_POST['newFirstName']) && !empty($_POST['newFirstName']) && !isset($erreurNewFirstName)) {
        $newFirstname = htmlspecialchars($_POST['newFirstName']);
        require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
        $insertFirstName = $bdd->prepare('UPDATE iw22_user SET firstname = ? WHERE id = ?');
        $insertFirstName->execute(array($newFirstname, $_SESSION['id']));
        $_SESSION['firstname'] = $newFirstname;
        ?>
        <script>
            var idu = <?php echo json_encode($_SESSION['id']); ?>;
            var create = alert("La modification a bien été prise en compte.");
            document.location.href = "client_profil.php?id=" + idu;
        </script>
    <?php
    }


    // PARTIE MODIF NOM
    if (isset($_POST['newName']) && !empty($_POST['newName']) && !isset($erreurNewName)) {
        $newName = htmlspecialchars($_POST['newName']);
        require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
        $insertName = $bdd->prepare('UPDATE iw22_user SET lastname = ? WHERE id = ?');
        $insertName->execute(array($newName, $_SESSION['id']));
        $_SESSION['lastname'] = $newName;
    ?>
        <script>
            var idu = <?php echo json_encode($_SESSION['id']); ?>;
            var create = alert("La modification a bien été prise en compte.");
            document.location.href = "client_profil.php?id=" + idu;
        </script>
<?php
    }
}

require "../../struct/head.php"; ?>
<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
<link href="../../css/profil.css" rel="stylesheet" type="text/css">
</head>

<?php
require "client_leftmenu.php";
?>

<body class="bgfontdark">

    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">

                <div class="row pt-3 pl-3">
                    <div class="col pl-5 pb-5 pt-3">
                        <span class="title pt-3 textcolor px-5"><?php echo $pageTitle; ?></span>
                    </div>
                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="client_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="login-form">
                                <form method="post">

                                    <h5>Modifier les informations personnelles</h5>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <p class="info">Prénom</p>
                                                <input type="text" id="newFirstName" name="newFirstName" class="form-control" placeholder="<?php echo $_SESSION['firstname']; ?>">
                                                <p class="errorrr">
                                                    <?php if (isset($erreurNewFirstName)) echo $erreurNewFirstName; ?>
                                                </p>
                                            </div>
                                            <div class="col">
                                                <p class="info">Nom</p>
                                                <input type="text" id="newName" name="newName" class="form-control" placeholder="<?php echo $_SESSION['lastname']; ?>">
                                                <p class="errorrr">
                                                    <?php if (isset($erreurNewName)) echo $erreurNewName; ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <p class="info">Mail</p>
                                        <input type="mail" class="form-control" placeholder="<?php echo $_SESSION['mail']; ?>" disabled="disabled">
                                    </div>

                                    <div class="form-group">
                                        <p class="info">Forfait actuel</p>
                                        <input type="text" class="form-control" placeholder="<?php echo $resultPackage_per_users['name']; ?>" disabled="disabled">
                                    </div>

                                    <hr>

                                    <h5>Modifier le mot de passe</h5>

                                    <div class="form-group">
                                        <input type="password" id="oldPwd" name="oldPwd" class="form-control" placeholder="Mot de passe actuel">
                                        <p class="errorrr">
                                            <?php if (isset($errorOldPwd)) echo $errorOldPwd; ?>
                                        </p>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" id="newPwd" name="newPwd" class="form-control" placeholder="Nouveau mot de passe">
                                    </div>

                                    <div class="form-group">
                                        <input type="password" id="confirmNewPwd" name="confirmNewPwd" class="form-control" placeholder="Confirmer le nouveau mot de passe">
                                    </div>

                                    <p class="errorrr">
                                        <?php if (isset($errorNewPwd)) echo $errorNewPwd; ?>
                                    </p>

                                    <hr>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success" name="formProfil" value="Sauvegarder">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>