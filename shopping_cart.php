<?php 
$pageTitle = "Mon Panier";
require "struct/head.php";
require "database/database.php";
$accessories = $bdd->prepare("SELECT * FROM iw22_accessory WHERE name = ?");
$accessories->execute(array($_GET['added_obj']));
$resultAcc = $accessories->fetchAll();
$nbAcc = count($resultAcc);


$offers = $bdd->prepare("SELECT * FROM iw22_package WHERE name = ?");
$offers->execute(array($_GET['added_obj']));
$resultOff = $offers->fetchAll();
$nbOff = count($resultOff);
?>

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bgfontdark">

  <?php include "struct/header.php" ?>

  <div class="container pt-5">
      <div class="textcolor title py-5">Mon panier</div>
        <div class="row bgfontblack text-white rounded pt-4">
            <div class="col-6 pl-5">Produit</div>
            <div class="col">Quantité</div>
            <div class="col">Prix Unitaire</div>
            <div class="col">Prix total</div>
            <div class="col">Couleur</div>

            <div class="col-12"><hr class="bgfontgreen"></div>

            <?php if($resultAcc != null) {?>
            <div class="col-2 pl-5">
            <img class="" src="./img/<?php print_r(strtolower($resultAcc[0]["name"])); ?>.png"></img>
            </div>
            <div class="col-4">
            <div class="col"><b><?php echo($resultAcc[0]['name']);?></b></div>
            <div class="col"><?php echo($resultAcc[0]['description']);?></div>
            </div>

            <div class="col">1</div>
            <div class="col"><?php echo($resultAcc[0]['price']);?></div>
            <div class="col"><?php echo(($resultAcc[0]['price'])*1);?></div>
            <div class="col">Rouge</div>
            <?php } ?>

            <?php if($resultOff != null) {?>
            <div class="col-2 pl-5">
            <img class="" src="./img/<?php print_r(strtolower($resultOff[0]["name"])); ?>.jpg"></img>
            </div>
            <div class="col-4">
            <div class="col"><b><?php echo($resultOff[0]['name']);?></b></div>
            <div class="col"><?php echo($resultOff[0]['description']);?></div>
            </div>

            <div class="col">1</div>
            <div class="col"><?php echo($resultOff[0]['price']);?></div>
            <div class="col"><?php echo(($resultOff[0]['price'])*1);?></div>
            <div class="col"></div>
            <?php } ?>

            <div class="col-12"><hr class="bgfontgreen"></div>

        </div>

        <div class="col center py-5">
        <?php if($resultAcc != null) {?><a href="/create-checkout-session.php?buy=<?php echo($resultAcc[0]['name']);?>"><button type="submit" id="checkout-button" class="btn btn-success">Passer commande</button></a><?php } ?>
        <?php if($resultOff != null) {?><a href="/create-checkout-session.php?buy=<?php echo($resultOff[0]['name']);?>"><button type="submit" id="checkout-button" class="btn btn-success">Passer commande</button></a><?php } ?>
        <a href="catalog.php"><button type="submit" id="checkout-button" class="btn btn-success">Consulter le catalogue</button></a>
        </div>
</div>