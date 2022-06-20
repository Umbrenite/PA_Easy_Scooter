<?php 
$pageTitle = "Détails du forfait";
session_start();
require "struct/head.php";
require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');

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
          <div class="col bgfontblack rounded center py-2"><img class="rounded" src="img/<?php print_r(strtolower(str_replace(' ','',$resultOffer[0]["name"]))); ?>.jpg"></img></div>
          <div class="col bg-light rounded py-4">
          <div class="pl-3"><a href="index.php#offers"><i class="fa-solid fa-arrow-left pt-3 pr-2"></i>Retour aux offres</a></div>
            <div class="text-muted pl-3 pt-3">Forfait</div>
            <b><div class="title pl-3 pb-2"><?php echo($resultOffer[0]["name"]) ?></div></b>
            <div class="title pl-3 pb-2"><?php print_r($resultOffer[0]["price"]); ?>€</div>


            <div class="col">
                <?php print_r($resultOffer[0]["description"]); ?>
            </div>

            <div class="row pt-5">
              <?php if (!isset($_SESSION['id'])) { ?>
                <div class="col pt-4"><p class="textcolor center">Vous devez vous connecter pour pouvoir ajouter un produit au panier !</p></div>
              <?php }
              if (isset($_SESSION['id'])) { ?>
                <div class="col center">
                    <a href="shopping_cart.php?added_obj=<?php echo($resultOffer[0]['name']);?>"><button type="button" class="btn btn-success">Ajouter au panier</button>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
    </div>
  </div>

</body>