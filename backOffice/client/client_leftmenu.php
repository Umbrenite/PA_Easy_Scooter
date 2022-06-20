<?php include "../../struct/head.php" ?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">

<div id="sidenav" class="sidenav dashboard_text_color">
<span class="pl-3"><?php echo ($_SESSION['role']); ?></span>
    <hr>
    <b><span class="pl-3"><?php echo ($_SESSION['firstname'] . " " . $_SESSION['lastname']); ?></span></b>
    <hr>

    <a href="client_dashboard.php?id=<?php echo($_SESSION['id']);?>"><button class="btn btn-lg btn-block px-3"><span class="dashboard_text_color ">Mon dashboard</span></button></a>
    <div class="col">
    <a href="../../catalog.php?id=<?php echo($_SESSION['id']);?>"><button class="btn bgfontgreen btn-block px-3"><span class="text-white center">Commander</span></button></a>

    </div>


    <div class="col pt-4"><span class="subtitle">Mes données</span></div>

    <button class="dropdown-btn px-3 pb-1"><span>Paiements</span>
    <i name="icon3" class="right fa-solid fa-angle-left pt-2"></i>
    </button>
    <div class="dropdown-container px-5">
        <a href="client_paid.php?id=<?php echo($_SESSION['id']);?>"><span class="subtitle">Effectués</span></a>
        <a href="client_still_pay.php?id=<?php echo($_SESSION['id']);?>"><span class="subtitle">En cours</span></a>
    </div>

    <a href="client_profil.php?id=<?php echo($_SESSION['id']);?>"><button class="btn btn-lg btn-block px-3"><span class="dashboard_text_color left">Profil</span></button></a>
    <a href="client_scooter_gestion.php?id=<?php echo($_SESSION['id']);?>"><button class="btn btn-lg btn-block px-3"><span class="dashboard_text_color left">Map</span></button></a>

    <hr>

    <div class="col">
    <a href="../../../logout.php"><button class="btn bg-danger btn-block px-3"><span class="text-white center">Se déconnecter</span></button></a>
    </div>
</div>
    
</div>
<script src="../JS/dropdown.js"></script>