<?php
$pageTitle = "Modification";
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

// PARTIE RECUP INFO USER
$usermID = $_GET['userm'];
$sallu = $bdd->prepare('SELECT * FROM iw22_user WHERE id = :id');
$sallu->bindValue('id', $usermID, PDO::PARAM_INT); // Représente le type de données INTEGER SQL.
$sallu->execute();
$infoUser = $sallu->fetch();

// PARTIE AFFICHAGE FORFAITS
$forfs = $bdd->prepare("SELECT * FROM iw22_package");
$forfs->execute();
$resultForfs = $forfs->fetchAll();
$nbForfs = count($resultForfs);

if (isset($_POST['formModifyC'])) {

    $id = $infoUser['id'];

    if ((isset($_POST['mailU'])) && !empty($_POST['mailU'])) {
        changeUser($_POST['mailU'], $id, "mail");
    }

    if (isset($_POST['racesU']) && !empty($_POST['racesU']) && $_POST['racesU'] != $infoUser['races']) {
        echo "<pre>".var_dump($_POST)."</pre>";
        
        changeUser(intval($_POST['racesU']), $id, "races");
    }

    if (isset($_POST['mailU']) && !empty($_POST['mailU'])) changeUser($_POST['mailU'], $id, "mail"); // mail
    if (isset($_POST['lnameU']) && !empty($_POST['lnameU'])) changeUser($_POST['lnameU'], $id, "lastname"); // lastname
    if (isset($_POST['fnameU']) && !empty($_POST['fnameU'])) changeUser($_POST['fnameU'], $id, "firstname"); // firstname
    if (isset($_POST['roleU']) && !empty($_POST['roleU'] && $_POST['roleU'] != $infoUser['role'])) changeUser($_POST['roleU'], $id, "role"); // role
    if (isset($_POST['pkgU']) && !empty($_POST['pkgU']) && substr($_POST['pkgU'], 0, 1) != $infoUser['fg_package']) changeUser(substr($_POST['pkgU'], 0, 1), $id, "fg_package"); // forfait
    

    // if ($_POST['racesU'] != $infoUser['races']) changeUser(intval($_POST['racesU']), $id, "races"); // trajets
    if (floatval($_POST['ptsU']) < pow(10, 12) && $_POST['ptsU'] != $infoUser['points']) changeUser(floatval($_POST['ptsU']), $id, "points"); // points
    if (isset($_POST['confirmKeyU']) && !empty($_POST['confirmKeyU'])) changeUser($_POST['confirmKeyU'], $id, "confirm_key"); // confirmkey
    if (intval($_POST['confU']) != intval($infoUser['account_confirm'] && intval($_POST['confU']) === 0 || intval($_POST['confU']) === 1) && intval($_POST['confU']) > 0 && intval($_POST['confU']) < 2) changeUser(intval($_POST['confU']), $id, "account_confirm"); // vérification
}

// if (isset($_POST['formModifyA'])) {

    // if (isset($_POST['mailU']) && !empty($_POST['mailU'])) changeUser($_POST['mailU'], $infoUser['id'], "mail"); // mail
    // if (isset($_POST['lnameU']) && !empty($_POST['lnameU'])) changeUser($_POST['lnameU'], $infoUser['id'], "lastname"); // lastname
    // if (isset($_POST['fnameU']) && !empty($_POST['fnameU'])) changeUser($_POST['fnameU'], $infoUser['id'], "firstname"); // firstname
    // if (isset($_POST['roleU']) && !empty($_POST['roleU'])) changeUser($_POST['roleU'], $infoUser['id'], "role"); // role
    // if (isset($_POST['confirmKeyU']) && !empty($_POST['confirmKeyU'])) changeUser($_POST['confirmKeyU'], $infoUser['id'], "confirm_key"); // confirmkey
    // if (isset($_POST['confU']) && !empty($_POST['confU'])) changeUser($_POST['confU'], $infoUser['id'], "account_confirm"); // vérification
// }

require "../../struct/head.php";
?>

<link href="/css/dashboard.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">
</head>

