<?php
$pageTitle = "Connexion";

if (isset($_POST['formconnect'])) {

    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');

    $mailconnect = htmlspecialchars($_POST['mailconnect']);
    $pwdconnect = $_POST['pwdconnect'];

    $stmt = $bdd->prepare('SELECT * FROM iw22_user WHERE mail = :mail');
    $stmt->bindValue('mail', $mailconnect, PDO::PARAM_STR); // Représente types de do CHAR, VARCHAR ou les autres sous forme de chaîne de caractères SQL.
    $rslt = $stmt->execute();
    $resultMember = $stmt->fetch();

    if (isset($resultMember['account_confirm'])) {
        $ratio = $resultMember['account_confirm'];
        if ($ratio != 1) $erreur = "L'adresse mail n'est pas confirmée"; // Le compte n'est pas vérifié
    } else {
        $erreur = "L'adresse mail n'est pas confirmée"; // Le compte n'est pas vérifié
    }

    if (empty($mailconnect) || empty($pwdconnect)) $erreur = "Tous les champs doivent être comptétés";
    if (empty($resultMember)) $erreur = "Authentification échouée"; // Adresse mail inexistante

    if (isset($resultMember['password'])) {
        $pwdcrypt = $resultMember['password'];
        if (!password_verify($pwdconnect, $pwdcrypt)) $erreur = "Authentification échouée"; // Mot de passe incorrecte
    }

    if (empty($erreur)) {

        session_start();
        $_SESSION['id'] = $resultMember['id'];
        $_SESSION['lastname'] = $resultMember['lastname'];
        $_SESSION['firstname'] = $resultMember['firstname'];
        $_SESSION['mail'] = $resultMember['mail'];
        $_SESSION['role'] = $resultMember['role'];
        $_SESSION["useragent"] = $_SERVER["HTTP_USER_AGENT"];
        $_SESSION["ipaddr"] = $_SERVER['REMOTE_ADDR'];

        $queryPrepared = $bdd->prepare("INSERT INTO iw22_log (user_agent, ip, id_user, end_date) VALUES (:user_agent, :ipaddr, :user_id, NOW())");
        $queryPrepared->execute([
            "user_agent" => $_SESSION["useragent"],
            "ipaddr" => $_SESSION["ipaddr"],
            "user_id" => $_SESSION["id"]
        ]);

        if ($resultMember['role'] == "client") header("Location: backOffice/client/client_dashboard.php");
        if ($resultMember['role'] == "admin") header("Location: backOffice/admin/admin_dashboard.php");
    }
}

require "struct/head.php"; ?>
<link href="./css/login.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="global">
        <div id="contenu">
            <div class="login-form">
                <form method="post">
                    <h4>Connexion</h4>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-3">
                                <a href="index.php">
                                    <img id="logoelectrot" src="img/logo/electrotst.png" class="logo-regis" alt="logo Electrot">
                                </a>
                            </div>
                            <div class="col-sm-9">
                                <h1>
                                    <a href="index.php">Electrot</a>
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" id="mailconnect" name="mailconnect" class="form-control" placeholder="Adresse mail" required="required" autocomplete="on">
                    </div>
                    <div class="form-group">
                        <input type="password" id="pwdconnect" name="pwdconnect" class="form-control" placeholder="Mot de passe" required="required" autocomplete="off">
                        <p class="errorrr">
                            <?php if (isset($erreur)) {
                                echo "$erreur";
                            } ?>
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-success" name="formconnect" value="Connexion">
                    </div>
                    <p class="pasdecompte">
                        Vous n'avez pas de compte ?
                    </p>
                    <a type="button" class="btn btn-outline-success" href="register.php">
                        S'inscrire
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>