<?php 
$pageTitle = "Détails du forfait";
require "struct/head.php";
require "database/database.php";

$offer = $bdd->prepare("SELECT * FROM iw22_package WHERE name = ?");
$offer->execute(array($_GET['name']));
$resultOffer = $offer->fetchAll();
?>

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bgfontdark">

  <?php require "struct/header.php" ?>

  <div class="container pt-5">
      <div class="textcolor title pt-5">Détail du forfait</div>
      <hr>

    <div class="rounded py-5">
        <div class="row pl-4">
          <div class="col bgfontblack rounded center py-2"><img class="rounded" src="img/<?php print_r(strtolower($resultOffer[0]["name"])); ?>.jpg"></img></div>
          <div class="col bg-light rounded py-4">
          <div class="pl-3"><a href="index.php#offers"><i class="fa-solid fa-arrow-left pt-3 pr-2"></i>Retour aux offres</a></div>
            <div class="text-muted pl-3 pt-3">Forfait</div>
            <b><div class="title pl-3 pb-2"><?php echo($resultOffer[0]["name"]) ?></div></b>
            <div class="title pl-3 pb-2"><?php print_r($resultOffer[0]["price"]); ?>€</div>
            <div class="col">
                <i class="text-muted">En achetant cet abonnement, vous gagnerez <?php print_r($resultOffer[0]["points_offer"]); ?> points ! </i>
            </div>

            <div class="col">
                <?php print_r($resultOffer[0]["description"]); ?>
            </div>

            <div class="row pt-5">
                <div class="col center">
                    <a href="shopping_cart.php?added_obj=<?php echo($resultOffer[0]['name']);?>"><button type="button" class="btn btn-success">Ajouter au panier</button>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>

</body>