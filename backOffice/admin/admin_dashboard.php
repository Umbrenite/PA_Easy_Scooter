<?php
$pageTitle = "Dashboard";

require "bdd-connexions.php";
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require "../../struct/head.php";
?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<?php
require "admin_leftmenu.php"
?>

<body class="bgfontdark">

    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">

                <div class="row pt-3 pl-3">
                    <div class="col pl-5">
                        <span class="title pt-3 textcolor px-5">Menu</span>
                    </div>
                    <div class="col pt-1">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php?id=<?php echo ($_SESSION['id']); ?>">Dashboard</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div class="pb-4 pl-5">
                    <div class="pl-4">

                        <div class="col pl-2 pr-4 pb-4">
                            <div class="pr-3">
                                <div class="card">
                                    <h5 class="card-header">Évolution de l'activité des trottinettes</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <u><b><span class="pl-5">Graphique d'Évolution des trottinettes</span></b></u>
                                                <canvas id="myChart" style="width:100%;max-width:900px;" height="200"></canvas>
                                                <div class="pl-4 center pt-3">
                                                    <canvas id="myCanvas" width="10" height="10" style="border:1px solid #000000;background-color:blue;"></canvas>
                                                    <span class="pr-4">- Trottinettes utilisées</span>
                                                    <canvas id="myCanvas" width="10" height="10" style="border:1px solid #000000;background-color:green;"></canvas>
                                                    <span class="pr-4">- Trottinettes libres</span>
                                                    <canvas id="myCanvas" width="10" height="10" style="border:1px solid #000000;background-color:red;"></canvas>
                                                    <span class="pr-4">- Problèmes</span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <u><b><span class="pl-5">Statut actuel</span></b></u>
                                                <div class="pt-3">
                                                    <div class="col-xs">Clients mensuels
                                                        <div class="right"><b><?php echo ($nbUsers_this_month); ?>/100</b></div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo ($nbUsers_this_month); ?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                    <div class="col-xs">Nombre de trottinettes hors-services
                                                        <div class="right"><b><?php echo ($nbScooters_off); ?>/100</b></div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo ($nbScooters_off); ?>%" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pt-3">
                                                    <div class="col-xs">Pourcentage de tickets non résolus
                                                        <div class="right"><b><?php echo ($nbTickets_pendent); ?>/100</b></div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo ($nbTickets_pendent); ?>%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row pl-2 pr-4">

                            <div class="col px-3">
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

                            <div class="col">
                                <div class="pb-5">

                                    <div class="container bg-success py-1 rounded">
                                        <div class="row pl-2">
                                            <div class="col-sm-2 pt-3">
                                                <i class="fa-solid fa-dollar fa-2xl"></i>
                                            </div>
                                            <div class="col">
                                                <div class="row">Nombre de forfaits</div>
                                                <div class="row"><b><?php echo ($nbPacks); ?></b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-1"></div>

                                    <div class="container bg-success py-1 rounded">
                                        <div class="row pl-2">
                                            <div class="col-sm-2 pt-3">
                                                <i class="fa-solid fa-dollar fa-2xl"></i>
                                            </div>
                                            <div class="col">
                                                <div class="row">Chiffre d'affaires</div>
                                                <div class="row"><b><?php get_money_from_packages($nbActivePacks, $resultPacks, $resultUsers); ?> €</b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-4">
                                        <hr>
                                    </div>

                                    <div class="container bg-danger py-1 rounded">
                                        <div class="row pl-2">
                                            <div class="col-sm-2 pt-3">
                                                <i class="fa-solid fa-ticket fa-2xl"></i>
                                            </div>
                                            <div class="col">
                                                <div class="row">Ticket(s)</div>
                                                <div class="row"><b><?php echo ("$nbTickets"); ?></b></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="col">
                                <div class="pb-5">

                                    <div class="container bg-warning py-1 rounded">
                                        <div class="row pl-2">
                                            <div class="col-sm-2 pt-3">
                                                <i class="fa-solid fa-person-running fa-2xl"></i>
                                            </div>
                                            <div class="col">
                                                <div class="row">Trottinettes en service</div>
                                                <div class="row"><b><?php echo ($nbScooters); ?></b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-1"></div>

                                    <div class="container bg-warning py-1 rounded">
                                        <div class="row pl-1">
                                            <div class="col-sm-2 pt-3">
                                                <i class="fa-solid fa-dollar fa-2xl"></i>
                                            </div>
                                            <div class="col">
                                                <div class="row">Traffic de trottinette actif : </div>
                                                <div class="row"><b><?php echo (($nbScooters / $nbScooters_total) * 100); ?>%</b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-4">
                                        <hr>
                                    </div>

                                    <div class="container bg-info py-1 rounded">
                                        <div class="row pl-1">
                                            <div class="col-sm-2 pt-3">
                                                <i class="fa-solid fa-user fa-2xl"></i>
                                            </div>
                                            <div class="col">
                                                <div class="row">Membres mensuels du mois précédent</div>
                                                <div class="row"><b><?php echo ($nbUsers_last_month); ?></b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-1"></div>

                                    <div class="container bg-info py-1 rounded">
                                        <div class="row pl-1">
                                            <div class="col-sm-2 pt-3">
                                                <i class="fa-solid fa-user fa-2xl"></i>
                                            </div>
                                            <div class="col">
                                                <div class="row">Membres annuels</div>
                                                <div class="row"><b><?php echo ($nbUsers_this_year); ?></b></div>
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

<script src="../JS/admin_graph_scooter.js"></script>
<script src="../JS/admin_doughnut_stats.js"></script>

</html>