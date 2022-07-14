<?php
$pageTitle = "Ajout d'un forfait";

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

if (isset($_POST['formCreateP'])) {

    $name = htmlspecialchars($_POST['nameP']);
    $desc = htmlspecialchars($_POST['descP']);
    $pricedeblo = floatval($_POST['deblopP']);
    $price = floatval($_POST['pricefP']);
    $type = htmlspecialchars($_POST['paiementP']);
    $limitutil = floatval($_POST['limitutilP']);
    $limittraj = floatval($_POST['limittrajP']);
    $trajet = intval($_POST['trajaP']);

    if (
        empty($name) ||
        empty($desc) ||
        empty($type) ||
        !is_float($pricedeblo) ||
        !is_float($price) ||
        !is_float($limitutil) ||
        !is_float($limittraj) ||
        !is_int($trajet) ||
        $type == "Sélectionner un type de paiement..."
    ) $msgerror = "Erreur d'une ou plusieurs entrées";

    if (empty($msgerror)) {
        $req = $bdd->prepare('INSERT INTO iw22_package (name, description, unlock_price, price, payment_type, day_utilisation_limit, race_time_limit, race_add) VALUES (:name, :description, :unlock_price, :price, :payment_type, :day_utilisation_limit, :race_time_limit, :race_add)');
        $req->execute(array(
            'name' => $name,
            'description' => $desc,
            'unlock_price' => $pricedeblo,
            'price' => $price,
            'payment_type' => $type,
            'day_utilisation_limit' => $limitutil,
            'race_time_limit' => $limittraj,
            'race_add' => $trajet
        ));
        textalertwredirect("Forfait ajouté", "admin_list_package.php");
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
                                    <label class="textcolor">Nom</label>
                                    <input type="text" name="nameP" class="form-control" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Description</label>
                                    <input type="text" name="descP" class="form-control" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Prix de déblocage</label>
                                    <input type="number" step="0.01" name="deblopP" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Prix du forfait</label>
                                    <input type="number" step="0.01" name="pricefP" class="form-control" required="required">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Type de paiement</label>
                                    <select name="paiementP" class="form-control" required>
                                        <option value="" selected>Sélectionner un type de paiement...</option>
                                        <option>per minute</option>
                                        <option>daily</option>
                                        <option>monthly</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Limite d'utilisation par jour</label>
                                    <input type="number" name="limitutilP" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Durée limite d'un trajet</label>
                                    <input type="number" name="limittrajP" class="form-control">
                                </div>
                                <div class="form-group col-md-4">
                                    <label class="textcolor">Trajet ajouté</label>
                                    <input type="number" name="trajaP" class="form-control">
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-auto">
                                    <input type="submit" class="btn btn-success" name="formCreateP" value="Ajouter">
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