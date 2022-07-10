<?php
$pageTitle = "Home";
session_start();
require "struct/head.php";
?>

<link rel="stylesheet" href="css/style.css">
<?php include "3cx.php" ?>
</head>

<body class="bgfontblack resize">

  <div class="loader">
    <span class="lettre">C</span>
    <span class="lettre">H</span>
    <span class="lettre">A</span>
    <span class="lettre">R</span>
    <span class="lettre">G</span>
    <span class="lettre">E</span>
    <span class="lettre">M</span>
    <span class="lettre">E</span>
    <span class="lettre">N</span>
    <span class="lettre">T</span>
  </div>

  <?php include "struct/header.php" ?>

  <main>

    <section id="image" class="py-5 reveal">

      <img src="img/front_img.jpg" class="d-inline-block align-top blur_bg centered" alt="">

      <div class="container">
        <img src="img/front_img.jpg" class="d-inline-block align-top align-section centered" alt="">
        <div class="title1 text-white front_title">
          <strong>Bienvenue</strong>
        </div>
        <div class="title2 text-white title">
          <strong>chez</strong>
        </div>
        <div class="title3 text-white front_title">
          <strong>Electrot</strong>
        </div>
        <div class="subtitle_front title text-white center">
          <i>Voyagez libre comme l'air</i>
        </div>
      </div>

    </section>


    <section id="offers" class="reveal pt-5">
      <div class="container-fluid px-5 pt-5">
        <div class="row px-5 pt-5">

          <div class="col pl-4 vertical_center">

            <h2 class="textcolor pb-4 pl-2">Nos forfaits</h2>

            <div class="col-8 textcolor front_subtitle">
              Consultez notre catalogue de forfaits afin de découvrir celui qui vous conviendra le mieux !
            </div>

            <?php if (!isset($_SESSION['id'])) { ?>
              <div class="col pt-4">
                <p class="textcolor">Vous devez être connecté afin d'accéder au catalogue des forfaits !</p>
              </div>
            <?php }

            if (isset($_SESSION['id'])) { ?>
              <div class="col pt-4"><a href="catalog.php"><button class="btn btn-success textdark front_subtitle rounded">Consulter le catalogue</button></a></div>
            <?php } ?>

          </div>

          <div class="col acc_img_resize">
            <a href="object_details.php">
              <img class="card-img-top rounded" src="./img/accessory-catalog.jpeg">
            </a>
          </div>

        </div>
      </div>
    </section>


    <section id="accessories" class="reveal pt-5">
      <div class="container-fluid px-5 pt-5">
        <div class="row px-5 pt-5">

          <div class="col acc_img_resize">
            <a href="object_details.php">
              <img class="card-img-top rounded" src="./img/accessoires.PNG">
            </a>
          </div>

          <div class="col pl-4 vertical_center">

            <h2 class="textcolor pb-4 pl-2">Nos accessoires</h2>

            <div class="col-8 textcolor front_subtitle">
              Consultez notre catalogue d'accessoires pour voyager en toute sécurité !
            </div>

            <?php if (!isset($_SESSION['id'])) { ?>
              <div class="col pt-4">
                <p class="textcolor">Vous devez être connecté afin d'accéder au catalogue !</p>
              </div>
            <?php }

            if (isset($_SESSION['id'])) { ?>
              <div class="col pt-4">
                <a href="catalog.php">
                  <button class="btn btn-success textdark front_subtitle rounded">Consulter le catalogue</button>
                </a>
              </div>
            <?php } ?>

          </div>

        </div>
      </div>
    </section>


    <div id="about">
      <br />
      <br />
      <div class="row px-5 py-5 border_bottom">

        <div class="col border_col_left border_col_right">
          <div class="card bgfontblack">
            <img class="card-img-top rounded" src="./img/about_img1.png" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title textcolor">Prise en mains facilitée</h2>
              <i>
                <p class="card-text textcolor pb-4">Lorem ipsum</p>
              </i>
            </div>
          </div>
        </div>

        <div class="col border_col_left border_col_right">
          <div class="card bgfontblack">
            <img class="card-img-top rounded" src="./img/about_img2.png" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title textcolor">Service client qualitatif</h2>
              <i>
                <p class="card-text textcolor pb-4">Lorem ipsum.</p>
              </i>
            </div>
          </div>
        </div>

        <div class="col border_col_left border_col_right">
          <div class="card bgfontblack">
            <img class="card-img-top rounded" src="./img/about_img3.jpg" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title textcolor">Clientèle satisfaite</h2>
              <i>
                <p class="card-text textcolor pb-4">Lorem Ipsum.</p>
              </i>
            </div>
          </div>
        </div>

        <div class="col border_col_left border_col_right">
          <div class="card bgfontblack">
            <img class="card-img-top rounded" src="./img/about_img4.png" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title textcolor">Pour votre sécurité</h2>
              <i>
                <p class="card-text textcolor pb-4">Lorem ipsum.</p>
              </i>
            </div>
          </div>
        </div>

      </div>
    </div>

  </main>

  <?php include "struct/footer/footer.php" ?>

</body>

<script src="backOffice/JS/loader.js"></script>

</html>