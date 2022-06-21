<?php
$pageTitle = "Dashboard";
session_start();

// if (!empty($_GET['id'])) $getId = intval($_GET['id']);
// if ($getId != $_SESSION['id']) header("Location: ../../index.php");


if (!isset($_SESSION['id']) && $_SESSION['role'] != 'client') {
    header("Location: ../../index.php");
    exit();
}


require "bdd-connexions.php";
require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');
require "../../struct/head.php";
?>

<?php include "client_leftmenu.php" ?>

<body class="bgfontdark">

<div class="pl-5">
    <div class="pl-5">
        <div class="pl-5">
            <div class="row pt-3 pl-3">
                <div class="col pl-5">
                    <span class="title pt-3 textcolor px-5"> Dashboard Menu</span>
                </div>
                <div class="col pt-1">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent right">
                            <li class="breadcrumb-item"><a href="client_dashboard.php">Dashboard</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
                <div class="pb-4 pl-5">
                    <div class="pl-4">
                        <div class="row pb-4">
                        <div class="col pl-2 pr-4 pb-3">
                            <div class="pr-3">
                                <div class="card">
                                    <h5 class="card-header">Vos informations</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3 mb-4">
                                                <div class="bg-white rounded-lg p-5 shadow">
                                                    <h2 class="h6 font-weight-bold text-center mb-4">Trajets restants</h2>

                                                    <!-- Progress bar 1 -->
                                                    <div class="progress-value rounded-circle d-flex align-items-center justify-content-center pb-3">
                                                        <div class="h3 font-weight-bold"><?php echo($resultMember[0]['races']) ?></div>
                                                    </div>
                                                    <!-- END -->
                                                </div>
                                            </div>

                                            <div class="col-sm-3 mb-4">
                                                <div class="bg-white rounded-lg p-5 shadow">
                                                    <h2 class="h6 font-weight-bold text-center mb-4">Nombre de points</h2>

                                                    <!-- Progress bar 2 -->
                                                    <div class="progress-value rounded-circle d-flex align-items-center justify-content-center pb-3">
                                                        <div class="h3 font-weight-bold"><?php echo($resultMember[0]['points']);?></div>
                                                    </div>
                                                    <!-- END -->
                                                    </div>
                                                </div>

                                            <div class="col-sm-3 mb-4">
                                                <div class="bg-white rounded-lg p-5 shadow">
                                                    <h2 class="h6 font-weight-bold text-center mb-4">Date d'inscription</h2>

                                                    <!-- Progress bar 3 -->
                                                    <div class="progress-value rounded-circle d-flex align-items-center justify-content-center pb-3">
                                                        <div class="h3 font-weight-bold"><?php echo($resultMember[0]['registration_date']);?></div>
                                                    </div>
                                                    <!-- END -->
                                                    </div>
                                                </div>

                                            <div class="col-sm-3 mb-4">
                                                <div class="bg-white rounded-lg p-5 shadow">
                                                    <h2 class="h6 font-weight-bold text-center mb-4">Forfait actuel</h2>

                                                    <!-- Progress bar 4 -->
                                                    <div class="progress-value rounded-circle d-flex align-items-center justify-content-center pb-3">
                                                        <div class="h3 font-weight-bold"><?php echo($resultPackage_per_users[0]['name']);?></div>
                                                    </div>
                                                    <!-- END -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row pt-3 pl-3">
                                        <!-- Graph distance -->
                                        <div class="col">
                                            <div class="card">
                                                <h5 class="card-header">Distance parcourue (Kilomètres)</h5>
                                                <div class="card-body">
                                                    <canvas id="distance" width="340" height="150"></canvas>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="px-3"></div>
                                        
                                        <!-- Graph arrondissement -->
                                        <div class="col">
                                            <div class="card">
                                                <h5 class="card-header">Arrondissements les plus visités</h5>
                                                <div class="card-body">
                                                    <canvas id="bargraph" width="450" height="200"></canvas>
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
</div>
</body>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

<script src="../JS/client_bargraph.js"></script>
<script src="../JS/client_distance.js"></script>