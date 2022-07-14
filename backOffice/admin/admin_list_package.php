<?php
$pageTitle = "Liste des forfaits";

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');

// PARTIE AFFICHAGE LISTE CLIENTS
$pkgs = $bdd->prepare("SELECT * FROM iw22_package");
$pkgs->execute();
$resultPkgs = $pkgs->fetchAll();
$nbPkgs = count($resultPkgs);

require "../../struct/head.php";
?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<?php include "admin_leftmenu.php" ?>

<body class="bgfontdark">

    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">

                <div class="row pt-3 pl-3">
                    <div class="col pl-5 pb-5 pt-3">
                        <span class="title pt-3 textcolor px-5">
                            <?php echo $pageTitle; ?>
                        </span>
                    </div>
                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item">
                                    <a href="admin_dashboard.php">Dashboard</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="pl-5">
                    <form action="" class="my-4">
                        <div class="row justify-content-end">
                            <div class="col-md-auto">
                                <a href="createPackage.php" class="btn btn-success right">Créer forfait</a>
                            </div>
                        </div>
                    </form>
                    <div class="col">
                        <table>

                            <tr>
                                <th class="table_font_1 textcolor center px-2"></th>
                                <th class="table_font_1 textcolor center px-2"></th>
                                <th class="table_border table_font_1 textcolor center px-5">ID</th>
                                <th class="table_border table_font_1 textcolor center px-5">Nom</th>
                                <th class="table_border table_font_1 textcolor center px-5">Description</th>
                                <th class="table_border table_font_1 textcolor center px-5">Prix de déblocage</th>
                                <th class="table_border table_font_1 textcolor center px-5">Prix</th>
                                <th class="table_border table_font_1 textcolor center px-5">Type de paiement</th>
                                <th class="table_border table_font_1 textcolor center px-5">Limite d'utilisation par jour</th>
                                <th class="table_border table_font_1 textcolor center px-5">Durée limite d'un trajet</th>
                                <th class="table_border table_font_1 textcolor center px-5">Trajet ajouté</th>
                            </tr>

                            <?php for ($p = 0; $p < $nbPkgs; $p++) { ?>
                                <tr>
                                    <td id="mod" class="table_border_bottom table_font_2 center text-white"><a class="btn btn-warning"><i class='bx bx-wrench'></i></a></td>
                                    <td id="del" class="table_font_2 center text-white"><a class="btn btn-danger" href="../../delete.php?idpkg=<?php echo ($resultPkgs[$p]['id']); ?>"><i class='bx bx-trash'></i></a></td>
                                    <td id="lgn" class="table_border table_font_2 center py-2 text-white"><?php print_r($resultPkgs[$p]["id"]); ?></th>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultPkgs[$p]["name"]); ?></th>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultPkgs[$p]["description"]); ?></th>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultPkgs[$p]["unlock_price"] . " €"); ?></th>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultPkgs[$p]["price"] . " €"); ?></th>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultPkgs[$p]["payment_type"]); ?></th>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php if ($resultPkgs[$p]["day_utilisation_limit"] != null) print_r($resultPkgs[$p]["day_utilisation_limit"] . " min"); ?></th>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php if ($resultPkgs[$p]["race_time_limit"] != null) print_r($resultPkgs[$p]["race_time_limit"] . " min"); ?></th>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultPkgs[$p]["race_add"]); ?></th>
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