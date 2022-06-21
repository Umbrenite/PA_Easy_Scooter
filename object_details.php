<?php 
$pageTitle = "Détails d'un objet";
session_start();
require "struct/head.php";
require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');

$accessories = $bdd->prepare("SELECT * FROM iw22_accessory WHERE name = ?");
$accessories->execute(array($_GET[object]));
$resultAcc = $accessories->fetchAll();
$nbAcc = count($resultAcc);
?>

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bgfontdark">

  <?php require "struct/header.php" ?>

  <div class="container pt-5">
      <div class="textcolor title pt-5">Détail de l'objet</div>
      <hr>

    <div class="rounded py-5">
        <div class="row pl-4">
          <div class="col bgfontblack rounded center py-2"><img class="" src="img/<?php print_r(strtolower($resultAcc[0]["name"])); ?>.png" width='600'></img></div>
          <div class="col bg-light rounded py-4">
          <div class="pl-3"><a href="catalog.php"><i class="fa-solid fa-arrow-left pt-3 pr-2"></i>Retour au catalogue</a></div>
            <div class="text-muted pl-3 pt-3">Accessoires</div>
            <b><div class="title pl-3 pb-2"><?php echo($_GET['object']); ?></div></b>
            <div class="title pl-3 pb-2"><?php print_r($resultAcc[0]["price"]); ?>€</div>
            <div class="col">
                    <i class="fa fa-star star_color" aria-hidden="true"></i>
                    <i class="fa fa-star star_color" aria-hidden="true"></i>
                    <i class="fa fa-star star_color" aria-hidden="true"></i>
                    <i class="fa fa-star star_color" aria-hidden="true"></i>
                    <i class="fa fa-star star_color pr-3" aria-hidden="true"></i>
                    <?php print_r($resultAcc[0]["ratings"]); ?> - <?php print_r($resultAcc[0]["number_rates"]); ?> évaluations
            </div>

            <div class="col-sm-8 pt-4">
                <b>Selectionnez la taille du produit</b>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn border_dark">XS</button>
                    <button type="button" class="btn border_dark">S</button>
                    <button type="button" class="btn border_dark">M</button>
                    <button type="button" class="btn border_dark">L</button>
                    <button type="button" class="btn border_dark">XL</button>
                </div>
            </div>

            <div class="col pt-4"><b>Selectionnez la couleur</b></div>
            <div class="row">
                <div class="col">
                    <div class="col btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn border_dark">Rouge</button>
                        <button type="button" class="btn border_dark">Noir</button>
                        <button type="button" class="btn border_dark">Gris</button>
                        <button type="button" class="btn border_dark">Marron</button>
                    </div>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-4">
                    <div class="col-8 btn-group" role="group" aria-label="Basic example">
                        <button type="button" class="btn border_dark">-</button>
                        <input label="1" class="center" value="1"></input>
                        <button type="button" class="btn border_dark">+</button>
                    </div>
                </div>
                <div class="col">
                    <a href="shopping_cart.php?added_obj=<?php echo($resultAcc[0]['name']);?>"><button type="button" class="btn btn-success">Ajouter au panier</button>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>

</body>