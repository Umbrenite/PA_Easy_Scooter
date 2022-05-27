<?php 
$pageTitle = "Mon Panier";
include "struct/head.php" 
?>

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bgfontdark">

  <?php include "struct/header.php" ?>

  <div class="container pt-5">
      <div class="textcolor title pt-5">Mon panier</div>

        <div class="row bgfontblack text-white rounded pt-4">
            <div class="col-6">Produit</div>
            <div class="col">Quantité</div>
            <div class="col">Prix Unitaire</div>
            <div class="col">Prix total</div>
            <div class="col-12"><hr class="bgfontgreen"></div>

            <div class="col-2">
            <img class="" src="./img/casque.png"></img>
            </div>
            <div class="col-4">
            <div class="col"><b>Casque de protection</b></div>
            <div class="col">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Voluptatum laboriosam doloribus repellat iure sunt odit autem tempore ullam, a nisi nemo accusamus obcaecati blanditiis pariatur vero quod ducimus. Repellat, nihil.</div>
            </div>

            <div class="col">2</div>
            <div class="col">15</div>
            <div class="col">30</div>
            <div class="col-12"><hr class="bgfontgreen"></div>

        </div>

        <div class="col center py-5"><a href="index.php"><button type="button" class="btn btn-success">Passer commande</button></div>

</div>