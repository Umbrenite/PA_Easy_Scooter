<?php include "../../struct/head.php" ?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">

<div id="sidenav" class="sidenav dashboard_text_color">
    <span class="pl-3">Client</span>
    <hr>
    <b><span class="pl-3">Nom du compte</span></b>
    <hr>

    <a href="client_dashboard.php"><button class="btn btn-lg btn-block px-3"><span class="dashboard_text_color left">Mon dashboard</span></button></a>


    <div class="col pt-4"><span class="subtitle">Mes données</span></div>
    <a href="client_routes_done.php"><button class="btn btn-lg btn-block px-3"><span class="dashboard_text_color left">Trajets effectués</span></button></a>


    <button class="dropdown-btn px-3 pb-1"><span>Paiements</span>
    <i name="icon3" class="right fa-solid fa-angle-left pt-2"></i>
    </button>
    <div class="dropdown-container px-5">
        <a href="client_paid.php"><span class="subtitle">Effectués</span></a>
        <a href="client_still_pay.php"><span class="subtitle">En cours</span></a>
    </div>

    <a href="client_profil.php"><button class="btn btn-lg btn-block px-3"><span class="dashboard_text_color left">Profil</span></button></a>


    <div class="pt-4"><a href="../../index.php"><button type="button" class="btn btn-dark">Revenir à la page principale</button></a></div>
</div>
    
</div>
<script src="../JS/dropdown.js"></script>