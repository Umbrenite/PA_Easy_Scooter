<!--
<link rel="stylesheet" href="css/style.css">

<body class="bgfontdark textcolor">
<p>
  We appreciate your business! If you have any questions, please email
  <a href="mailto:orders@example.com">orders@example.com</a>.
</p>
<a href="/">
  Revenir à la page principale
  </a>
  <a href="/bill.php">
  Consulter votre facture
  </a>
</body> -->
<?php 
$pageTitle = "Achat réussi !";
require "struct/head.php";
?>

<link rel="stylesheet" href="css/style.css">
</head>
<body class="bgfontdark">

  <?php include "struct/header.php" ?>

  <div class="container pt-5">
      <div class="textcolor title py-5">Achat réussi !</div>
        <div class="row bgfontblack text-white rounded pt-4">
          <div class="col-12"><hr class="bgfontgreen"></div>

          <div class="col-12 center">
            <b>Vous avez réussi votre achat chez Électrot ! Félicitations !<br><br></b>
          </div>

          <div class="col">
            <b>Prochaines étapes :
            <il>
              <li>Consulter votre facture ou revenir au menu principal<br>
              <li>Regarder sur la carte des trottinettes disponibles afin de repérer la trottinette la plus proche de chez vous<br>
              <li>Profiter de votre voyage !<br>
            </b>
          </div>

          
          
          <div class="col-12"><hr class="bgfontgreen"></div>

        </div>

        <div class="col center py-5">
        <a href="index.php"><button type="submit" id="checkout-button" class="btn btn-success">Retour à la page principale</button></a>
        <a href="bill.php"><button type="submit" id="checkout-button" class="btn btn-success">Consulter votre facture</button></a>
        </div>
</div>