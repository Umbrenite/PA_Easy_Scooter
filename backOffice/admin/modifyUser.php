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

$id = $infoUser['id'];

if (isset($_POST['formModifyC'])) {

    if (isset($_POST['mailU']) && !empty($_POST['mailU'])) modifUser($_POST['mailU'], $id, "mail", $infoUser['mail']); // mail
    if (isset($_POST['lnameU']) && !empty($_POST['lnameU'])) modifUser($_POST['lnameU'], $id, "lastname", $infoUser['lastname']); // lastname
    if (isset($_POST['fnameU']) && !empty($_POST['fnameU'])) modifUser($_POST['fnameU'], $id, "firstname", $infoUser['firstname']); // firstname
    if (isset($_POST['roleU']) && !empty($_POST['roleU'])) modifUser($_POST['roleU'], $id, "role", $infoUser['role']); // role
    if (isset($_POST['pkgU']) && !empty($_POST['pkgU'])) modifUser(substr($_POST['pkgU'], 0, 1), $id, "fg_package", $infoUser['fg_package']); // forfait
    if (isset($_POST['racesU'])) modifUser(intval($_POST['racesU']), $id, "races", $infoUser['races']); // trajets
    if (isset($_POST['ptsU'])) modifUser(floatval($_POST['ptsU']), $id, "points", $infoUser['points']); // points
    if (isset($_POST['confirmKeyU']) && !empty($_POST['confirmKeyU'])) modifUser($_POST['confirmKeyU'], $id, "confirm_key", $infoUser['confirm_key']); // confirmkey
    if (isset($_POST['confU'])) modifUser(intval($_POST['confU']), $id, "account_confirm", $infoUser['account_confirm']); // vérification
    header("Location: admin_list_client.php");
}

if (isset($_POST['formModifyA'])) {

    if (isset($_POST['mailU']) && !empty($_POST['mailU'])) modifUser($_POST['mailU'], $id, "mail", $infoUser['mail']); // mail
    if (isset($_POST['lnameU']) && !empty($_POST['lnameU'])) modifUser($_POST['lnameU'], $id, "lastname", $infoUser['lastname']); // lastname
    if (isset($_POST['fnameU']) && !empty($_POST['fnameU'])) modifUser($_POST['fnameU'], $id, "firstname", $infoUser['firstname']); // firstname
    if (isset($_POST['roleU']) && !empty($_POST['roleU'])) modifUser($_POST['roleU'], $id, "role", $infoUser['role']); // role
    if (isset($_POST['confirmKeyU']) && !empty($_POST['confirmKeyU'])) modifUser($_POST['confirmKeyU'], $id, "confirm_key", $infoUser['confirm_key']); // confirmkey
    if (isset($_POST['confU']) && !empty($_POST['confU'])) modifUser(intval($_POST['confU']), $id, "account_confirm", $infoUser['account_confirm']); // vérification
    header("Location: admin_list.php");
}

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
                                <li class="breadcrumb-item"><a href="admin_list.php">Liste admins</a></li>
                                <li class="breadcrumb-item"><a href="admin_list_client.php">Liste users</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>


                <?php if ($infoUser['role'] === "client") { ?>

                    <form method="post">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <table id="listm">
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
                                            <td><input id="ctn" name="confU" type="number" min="0" max="1" class="form-control" value="<?php echo $infoUser['account_confirm']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Date d'inscription :</th>
                                            <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoUser['registration_date']; ?>" disabled></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-auto">
                                    <input type="submit" class="btn btn-success" name="formModifyC" value="Modifier">
                                </div>
                                <div class="col-md-auto">
                                    <a href="javascript:history.back()" class="btn btn-danger right">Annuler</a>
                                </div>
                            </div>
                        </div>
                    </form>

                <?php } ?>


                <?php if ($infoUser['role'] === "admin") { ?>

                    <form method="post">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col">
                                    <table id="listm">
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
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Confirmkey :</th>
                                            <td><input id="ctn" name="confirmKeyU" type="number" min="0" class="form-control" value="<?php echo $infoUser['confirm_key']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Verif :</th>
                                            <td><input id="ctn" name="confU" type="number" min="0" max="1" class="form-control" value="<?php echo $infoUser['account_confirm']; ?>"></td>
                                        </tr>
                                        <tr>
                                            <th class="table_border table_font_1 textcolor center px-4" scope="row">Date d'inscription :</th>
                                            <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoUser['registration_date']; ?>" disabled></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-md-auto">
                                    <input type="submit" class="btn btn-success" name="formModifyA" value="Modifier">
                                </div>
                                <div class="col-md-auto">
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