<?php
include "admin_leftmenu.php";
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
                                <li class="breadcrumb-item"><a href="admin_users.php">Liste admins</a></li>
                                <li class="breadcrumb-item"><a href="admin_users_client.php">Liste users</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>


                <?php if ($infoUser['role'] === "client") { ?>

                    <form method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table id="listc">
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">ID :</th>
                                            <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoUser['id']; ?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Mail :</th>
                                            <td><input id="ctn" name="mailU" type="mail" class="form-control" value="<?php echo $infoUser['mail']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Nom :</th>
                                            <td><input id="ctn" name="lnameU" type="text" class="form-control" value="<?php echo $infoUser['lastname']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Prénom :</th>
                                            <td><input id="ctn" name="fnameU" type="text" class="form-control" value="<?php echo $infoUser['firstname']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Rôle :</th>
                                            <td>
                                                <select class="form-control" name="roleU" required>
                                                    <option selected><?php print_r($infoUser['role']); ?></option>
                                                    <option>admin</option>
                                                    <option>client</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Forfait :</th>
                                            <td>
                                                <select class="form-control" name="pkgU" required>
                                                    <option selected><?php print_r($infoUser['fg_package'] . " (" . printPkgName($infoUser['fg_package']) . ")"); ?></option>

                                                    <?php for ($i = 0; $i < $nbForfs; $i++) { ?>
                                                        <option><?php print_r($resultForfs[$i]["id"] . " (" . $resultForfs[$i]["name"] . ")"); ?></option>
                                                    <?php } ?>

                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Trajets :</th>
                                            <td><input id="ctn" name="racesU" type="number" min="0" class="form-control" value="<?php echo $infoUser['races']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Points :</th>
                                            <td><input id="ctn" name="ptsU" type="number" min="0" class="form-control" value="<?php echo $infoUser['points']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Confirmkey :</th>
                                            <td><input id="ctn" name="confirmKeyU" type="number" min="0" class="form-control" value="<?php echo $infoUser['confirm_key']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Verif :</th>
                                            <td><input id="ctn" name="confU" type="text" class="form-control" value="<?php echo $infoUser['account_confirm']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Date d'inscription :</th>
                                            <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoUser['registration_date']; ?>" disabled></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div id="subm" class="col-sm">
                                    <input type="submit" class="btn btn-success" name="formModifyC" value="Modifier">
                                </div>
                                <div id="annul" class="col-sm">
                                    <a href="javascript:history.back()" class="btn btn-danger right">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php } ?>


                <?php if ($infoUser['role'] === "admin") { ?>

                    <form method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table id="listc">
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">ID :</th>
                                            <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoUser['id']; ?>" disabled></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Mail :</th>
                                            <td><input id="ctn" name="mailU" type="mail" class="form-control" placeholder="<?php echo $infoUser['mail']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Nom :</th>
                                            <td><input id="ctn" name="lnameU" Utype="text" class="form-control" placeholder="<?php echo $infoUser['lastname']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Prénom :</th>
                                            <td><input id="ctn" name="fnameU" type="text" class="form-control" placeholder="<?php echo $infoUser['firstname']; ?>"></td>
                                        </tr>

                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Rôle :</th>
                                            <td>
                                                <select class="form-control" name="roleU" required>
                                                    <option id="ratiolol" value="" disabled selected><?php print_r("-- " . $infoUser['role'] . " --"); ?></option>

                                                    <option value="admin">admin</option>
                                                    <option value="client">client</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Confirmkey :</th>
                                            <td><input id="ctn" name="confirmKeyU" type="number" min="0" class="form-control" placeholder="<?php echo $infoUser['confirm_key']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Verif :</th>
                                            <td><input id="ctn" name="confU" type="number" min="0" max="1" class="form-control" placeholder="<?php echo $infoUser['account_confirm']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Date d'inscription :</th>
                                            <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoUser['registration_date']; ?>" disabled></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div id="subm" class="col-sm">
                                    <input type="submit" class="btn btn-success" name="formModifyA" value="Modifier">
                                </div>
                                <div id="annul" class="col-sm">
                                    <a href="javascript:history.back()" class="btn btn-danger right">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php } ?>


            </div>
        </div>
    </div>

</body>

</html>