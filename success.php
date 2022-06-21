<?php 
session_start();
$pageTitle = "Achat réussi !";
require "struct/head.php";
require($_SERVER['DOCUMENT_ROOT'].'/database/database.php');

if (!isset($_SESSION['id']) || $_GET['selected_item'] == null || isset($accName) || isset($packName)) {
  header("Location: ../../index.php");
  exit();
}

$accessories = $bdd->prepare("SELECT * FROM iw22_accessory WHERE name = ?");
$accessories->execute(array($_GET['selected_item']));
$resultAcc = $accessories->fetchAll();


$packages = $bdd->prepare("SELECT * FROM iw22_package WHERE name = ?");
$packages->execute(array($_GET['selected_item']));
$resultPacks = $packages->fetchAll();

?>

<?php if($resultAcc != null) {
  $accName = $resultAcc[0]['name'];
  $add_acc = $bdd->prepare('INSERT INTO iw22_bill (status,user_id,product) VALUES ("Payée", "'.$_SESSION['id'].'", "'.$accName.'")');
  $add_acc->execute();
} ?>

<?php if($resultPacks != null) {
  $packName = $resultPacks[0]['name'];
  $add_pack = $bdd->prepare('INSERT INTO iw22_bill (status,user_id,product) VALUES ("Payée", "'.$_SESSION['id'].'", "'.$packName.'")');
  $add_pack->execute();
} ?>




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
            <p class="text-muted"><i>Pour consulter votre facture, rendez-vous dans votre espace dédié en cliquant sur "Panel client" ci-dessus!</i></p>
          </div>

          <div class="col-12"><hr class="bgfontgreen"></div>

        </div>

      <div class="col center py-5">
        <a href="index.php"><button type="submit" id="checkout-button" class="btn btn-success">Retour à la page principale</button></a>
      </div>
    </div>
  </div>
