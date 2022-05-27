<?php
session_start();
$pageTitle = "Dashboard";

if (!empty($_GET['id'])) $getId = intval($_GET['id']);
if ($getId != $_SESSION['id']) header("Location: ../../index.php");

require "../../database/database.php";
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
                        <div class="row pb-4">
                            <div class="col px-4">
                                <div class="card">
                                    <div class="card-body">
                                        Traffic de trottinettes actif : 50%
                                    </div>
                                </div>
                            </div>
                            <div class="col px-4">
                                <div class="card">
                                    <div class="card-body">
                                        Nombre de tickets : 60
                                    </div>
                                </div>
                            </div>
                            <div class="col px-4">
                                <div class="card">
                                    <div class="card-body">
                                        Nouveaux membres mensuel : 25
                                    </div>
                                </div>
                            </div>
                            <div class="col px-4">
                                <div class="card">
                                    <div class="card-body">
                                        Nouveaux membres annuels : 250
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                                    <span class="pr-4">- Trottinettes utilisables</span>
                                                    <canvas id="myCanvas" width="10" height="10" style="border:1px solid #000000;background-color:red;"></canvas>
                                                    <span class="pr-4">- Problèmes rencontrés</span>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <u><b><span class="pl-5">Statut actuel</span></b></u>
                                                <div class="pt-3">
                                                    <div class="col-xs">Clients mensuels
                                                        <div class="right"><b>25/100</b></div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-3">
                                                    <div class="col-xs">Nombre de trottinettes hors-services
                                                        <div class="right"><b>10/100</b></div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-3">
                                                    <div class="col-xs">Nombres de courses effectuées
                                                        <div class="right"><b>50/100</b></div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="pt-3">
                                                    <div class="col-xs">Pourcentage de tickets non résolus
                                                        <div class="right"><b>85/100</b></div>
                                                    </div>
                                                    <div class="col-xs-8">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
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
                            <div class="col-sm-3">
                                <div class="card">
                                    <h5 class="card-header">Navigateurs utilisés</h5>
                                    <div class="card-body">
                                        <canvas id="donut_chart" style="display: block; box-sizing: border-box;" height=232></canvas>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5">
                                <div class="card pb-3">
                                    <h5 class="card-header">Chat en direct</h5>
                                    <div class="card-body">
                                        <div class="row pl-2 pb-2">
                                            <div class="col"><b> Administrateur </b></div>
                                            <div class="col">
                                                <div class="right text-muted pt-1 sub_date">26 Jan.2022, 9:59:00</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-1">
                                                <img src="../../img/man_example.png">
                                            </div>

                                            <div class="col">
                                                <div class="rounded admin_text pl-4 py-1">Ceci est un test</div>
                                            </div>
                                        </div>


                                        <div class="row pl-2">
                                            <div class="col">
                                                <div class="text-muted pt-1 sub_date">26 Jan.2022, 10:00:00</div>
                                            </div>
                                            <div class="col">
                                                <div class="right"><b>Client </b></div>
                                            </div>
                                        </div>

                                        <div class="row pl-4">
                                            <div class="col">
                                                <div class="rounded client_text pl-2 py-1">Ceci est un autre test</div>
                                            </div>
                                            <div class="col-sm-1">
                                                <img src="../../img/man_example.png">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="pb-5">

                                    <div class="container bg-warning py-2 rounded">
                                        <div class="row pl-2">

                                            <div class="col-sm-2 pt-3"><i class="fa-solid fa-download fa-2xl"></i></div>

                                            <div class="col">
                                                <div class="row">Inventaire</div>
                                                <div class="row"><b>5,200</b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2"></div>

                                    <div class="container bg-success py-2 rounded">
                                        <div class="row pl-2">

                                            <div class="col-sm-2 pt-3"><i class="fa-solid fa-heart-circle-check fa-2xl"></i></div>

                                            <div class="col">
                                                <div class="row">Likes</div>
                                                <div class="row"><b>10,680</b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2"></div>

                                    <div class="container bg-primary py-2 rounded">
                                        <div class="row pl-2">

                                            <div class="col-sm-2 pt-3"><i class="fa-solid fa-person-running fa-2xl"></i></div>

                                            <div class="col">
                                                <div class="row">Trottinettes en service</div>
                                                <div class="row"><b>4,500</b></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="py-2"></div>

                                    <div class="container bg-danger py-2 rounded">
                                        <div class="row pl-2">

                                            <div class="col-sm-2 pt-3"><i class="fa-solid fa-ticket fa-2xl"></i></div>

                                            <div class="col">
                                                <div class="row">Tickets</div>
                                                <div class="row"><b>280</b></div>
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
<script src="../JS/admin_doughnut.js"></script>

</html>