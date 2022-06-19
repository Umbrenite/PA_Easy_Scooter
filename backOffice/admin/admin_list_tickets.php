<?php
$pageTitle = "Liste tickets";
require "../../struct/head.php";
?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<?php
include "admin_leftmenu.php";
?>

<body class="bgfontdark">

    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">
                <div class="row pt-3 pl-3">
                    <div class="col pl-5 pb-5 pt-3">
                        <span class="title pt-3 textcolor px-5">Liste des tickets</span>
                    </div>
                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tickets</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pl-5">
                    <form action="" class="my-4">
                        <div class="row justify-content-end">
                            <div class="col-md-auto">
                                <a href="editTickets.php" class="btn btn-success right">Modifier un ticket</a>
                            </div>
                        </div>
                    </form>
                    <div class="col">
                        <table>
                            <tr>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">ID</th>
                                <th class="table_border table_font_1 textcolor center px-5">Utilisateur</th>
                                <th class="table_border table_font_1 textcolor center px-5">Titre</th>
                                <th class="table_border table_font_1 textcolor center px-5">Description</th>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">Statut</th>
                                <th class="table_border table_font_1 textcolor center px-5">Type</th>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">Priorité</th>
                                <th class="table_border table_font_1 textcolor center px-5">Date de création</th>
                                <th class="table_border table_font_1 textcolor center px-5">Date de modification</th>
                            </tr>
                            <tr>
                                <td class="table_border table_font_2 center py-2 text-white">1</td>
                                <td class="table_border table_font_2 center text-white">Arthur</td>
                                <td class="table_border table_font_2 center text-white">Ticket d'exemple</td>
                                <td class="table_border table_font_2 center text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                <td class="table_border table_font_2 center text-white">En attente de validation</td>
                                <td class="table_border table_font_2 center text-white">Dev Web</td>
                                <td class="table_border table_font_2 center text-white">Urgente</td>
                                <td class="table_border table_font_2 center text-white">12/01/22</td>
                                <td class="table_border table_font_2 center text-white">12/01/22</td>
                            </tr>
                            <tr>
                                <td class="table_border table_font_1 center py-2 text-white">2</td>
                                <td class="table_border table_font_1 center text-white">Pierre</td>
                                <td class="table_border table_font_1 center text-white">Ticket d'exemple N°2</td>
                                <td class="table_border table_font_1 center text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                <td class="table_border table_font_1 center text-white">Résolue</td>
                                <td class="table_border table_font_1 center text-white">Dev Web</td>
                                <td class="table_border table_font_1 center text-white">Modérée</td>
                                <td class="table_border table_font_1 center text-white">12/01/22</td>
                                <td class="table_border table_font_1 center text-white">12/01/22</td>
                            </tr>
                            <tr>
                                <td class="table_border table_font_2 center py-2 text-white">2</td>
                                <td class="table_border table_font_2 center text-white">Axel</td>
                                <td class="table_border table_font_2 center text-white">Ticket d'exemple N°2</td>
                                <td class="table_border table_font_2 center text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                <td class="table_border table_font_2 center text-white">En cours de trairement</td>
                                <td class="table_border table_font_2 center text-white">Dev Web</td>
                                <td class="table_border table_font_2 center text-white">Basique</td>
                                <td class="table_border table_font_2 center text-white">12/01/22</td>
                                <td class="table_border table_font_2 center text-white">12/01/22</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>