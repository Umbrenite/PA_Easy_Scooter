<?php
$pageTitle = "Ajout d'une trotinette";

// PARTIE KEY DE CONFIRMATION 
$fqrcode = 0;
for ($i = 1; $i < 9; $i++) {
    $fqrcode .= mt_rand(0, 9);
}

$date_now = new DateTime();
$date_now->setTimezone(new DateTimeZone('Europe/Paris'));

$date_service = new DateTime();
$date_service->setTimezone(new DateTimeZone('Europe/Paris'))->modify('+7 day');

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

// PARTIE RECUP INFO USERS
$requsr = $bdd->prepare('SELECT id, firstname, lastname FROM iw22_user');
$requsr->execute();
$infoUser = $requsr->fetchall();
$nbUsers = count($infoUser);

// PARTIE RECUP INFO STATUT TROT
$reqstat = $bdd->prepare('SELECT id, name FROM iw22_scooter_status');
$reqstat->execute();
$statTrot = $reqstat->fetchall();
$nbStatTrot = count($statTrot);

if (isset($_POST['formCreateT'])) {

    if ($_POST['idUT'] == "none") {
        $idUT = null;
    } else {
        $idUT = intval($_POST['idUT']);
    }

    $latitude = floatval($_POST['latitude']);
    $longitude = floatval($_POST['longitude']);
    $battery = intval($_POST['battery']);
    $status = htmlspecialchars($_POST['status']);
    $qrcode = intval($_POST['qrcode']);
    $servicedate = $_POST['servicedate'];

    if (
        empty($latitude) ||
        empty($longitude) ||
        empty($battery) ||
        empty($status) ||
        !is_float($latitude) ||
        !is_float($longitude) ||
        !is_int($battery) ||
        !is_int($qrcode) ||
        !preg_match('/^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$/', $servicedate) ||
        $status == "Sélectionner un statut..."
    ) $msgerror = "Erreur d'une ou plusieurs entrées";

    if (empty($msgerror)) {
        $req = $bdd->prepare('INSERT INTO iw22_scooter (id_user, latitude, longitude, battery, status, entry_date, next_service, auth_code) VALUES (:id_user, :latitude, :longitude, :battery, :status, :entry_date, :next_service, :auth_code)');
        $req->execute(array(
            'id_user' => $idUT,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'battery' => $battery,
            'status' => $status,
            'entry_date' => $date_now->format('Y-m-d'),
            'next_service' => $servicedate,
            'auth_code' => $qrcode
        ));
        textalertwredirect("Trotinette ajoutée", "admin_list_scooter.php");
    }
}

require($_SERVER['DOCUMENT_ROOT'] . '/struct/head.php');
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

                <div class="row pl-3">
                    <div class="col pl-5 pb-5 pt-4">
                        <span class="title pt-3 textcolor px-5"><?php echo $pageTitle ?></span>
                    </div>
                    <div class="col pt-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
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
                                    <label class="textcolor">Utilisateur de la trotinette</label>
                                    <select class="form-control" name="idUT" required>

                                        <option value="none" selected>
                                            vide (défaut)
                                        </option>

                                        <?php for ($u = 0; $u < $nbUsers; $u++) { ?>
                                            <option value="<?php echo $infoUser[$u]["id"]; ?>">
                                                <?php echo ($infoUser[$u]["firstname"] . " " . $infoUser[$u]["lastname"]); ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Latitude</label>
                                    <input type="number" step="0.01" name="latitude" class="form-control" placeholder="00.00" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Longitude</label>
                                    <input type="number" step="0.0001" name="longitude" class="form-control" placeholder="0.0000" required="required">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Batterie</label>
                                    <input type="number" name="battery" min="1" max="100" value="100" class="form-control" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Statut</label>
                                    <select name="status" class="form-control" required>

                                        <option value="" selected>Sélectionner un statut...</option>

                                        <?php for ($s = 0; $s < $nbStatTrot; $s++) { ?>
                                            <option value="<?php echo $statTrot[$s]["name"]; ?>">
                                                <?php echo $statTrot[$s]["name"]; ?>
                                            </option>
                                        <?php } ?>

                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputCity" class="textcolor">QR Code</label>
                                    <input type="number" name="qrcode" value="<?php echo $fqrcode ?>" class="form-control" required="required">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Date d'entrée</label>
                                    <input type="text" name="entrydate" class="form-control" value="<?php echo ($date_now->format("Y-m-d")); ?>" required="required" disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Date de prochaine maintenance</label>
                                    <input type="text" name="servicedate" class="form-control" value="<?php echo ($date_service->format("Y-m-d")); ?>" required="required">
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-auto">
                                    <input type="submit" class="btn btn-success" name="formCreateT" value="Ajouter">
                                </div>
                                <div class="col-md-auto">
                                    <a href="javascript:history.back()" class="btn btn-danger right">Annuler</a>
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