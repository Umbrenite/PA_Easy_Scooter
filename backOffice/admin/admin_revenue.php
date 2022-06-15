<?php
session_start();
$pageTitle = "Statistiques";
require('../../struct/head.php');
require "bdd-connexions.php";
?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<?php include "admin_leftmenu.php" ?>

<body class="bgfontdark">

    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">
                <div class="row pt-3 pl-3">
                    <div class="col pl-5 pb-5">
                        <span class="title textcolor px-5">Statistiques du site</span>
                    </div>

                    <div class="col pt-1">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Charts</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pl-5">
                    <div class="pl-5 rounded">
                        <div class="row pl-2">
                            <div class="col">
                                <div class="row bg-info rounded py-3">
                                    <div class="col-sm-2 pt-4"><i class="fa-solid fa-user fa-2xl right"></i></div>
                                    <div class="col">
                                        <div class="row">Users</div>
                                        <div class="row"><b class="title"><?php echo($nbUsers);?></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row bg-success rounded py-3">
                                    <div class="col-sm-2 pt-4"><i class="fa-solid fa-dollar fa-2xl right"></i></div>
                                    <div class="col">
                                        <div class="row">Chiffre d'affaires</div>
                                        <div class="row"><b class="title">5,200 $</b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row bg-primary rounded py-3">
                                    <div class="col-sm-2 pt-4"><i class="fa-solid fa-download fa-2xl"></i></div>
                                    <div class="col">
                                        <div class="row">Nombre de forfaits actifs</div>
                                        <div class="row"><b class="title"><?php echo($nbActivePacks); ?></b>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col">
                                <div class="row bg-warning rounded py-3">
                                    <div class="col-sm-2 pt-4"><i class="fa-solid fa-gear fa-2xl"></i></div>
                                    <div class="col">
                                        <div class="row">CPU utilisée</div>
                                        <div class="row"><b class="title"><?php echo("15");//get_server_cpu_usage())?>%</b>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-9 py-5 pl-5">
                            <div class="px-2">
                                <div class="card">
                                    <h5 class="card-header">Bénéfices par mois</h5>
                                    <div class="card-body">
                                        <canvas id="revenues" width="750" height="200"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col py-5 px-4">
                            <div class="px-2">
                                <div class="card">
                                    <h5 class="card-header">Type de forfait</h5>
                                    <div class="card-body pt-5">
                                        <canvas id="donut_stats"></canvas>
                                        <div class="pl-4 pt-5">
                                            <canvas id="myCanvas" width="10" height="10" style="border:1px solid #000000;background-color:cyan;"></canvas>
                                            <span class="pr-2">- Simple</span>
                                            <canvas id="myCanvas" width="10" height="10" style="border:1px solid #000000;background-color:orange;"></canvas>
                                            <span class="pr-2">- Medium</span>
                                            <canvas id="myCanvas" width="10" height="10" style="border:1px solid #000000;background-color:green;"></canvas>
                                            <span class="pr-2">- Deluxe</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col pl-5">
                            <div class="px-2">
                                <div class="card">
                                    <h5 class="card-header title">Projets</h5>
                                    <div class="card-body">
                                        <div class="col-xs">Finaliser le système d'achats
                                            <div class="right"><b>25/100</b></div>
                                            <div class="col-xs-8">
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-3">
                                            <div class="col-xs">Mettre à jour le dashboard
                                                <div class="right"><b>75/100</b>
                                                </div>
                                            </div>
                                            <div class="col-xs-8">
                                                <div class="progress">
                                                    <div class="progress-bar bgfontgreen" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="pt-3">
                                            <div class="col-xs">Refonte de la page d'accueil
                                                <div class="right"><b>50/100</b></div>
                                            </div>
                                            <div class="col-xs-8">
                                                <div class="progress">
                                                    <div class="progress-bar bgfontpurple" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col pl-3">
                            <div class="px-2">
                                <div class="card">
                                    <h5 class="card-header">Dernières commandes</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-3"><b>Titre</b></div>
                                            <div class="col-md-2"><b>Prix</b></div>
                                            <div class="col-md-4 center"><b>État du paiement</b></div>
                                            <div class="col-md-3"><b class="right">Statut</b></div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">Forfait deluxe</div>
                                            <div class="col-md-3">15€</div>
                                            <div class="col-md-4">Payée</div>
                                            <div class="col-md-2"><span class="bgfontgreen rounded px-1 py-1 right">Délivrée</div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3">Forfait basique</div>
                                            <div class="col-md-3">5€</div>
                                            <div class="col-md-4">En attente de paiement</div>
                                            <div class="col-md-2"><span class="bgfontgreen rounded px-1 py-1 right">En cours</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>

</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script src="../JS/admin_revenue_chart.js"></script>
<script src="../JS/admin_doughnut_stats.js"></script>