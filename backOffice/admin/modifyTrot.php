<?php
$pageTitle = "Modification Trotinette";
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

// PARTIE RECUP INFO TROTINETTES
$trotID = $_GET['idtrot'];
$reqtr = $bdd->prepare('SELECT * FROM iw22_scooter WHERE id = :id');
$reqtr->bindValue('id', $trotID, PDO::PARAM_INT); // Représente le type de données INTEGER SQL.
$reqtr->execute();
$infoTrot = $reqtr->fetch();
$idT = $infoTrot['id'];

// PARTIE RECUP INFO USERS
$requsr = $bdd->prepare('SELECT id, firstname, lastname FROM iw22_user');
$requsr->execute();
$infoUser = $requsr->fetchall();
$nbUsers = count($infoUser);

// PARTIE RECUP INFO STATUTS TROTINETTE
$reqsco = $bdd->prepare('SELECT name FROM iw22_scooter_status');
$reqsco->execute();
$statusSco = $reqsco->fetchall();
$nbStatusSco = count($statusSco);

if (isset($_POST['formModifyT'])) {

    if (preg_match('/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/', $_POST['nxtST'])) {
        modifTrot($_POST['nxtST'], $idT, "next_service", $infoTrot['next_service']);
    } else {
        textalert("Le format de la date n'est pas correct.\nElle doit être au format (YYYY-MM-DD)");
    }

    if (isset($_POST['idUT']) && !empty($_POST['idUT'])) modifTrot($_POST['idUT'], $idT, "id_user", $infoTrot['id_user']);
    if (isset($_POST['latT']) && !empty($_POST['latT'])) modifTrot(floatval($_POST['latT']), $idT, "latitude", $infoTrot['latitude']);
    if (isset($_POST['longT']) && !empty($_POST['longT'])) modifTrot(floatval($_POST['longT']), $idT, "longitude", $infoTrot['longitude']);
    if (isset($_POST['batT']) && !empty($_POST['batT'])) modifTrot(intval($_POST['batT']), $idT, "battery", $infoTrot['battery']);
    if (isset($_POST['staT']) && !empty($_POST['staT'])) modifTrot($_POST['staT'], $idT, "status", $infoTrot['status']);
    if (isset($_POST['codeT']) && !empty($_POST['codeT'])) modifTrot($_POST['codeT'], $idT, "auth_code", $infoTrot['auth_code']);
}

require "../../struct/head.php"; ?>
<link href="/css/dashboard.css" rel="stylesheet" type="text/css">
<link href="/css/style.css" rel="stylesheet" type="text/css">
</head>

<?php require "admin_leftmenu.php"; ?>

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

                <form method="post">
                    <div class="container">

                        <div class="row">
                            <div class="col">
                                <table id="listm">

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">ID :</th>
                                        <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoTrot['id']; ?>" disabled></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Utilisateur :</th>
                                        <td>
                                            <select class="form-control" name="idUT" required>

                                                <option value="<?php if ($infoTrot['id_user']) echo $infoTrot['id_user']; ?>" selected>
                                                    <?php if ($infoTrot['id_user']) echo printUserInfo($infoTrot['id_user']); ?>
                                                </option>

                                                <?php for ($u = 0; $u < $nbUsers; $u++) { ?>
                                                    <option value="<?php echo $infoUser[$u]["id"]; ?>">
                                                        <?php echo ($infoUser[$u]["firstname"] . " " . $infoUser[$u]["lastname"]); ?>
                                                    </option>
                                                <?php } ?>

                                                <option value="none">
                                                    Vide
                                                </option>

                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Latitude :</th>
                                        <td><input id="ctn" name="latT" type="number" step="0.01" class="form-control" value="<?php echo $infoTrot['latitude']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Longitude :</th>
                                        <td><input id="ctn" name="longT" type="number" step="0.0001" class="form-control" value="<?php echo $infoTrot['longitude']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Batterie :</th>
                                        <td><input id="ctn" name="batT" type="number" class="form-control" value="<?php echo $infoTrot['battery']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Statut :</th>
                                        <td>
                                            <select class="form-control" name="staT" required>
                                                <option selected><?php print_r($infoTrot['status']); ?></option>

                                                <?php for ($s = 0; $s < $nbStatusSco; $s++) { ?>
                                                    <option>
                                                        <?php echo $statusSco[$s]["name"]; ?>
                                                    </option>
                                                <?php } ?>
                                                
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Date de mise en service :</th>
                                        <td><input id="ctn" name="staT" type="text" class="form-control" value="<?php echo $infoTrot['entry_date']; ?>" disabled></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Prochaine date de maintenance :</th>
                                        <td><input id="ctn" name="nxtST" type="text" class="form-control" value="<?php echo $infoTrot['next_service']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">QR Code :</th>
                                        <td><input id="ctn" name="codeT" type="number" class="form-control" value="<?php echo $infoTrot['auth_code']; ?>"></td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-auto">
                                <input type="submit" class="btn btn-success" name="formModifyT" value="Modifier">
                            </div>
                            <div class="col-md-auto">
                                <a href="javascript:history.back()" class="btn btn-danger right">Annuler</a>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

</body>

</html>