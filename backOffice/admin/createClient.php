<?php
$pageTitle = "Ajout d'un utilisateur";
require "../../struct/head.php";
?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<?php
require "admin_leftmenu.php";

// PARTIE INITIALISATION DES VARIABLES
$mdptemp = random_bytes(5);
$date_now = new DateTime();
$date_now->setTimezone(new DateTimeZone('Europe/Paris'));
$key = 0;
for ($i = 1; $i < 16; $i++) {
    $key .= mt_rand(0, 9);
}

if (isset($_POST['formClient'])) {

    if (
        empty($_POST['mail']) ||
        empty($_POST['nom']) ||
        empty($_POST['prenom']) ||
        empty($_POST['role']) ||
        $_POST['role'] == "Choisir un rôle..." ||
        !is_numeric($_POST['points']) ||
        !is_numeric($_POST['trajets'])
    ) $msgerror = "Erreur d'une ou plusieurs entrées";

    if (empty($msgerror)) {
        // PARTIE RECUPERATION
        $mail = htmlspecialchars($_POST['mail']);
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mdpf = password_hash(bin2hex($mdptemp), PASSWORD_BCRYPT);
        $role = htmlspecialchars($_POST['role']);
        $points = $_POST['points'];
        $trajets = $_POST['trajets'];

        require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
        $insertclient = $bdd->prepare("INSERT INTO iw22_user(mail, lastname, firstname, password, confirm_key, role, points, races, registration_date, fg_package) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, 1)");
        $insertclient->execute(array($mail, $nom, $prenom, $mdpf, $key, $role, $points, $trajets, $date_now->format("Y-m-d H:i:s")));

        require "../../struct/functions.php";
        $corpsMail =
            '
        Bonjour,

        un administrateur vient de vous créer un compte Electrot.
        Afin de finaliser l\'inscription, veuillez vérifier votre compte en cliquant sur ce lien : 
        https://www.electrot.site/confirm.php?mail=' . urlencode($mail) . '&key=' . $key . '

        Voici votre mot de passe temporaire qu\'il faudra modifier après votre première connexion : 
        '
            . bin2hex($mdptemp) . '
        
        Cordialement,
        L\'équipe d\'Electrot';

        mailer($mail, "Confirmation de compte", $corpsMail); ?>

        <script>
            var create = alert("Le nouvel utilisateur <?php echo ($mail) ?> a bien été créé.\nUn mail de confirmation lui a été envoyé !");

            var roleu = <?php echo json_encode($role); ?>;
            if (roleu == "admin") {
                document.location.href = "admin_list.php";
            }
            if (roleu == "client") {
                document.location.href = "admin_list_client.php";
            }
        </script>

<?php
    }
}
?>

<body class="bgfontdark">

    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">

                <div class="row pl-3">
                    <div class="col pl-5 pb-5 pt-4">
                        <span class="title pt-3 textcolor px-5"><?php echo $pageTitle; ?></span>
                    </div>
                    <div class="col pt-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="admin_list_scooter.php">Scooters</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div id="interfcreat" class="pl-5 rounded">
                    <div class="col bgfontblack py-5 px-5">
                        <form method="post">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Mail</label>
                                    <input type="email" id="mail" name="mail" class="form-control" placeholder="Adresse mail" required="required" autocomplete="on">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Nom</label>
                                    <input type="text" id="nom" name="nom" class="form-control" placeholder="Nom" required="required" autocomplete="on">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Prénom</label>
                                    <input type="text" id="prenom" name="prenom" class="form-control" placeholder="Prénom" required="required" autocomplete="on">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Mot de passe</label>
                                    <input type="text" id="mdp" name="mdp" class="form-control" value="<?php echo (bin2hex($mdptemp)); ?>" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Clef de confirmation</label>
                                    <input type="text" id="confkey" name="confkey" class="form-control" value=<?php echo ($key); ?> disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Date de création</label>
                                    <input type="text" id="datecrea" name="datecrea" class="form-control" value="<?php echo ($date_now->format("Y-m-d H:i:s")); ?>" disabled>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="role" class="textcolor" required="required">Rôle</label>
                                    <select id="role" name="role" class="form-control">
                                        <option selected>Choisir un rôle...</option>
                                        <option>admin</option>
                                        <option>client</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Points</label>
                                    <input type="number" min=0 id="points" name="points" class="form-control" value=0 required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Trajets</label>
                                    <input type="number" min=0 id="trajets" name="trajets" class="form-control" value=0 required="required">
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-auto">
                                    <input type="submit" class="btn btn-success" name="formClient" value="Ajouter">
                                </div>
                                <div class="col-md-auto">
                                    <a href="javascript:history.back()" class="btn btn-danger right">Retour</a>
                                </div>
                            </div>
                            <?php if (!empty($msgerror)) echo ($msgerror); ?>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>