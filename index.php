<!DOCTYPE html>
<html>

<?php 
$pageTitle = "Home";
require "struct/head.php";
require($_SERVER['DOCUMENT_ROOT'].'/database/database.php');
$packages = $bdd->prepare("SELECT * FROM iw22_package WHERE id >= 1");
$packages->execute();
$resultPacks = $packages->fetchAll();
$nbPacks = count($resultPacks);
?>
<link rel="stylesheet" href="css/style.css">

</head>
<body class="bgfontblack">

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

      <div id="language" class="dropdown language_pos">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <img src="img/france-.png" width="20" height="20" class="d-inline-block align-top" alt="">
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="#"><img src="img/USA.png" width="20" height="20" alt=""> - Anglais</a>
        </div>
      </div>
  
    <section id="image" class="py-5 reveal">
    <img src="img/front_img.jpg" class="d-inline-block align-top blur_bg centered" alt="">
      <div class="container">
      <img src="img/front_img.jpg" class="d-inline-block align-top align-section centered" alt="">
      <div class="title1 text-white front_title"><strong>Bienvenue<br></strong></div>
      <div class="title2 text-white title"><strong>chez</strong></div>
      <div class="title3 text-white front_title"><strong>Electrot</strong></div>

      <div class="subtitle_front text-white center"><i>Voyagez libre comme l'air</i></div>
      </div>
    </section>

    <section id="offers" class="reveal">
        <div class="pb-5 pt-5">
        
          <div class="center pt-5">
          <h4><i class="textcolor pt-5 pb-2">Trajets</i></h4>
          <h1 class="textcolor pb-2">Nous vous proposons</h1>
          </div>
          <!-- <div class="row py-3 px-5"> -->



          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <?php for ($t = 1; $t < $nbPacks; $t++) { ?>
              <li data-target="#carouselExampleIndicators" data-slide-to="<?php print_r($resultPacks[$t]["id"]); ?>"></li>
              <?php } ?>
              <!-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
            </ol>
            <div class="carousel-inner pt-5">
            <?php for ($t = 1; $t < $nbPacks; $t++) { ?>

              <?php if($t == 1) {?>
              <div class="carousel-item active">
              <a href='offer_details.php?name=<?php print_r($resultPacks[$t-1]["name"]); ?>'><img class="d-flex justify-content-center" src="img/<?php print_r(strtolower(str_replace(' ','',$resultPacks[$t-1]["name"]))); ?>.jpg" width="40%"></a>
                <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo($resultPacks[$t-1]["name"]); ?></h5>
                  <p><?php echo($resultPacks[$t-1]["description"]); ?></p>
                </div>
              </div>
              <?php } ?>
              
              <div class="carousel-item">
                <a href='offer_details.php?name=<?php print_r($resultPacks[$t]["name"]); ?>'><img class="d-flex justify-content-center" src="img/<?php print_r(strtolower(str_replace(' ','',$resultPacks[$t]["name"]))); ?>.jpg" width="40%"></a>
                <div class="carousel-caption d-none d-md-block">
                  <h5><?php echo($resultPacks[$t]["name"]); ?></h5>
                  <p><?php echo($resultPacks[$t]["description"]); ?></p>
                </div>
              </div>
              <?php } ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>


            <!-- <div class="col border_col_left border_col_right">
              <div class="card bgfontblack">
                <img class="card-img-top rounded" src="./img/slow.jpg" alt="Card image cap" height="500">
                <div class="card-body">
                  <h2 class="card-title textcolor">Forfait Slow</h2>
                  <i>
                    <p class="card-text textcolor pb-4">Pour les adeptes dont l'expérience n'est plus à prouver</p>
                  </i>
                  <a href="offer_details.php?name=Slow" class="btn btn-success">Plus de détails sur cette offre</a>
                </div>
              </div>
            </div>


            <div class="col border_col_right">
              <div class="card bgfontblack">
                <img class="card-img-top rounded" src="./img/speed.jpg" alt="Card image cap" height="500">
                <div class="card-body">
                  <h2 class="card-title textcolor">Forfait Speed</h2>
                  <i>
                    <p class="card-text textcolor pb-4">Pour les experts dont les figures n'effraient plus</p>
                  </i>
                  <a href="offer_details.php?name=Speed" class="btn btn-success">Plus de détails sur cette offre</a>
                </div>
              </div>
            </div> -->

          <!-- </div> -->

        </div>
    </section>

    <section id="accessories" class="reveal pt-5">
    <div class="container-fluid px-5 pt-5">
      <div class="row px-5 pt-5">
        <div class="col"><a href="object_details.php"><img class="card-img-top rounded" src="./img/accessory-catalog.jpeg"></a></div>

        <div class="col pl-4 vertical_center">
          <h2 class="textcolor pb-4">Notre catalogue d'accessoires</h2>
          <div class="col-8 textcolor front_subtitle">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Voluptate, laudantium quae veritatis laboriosam debitis voluptatem itaque harum ex labore nesciunt deserunt quisquam cupiditate sapiente consequuntur animi dolore molestias illo sint.
          </div>

          <div class="col pt-4"><a href ="catalog.php"><button class="btn btn-success textdark front_subtitle rounded">Consulter le catalogue</button></a></div>

          </div>
        </div>
      </div>
    </div>
    </section>


    <section id="about" class="reveal border_bottom pt-5">

    <div class="row px-5 pt-5">
      <div class="col-3 border_col_left">
        <div class="card bgfontblack" style="width: 30rem;">
          <img class="card-img-top rounded" src="./img/about_img1.png" alt="Card image cap" height="500">
          <div class="card-body">
            <h2 class="card-title textcolor">Prise en mains facilitée</h2>
            <i>
              <p class="card-text textcolor pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, dolorum quod atque voluptates harum quam soluta, ex hic in veritatis provident reprehenderit expedita magni porro. Tenetur deleniti vitae quasi placeat.</p>
            </i>
          </div>
        </div>
      </div>

      <div class="col-3 border_col_left">
        <div class="card bgfontblack" style="width: 30rem;">
          <img class="card-img-top rounded" src="./img/about_img2.png" alt="Card image cap" height="500">
          <div class="card-body">
            <h2 class="card-title textcolor">Service client qualitatif</h2>
            <i>
              <p class="card-text textcolor pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, dolorum quod atque voluptates harum quam soluta, ex hic in veritatis provident reprehenderit expedita magni porro. Tenetur deleniti vitae quasi placeat.</p>
            </i>
          </div>
        </div>
      </div>

      <div class="col-3 border_col_left">
        <div class="card bgfontblack" style="width: 30rem;">
          <img class="card-img-top rounded" src="./img/about_img3.jpg" alt="Card image cap" height="500">
          <div class="card-body">
            <h2 class="card-title textcolor">Clientèle satisfaite</h2>
            <i>
              <p class="card-text textcolor pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, dolorum quod atque voluptates harum quam soluta, ex hic in veritatis provident reprehenderit expedita magni porro. Tenetur deleniti vitae quasi placeat.</p>
            </i>
          </div>
        </div>
      </div>

      <div class="col-3 border_col_left border_col_right">
        <div class="card bgfontblack" style="width: 30rem;">
          <img class="card-img-top rounded" src="./img/about_img4.png" alt="Card image cap" height="500">
          <div class="card-body">
            <h2 class="card-title textcolor">Pour votre sécurité</h2>
            <i>
              <p class="card-text textcolor pb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, dolorum quod atque voluptates harum quam soluta, ex hic in veritatis provident reprehenderit expedita magni porro. Tenetur deleniti vitae quasi placeat.</p>
            </i>
          </div>
        </div>
      </div>
    </div>
    </section>

    
    <?php include "struct/footer/footer.php" ?>
  </main>
</body>

<script src = "backOffice/JS/loader.js"></script>

</html>