<?php
  session_start();
  require "functions.php";
?>


<section id="navbar">

    <nav class="navbar navbar-expand-lg align-self-center border_bottom IBM bgfontblack">

        <a class="navbar-brand nav-item" href="#">
            <img src="img/logo.png" width="50" height="50" class="d-inline-block align-self-center" alt="">
            Electrot
        </a>

        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

            <div class="navbar-nav">
                <a class="nav-item nav-link active pl-4" href="./index.php">Accueil <span class="sr-only">(current)</span></a>
                <a class="nav-item nav-link pl-4" href="./index.php#about">Pourquoi Easy Scooter ?</a>
                <a class="nav-item nav-link pl-4" href="./index.php#offers">Nos abonnements</a>
                <a class="nav-item nav-link pl-4" href="./index.php#accessories">Nos accessoires</a>
            </div>

            <div class="col right_ask">
                <div class="align-self-center">
                    <div class=".ml-md-auto padding">

                        <?php if (!isConnected()) : ?>
                            <a href="newaccount.php" class="btn btn-success mr-5">
                                <i class="fa-regular fa-plus"></i>&nbsp;Inscription
                            </a>

                        <a href="login.php" class="btn btn-success">
                            <i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;Connexion
                        </a>
                        <?php endif; ?>

                        <?php if (isConnected()) : ?>
                            <a href="login.php" class="btn btn-success">
                                <i class="fa-regular fa-plus"></i>&nbsp;Accès à votre panel
                            </a>
                            <a href="index.php" class="btn btn-success">
                                <i class="fa-regular fa-plus"></i>&nbsp;Se déconnecter
                                <?php session_destroy();?>
                            </a>
                        <?php endif; ?>

                    </div>
                </div>
            </div>

        </div>

    </nav>

</section>