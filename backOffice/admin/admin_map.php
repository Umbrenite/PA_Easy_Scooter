<?php
$pageTitle = "Map des trotinettes";

require "../../struct/head.php"; ?>
<!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<?php include "admin_leftmenu.php" ?>

<body class="bgfontdark">
    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">
                <div class="row pt-3 pl-3">
                    <div class="col pl-5 pb-5 pt-3 right">
                        <span class="title pt-3 textcolor px-5"><?php echo $pageTitle; ?></span>
                    </div>
                    <div class="col-5 pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_list_scooter.php">Liste des trotinettes</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Map</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="container">
                    <hr>
                </div>
                <div id="map" class="container bgfontblack rounded bordercolor">
                    <!-- Ici s'affichera la carte -->
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Fichiers Javascript -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
<script defer src="/backOffice/JS/map.js"></script>

</html>