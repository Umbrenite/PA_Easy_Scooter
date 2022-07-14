<?php
$pageTitle = "Forfaits";
session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');

// PARTIE AFFICHAGE LISTE ACCESSOIRES
$accessories = $bdd->prepare("SELECT * FROM iw22_package");
$accessories->execute();
$resultAcc = $accessories->fetchAll();
$nbAcc = count($resultAcc);


include "struct/head.php";
?>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/catalog.css">
<?php
include "struct/header.php";
?>


<body class="bgfontdark">

    <div class="px-5">
        <div class="pt-5 px-5">
            <div class="pt-5 px-5">
                <div class="pt-5">
                    <div class="row">
                        <div class="col">
                            <?php for ($t = 0; $t < $nbAcc; $t++) { ?>
                                <?php if (($t + 1) % 3 == 1) {
                                    echo ('<div class="row px-5 py-4">');
                                } ?>
                                <div class="col-4 rounded">
                                    <div class="center"><img class="rounded" src="img/<?php print_r(strtolower($resultAcc[$t]["name"])); ?>.jpg" alt="Card image cap"></div>
                                    <div class="overlay">
                                        <!-- Overlay quand on passe en hover sur un des articles du catalogue -->

                                        <div class="row">
                                            <div class="title text-white pl-5"><u><?php print_r($resultAcc[$t]["name"]); ?></u></div>
                                        </div>

                                        <div class="row">
                                            <div class="pl-5 pt-3">
                                                <div class="text pl-5 d-flex align-items-start"><?php print_r($resultAcc[$t]["price"]); ?>€</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="pl-5">
                                                <a href="offer_details.php?name=<?php print_r($resultAcc[$t]["name"]); ?>"><button type="button" class="btn btn-success">Consulter</button></a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <?php if (($t + 1) % 3 == 0) {
                                    echo ('</div>');
                                } ?>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>