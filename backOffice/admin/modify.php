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

require "../../struct/head.php";
?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
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
                        <span class="title pt-3 textcolor px-5"><?php echo $pageTitle ?></span>
                    </div>
                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clients</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pl-5">
                    <form action="" class="my-4">
                        <div class="from-group row">
                            <div class="col-sm-12 pr-4">
                                <input type="submit" class="btn btn-success" name="formModify" value="Modifier">
                                <a href="admin_users_client.php" class="btn btn-danger right">Annuler</a>
                            </div>
                        </div>
                    </form>
                    <div class="col">
                        <table id="listc">




                            <?php if ($infoUser['role'] === "client") { ?>
                                <tr>
                                    <th class="table_border table_font_1 textcolor center px-4 py-2">ID</th>
                                    <th class="table_border table_font_1 textcolor center px-5">Mail</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Nom</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Prénom</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Rôle</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Forfait</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Trajets</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Points</th>
                                    <th class="table_border table_font_1 textcolor center px-5">Confirmkey</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Verif</th>
                                    <th class="table_border table_font_1 textcolor center px-4 py-2">Date d'inscription</th>
                                </tr>
                                <tr>
                                    <td id="lgn" class="table_border table_font_2 center py-2 text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['id']; ?>" disabled></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="mail" class="form-control" placeholder="<?php echo $infoUser['mail']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['lastname']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['firstname']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['role']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo ($infoUser['fg_package']."(".printPkgName($infoUser['fg_package']).")"); ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="number" class="form-control" placeholder="<?php echo $infoUser['races']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="number" class="form-control" placeholder="<?php echo $infoUser['points']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="number" class="form-control" value="<?php echo $infoUser['confirm_key']; ?>" disabled></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="number" min="0" max="1" class="form-control" placeholder="<?php echo $infoUser['account_confirm']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['registration_date']; ?>"></td>
                                </tr>
                            <?php } ?>

                            <?php if ($infoUser['role'] === "admin") { ?>
                                <tr>
                                    <th class="table_border table_font_1 textcolor center px-4 py-2">ID</th>
                                    <th class="table_border table_font_1 textcolor center px-5">Mail</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Nom</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Prénom</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Rôle</th>
                                    <th class="table_border table_font_1 textcolor center px-5">Confirmkey</th>
                                    <th class="table_border table_font_1 textcolor center px-4">Verif</th>
                                    <th class="table_border table_font_1 textcolor center px-4 py-2">Date d'inscription</th>
                                </tr>
                                <tr>
                                    <td id="lgn" class="table_border table_font_2 center py-2 text-white"><input type="text" class="form-control" value="<?php echo $infoUser['id']; ?>" disabled></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="mail" class="form-control" placeholder="<?php echo $infoUser['mail']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['lastname']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['firstname']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['role']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="number" class="form-control" placeholder="<?php echo $infoUser['confirm_key']; ?>" disabled></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="number" min="0" max="1" class="form-control" placeholder="<?php echo $infoUser['account_confirm']; ?>"></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><input type="text" class="form-control" placeholder="<?php echo $infoUser['registration_date']; ?>"></td>
                                </tr>
                            <?php } ?>


                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>