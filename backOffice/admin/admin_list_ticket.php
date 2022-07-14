<?php
$pageTitle = "Liste tickets";
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

// PARTIE AFFICHAGE LISTE TICKETS
$tickets = $bdd->prepare("SELECT * FROM iw22_ticket");
$tickets->execute();
$resultTickets = $tickets->fetchAll();
$nbTickets = count($resultTickets);

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
                    <div class="col">
                        <table>
                            <tr>
                                <th class="table_font_1 textcolor center px-2"></th>
                                <th class="table_font_1 textcolor center px-2"></th>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">ID</th>
                                <th class="table_border table_font_1 textcolor center px-5">Auteur</th>
                                <th class="table_border table_font_1 textcolor center px-5">Titre</th>
                                <th class="table_border table_font_1 textcolor center px-5">Description</th>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">Statut</th>
                                <th class="table_border table_font_1 textcolor center px-5">Type</th>
                                <th class="table_border table_font_1 textcolor center px-5 py-2">Priorité</th>
                                <th class="table_border table_font_1 textcolor center px-5">Date de création</th>
                                <th class="table_border table_font_1 textcolor center px-5">Date de modification</th>
                            </tr>

                            <?php for ($n = 0; $n < $nbTickets; $n++) { ?>
                                <tr>
                                    <td id="mod" class="table_border_bottom table_font_2 center text-white"><a class="btn btn-warning" href="modifyTicket.php?ticketid=<?php echo $resultTickets[$n]['id']; ?>"><i class='bx bx-wrench'></i></a></td>
                                    <td id="del" class="table_font_2 center text-white"><a class="btn btn-danger" href="../../delete.php?idticket=<?php echo ($resultTickets[$n]['id']); ?>"><i class='bx bx-trash'></i></a></td>
                                    <td class="table_border table_font_2 center py-2 text-white"><?php echo $resultTickets[$n]['id']; ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo printUserInfo($resultTickets[$n]['id_user']); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo $resultTickets[$n]['title']; ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo $resultTickets[$n]['description']; ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo $resultTickets[$n]['status']; ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo $resultTickets[$n]['request_type']; ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo $resultTickets[$n]['priority_level']; ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo $resultTickets[$n]['date_created']; ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo $resultTickets[$n]['date_updated']; ?></td>
                                </tr>
                            <?php } ?>

                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html>