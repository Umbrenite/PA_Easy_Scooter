<?php 
$pageTitle = "Catalogue";
session_start();
require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');

// PARTIE AFFICHAGE LISTE ACCESSOIRES
$accessories = $bdd->prepare("SELECT * FROM iw22_accessory");
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
                <div class="input-group mb-3 rounded">
                    <input type="text" class="bgfontblack textcolor bordercolor form-control py-4" placeholder="Entrez le nom d'un article ici...">
                    <div class="input-group-append">
                        <button class="btn btn-outline-dark bordercolor" type="button"><i class="fa-solid fa-arrow-right"></i></button>
                    </div>
                </div>

                <div class="pt-5">
                    <div class="row">
                        <div class="col-3">
                            <div class="row pb-3"><span class="textcolor">Filtrage</span></div>

                            <div class="row">

                                <div class="col-5">
                                <input type="radio">
                                <label class="textcolor pl-2">Tendances</label>
                                </div>

                                <div class="col">
                                <input type="radio">
                                <label class="textcolor pl-2">Mieux notés</label>
                                </div>
                            </div>

                            <hr>
                            <div class="row pb-1"><span class="textcolor">Type</span></div>
                            <select id="role" name="role" class="form-control">
                                <option selected>Selectionnez..</option>
                                <option>Protection</option>
                                <option>Utilitaire</option>
                            </select>

                            <div class="row pt-4 pb-1"><span class="textcolor">Âge limite</span></div>
                            <select id="role" name="role" class="form-control">
                                <option selected>Selectionnez..</option>
                                <option>9-15 ans</option>
                                <option>15-18 ans</option>
                                <option>18-25 ans</option>
                            </select>

                            <div class="row pt-4 pb-1"><span class="textcolor">Prix</span></div>
                            <select id="role" name="role" class="form-control">
                                <option selected>Selectionnez..</option>
                                <option>5-15e</option>
                                <option>15-30e</option>
                                <option>30-50e</option>
                            </select>

                            <div class="pt-5"><button type="button" class="btn btn-success">Filtrer</button></div>
                        </div>

                        

                        <div class="col">
                        <?php for ($t = 0; $t < $nbAcc; $t++) { ?>
                            <?php if (($t+1)%3 == 1) {echo('<div class="row px-5 py-4">'); } ?>
                                <div class="col-4 rounded">
                                    <div class="center"><img class="rounded" src="img/<?php print_r(strtolower($resultAcc[$t]["name"])); ?>.png" alt="Card image cap"></div>
                                    <div class="overlay"> <!-- Overlay quand on passe en hover sur un des articles du catalogue -->

                                        <div class="row">
                                            <div class="title text-white pl-5"><u><?php print_r($resultAcc[$t]["name"]); ?></u></div>
                                        </div>

                                        <div class="row">
                                            <div class="pl-5 pt-3">
                                                <div class="text pl-5 d-flex align-items-start"><?php print_r($resultAcc[$t]["price"]); ?>€</div>
                                            </div>
                                        </div>

                                        <div class="row pb-4">
                                            <div class="pl-5 text-white"><?php print_r($resultAcc[$t]["ratings"]); ?><i class="fa fa-star px-2" aria-hidden="true"></i>- <?php print_r($resultAcc[$t]["number_rates"]); ?> évaluations</div>
                                        </div>

                                        <div class="row">
                                            <div class="pl-5">
                                                <a href="object_details.php?object=<?php print_r($resultAcc[$t]["name"]); ?>"><button type="button" class="btn btn-success">Consulter</button></a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <?php if (($t+1)%3 == 0) { echo('</div>'); } ?>
                        <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>