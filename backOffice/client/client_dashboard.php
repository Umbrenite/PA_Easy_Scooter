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
                                    <h5 class="card-header">Évolution de vos trajets</h5>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3 mb-4">
                                                <div class="bg-white rounded-lg p-5 shadow">
                                                    <h2 class="h6 font-weight-bold text-center mb-4">Trajets effectués</h2>

                                                    <!-- Progress bar 1 -->
                                                    <div class="progress-value rounded-circle d-flex align-items-center justify-content-center">
                                                        <div class="h2 font-weight-bold">80<sup class="small">%</sup></div>
                                                    </div>

                                                    <div class="progress">
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                    <!-- END -->

                                                    <!-- Demo info -->
                                                    <div class="row text-center mt-4">
                                                        <div class="col-6 border-right">
                                                            <div class="h4 font-weight-bold mb-0">28%</div><span class="small text-gray">Semaine dernière</span>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="h4 font-weight-bold mb-0">60%</div><span class="small text-gray">Le mois dernier</span>
                                                            </div>
                                                        </div>
                                                            <!-- END -->
                                                    </div>
                                                </div>

                                        <div class="col-sm-3 mb-4">
                                            <div class="bg-white rounded-lg p-5 shadow">
                                                <h2 class="h6 font-weight-bold text-center mb-4">Profil complété</h2>

                                                <!-- Progress bar 2 -->
                                                <div class="progress-value rounded-circle d-flex align-items-center justify-content-center">
                                                    <div class="h2 font-weight-bold">50<sup class="small">%</sup></div>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <!-- END -->
                                                <!-- Demo info -->
                                                <div class="row text-center mt-4">
                                                    <div class="col-6 border-right">
                                                        <div class="h4 font-weight-bold mb-0">25%</div><span class="small text-gray">Semaine dernière</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="h4 font-weight-bold mb-0">40%</div><span class="small text-gray">Le mois dernier</span>
                                                        </div>
                                                    </div>
                                                        <!-- END -->
                                                </div>
                                            </div>
                                        <div class="col-sm-3 mb-4">
                                            <div class="bg-white rounded-lg p-5 shadow">
                                                <h2 class="h6 font-weight-bold text-center mb-4">Satisfaction</h2>

                                                <!-- Progress bar 3 -->
                                                <div class="progress-value rounded-circle d-flex align-items-center justify-content-center">
                                                    <div class="h2 font-weight-bold">40<sup class="small">%</sup></div>
                                                </div>

                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <!-- END -->

                                                <!-- Demo info -->
                                                <div class="row text-center mt-4">
                                                    <div class="col-6 border-right">
                                                        <div class="h4 font-weight-bold mb-0">12%</div><span class="small text-gray">Semaine dernière</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="h4 font-weight-bold mb-0">24%</div><span class="small text-gray">Le mois dernier</span>
                                                        </div>
                                                    </div>
                                                        <!-- END -->
                                                </div>
                                            </div>
                                        <div class="col-sm-3 mb-4">
                                            <div class="bg-white rounded-lg p-5 shadow">
                                                <h2 class="h6 font-weight-bold text-center mb-4">Trajets non payés</h2>

                                                <!-- Progress bar 4 -->
                                                <div class="progress-value rounded-circle d-flex align-items-center justify-content-center">
                                                    <div class="h2 font-weight-bold">15<sup class="small">%</sup></div>
                                                </div>

                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <!-- END -->

                                                <!-- Demo info -->
                                                <div class="row text-center mt-4">
                                                    <div class="col-6 border-right">
                                                        <div class="h4 font-weight-bold mb-0">10%</div><span class="small text-gray">Semaine dernière</span>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="h4 font-weight-bold mb-0">5%</div><span class="small text-gray">Le mois dernier</span>
                                                        </div>
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