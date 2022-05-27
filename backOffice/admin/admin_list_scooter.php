<?php
session_start();
$pageTitle = "Liste des trotinettes";

if (!empty($_GET['id'])) $getId = intval($_GET['id']);
if ($getId != $_SESSION['id']) header("Location: ../../index.php");

require "../../database/database.php";
require "../../struct/head.php";
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
                    <div class="col pl-5 pb-5 pt-3">
                        <span class="title pt-3 textcolor px-5"><?php echo $pageTitle; ?></span>
                    </div>
                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Scooters</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pl-5">
                    <form action="" class="my-4">
                        <div class="from-group row">
                            <div class="col-sm-10">
                                <a href="createScooter.php" class="btn btn-success right">Créer trottinette</a>

                            </div>
                            <div class="col pl-4">
                                <a href="deleteScooter.php" class="btn btn-success">Supprimer trottinette</a>

                            </div>
                        </div>
                    </form>
                    <div class="col">
                        <table>
                            <tr>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">ID</th>
                                <th class="table_border table_font_1 textcolor center px-5">Statut</th>
                                <th class="table_border table_font_1 textcolor center px-5">Latitude</th>
                                <th class="table_border table_font_1 textcolor center px-5">Longitude</th>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">Batterie</th>
                                <th class="table_border table_font_1 textcolor center px-5">Modèle</th>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">Date d'entrée</th>
                                <th class="table_border table_font_1 textcolor center px-5">Date de maintenance</th>
                                <th class="table_border table_font_1 textcolor center px-5">Prochaine maintenance</th>
                            </tr>
                            <tr>
                                <td class="table_border table_font_2 center py-2 text-white">1</td>
                                <td class="table_border table_font_2 center text-white">Louée</td>
                                <td class="table_border table_font_2 center text-white">4.200</td>
                                <td class="table_border table_font_2 center text-white">10.200</td>
                                <td class="table_border table_font_2 center text-white">Pleine</td>
                                <td class="table_border table_font_2 center text-white">X-13</td>
                                <td class="table_border table_font_2 center text-white">11/02/22</td>
                                <td class="table_border table_font_2 center text-white">12/02/22</td>
                                <td class="table_border table_font_2 center text-white">15/06/23</td>
                            </tr>
                            <tr>
                                <td class="table_border table_font_1 center py-2 text-white">2</td>
                                <td class="table_border table_font_1 center text-white">Libre</td>
                                <td class="table_border table_font_1 center text-white">4.500</td>
                                <td class="table_border table_font_1 center text-white">10.200</td>
                                <td class="table_border table_font_1 center text-white">Pleine</td>
                                <td class="table_border table_font_1 center text-white">X-13</td>
                                <td class="table_border table_font_1 center text-white">11/02/22</td>
                                <td class="table_border table_font_1 center text-white">12/02/22</td>
                                <td class="table_border table_font_1 center text-white">15/06/23</td>
                            </tr>
                            <tr>
                                <td class="table_border table_font_2 center py-2 text-white">2</td>
                                <td class="table_border table_font_2 center text-white">Hors-service</td>
                                <td class="table_border table_font_2 center text-white">4.500</td>
                                <td class="table_border table_font_2 center text-white">10.200</td>
                                <td class="table_border table_font_2 center text-white">Pleine</td>
                                <td class="table_border table_font_2 center text-white">X-13</td>
                                <td class="table_border table_font_2 center text-white">11/02/22</td>
                                <td class="table_border table_font_2 center text-white">12/02/22</td>
                                <td class="table_border table_font_2 center text-white">15/06/23</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>