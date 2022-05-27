<?php
session_start();
$pageTitle = "Mon profil";
require "../../database/database.php";
require "../../struct/head.php";
?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
<link href="../../css/profil.css" rel="stylesheet" type="text/css">
</head>

<?php
require "admin_leftmenu.php";
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
                                <li class="breadcrumb-item"><a href="admin_dashboard.php?id=<?php echo ($_SESSION['id']); ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                            </ol>
                        </nav>
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
                                                    <input type="text" id="newFirstName" name="newFirstName" class="form-control" placeholder="<?php echo $firstNameUser ?>">
                                                    <p class="errorrr">
                                                        <?php if (isset($erreurNewFirstName)) echo $erreurNewFirstName; ?>
                                                    </p>
                                                </div>
                                                <div class="col">
                                                    <p class="info">Nom</p>
                                                    <input type="text" id="newName" name="newName" class="form-control" placeholder="<?php echo $nameUser ?>">
                                                    <p class="errorrr">
                                                        <?php if (isset($erreurNewName)) echo $erreurNewName; ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <p class="info">Mail</p>
                                            <input type="mail" id="mailU" name="mailU" class="form-control" placeholder="<?php echo $mailUser ?>" disabled="disabled">
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
    </div>

</body>

</html>