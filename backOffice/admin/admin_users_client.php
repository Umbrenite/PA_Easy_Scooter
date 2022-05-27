<?php
session_start();
$pageTitle = "Liste clients";
require "../../database/database.php";

// PARTIE AFFICHAGE LISTE CLIENTS
$users = $bdd->prepare("SELECT * FROM iw22_user WHERE role = 'client'");
$users->execute();
$resultUsers = $users->fetchAll();
$nbUsers = count($resultUsers);

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
                        <span class="title pt-3 textcolor px-5"><?php echo $pageTitle ?></span>
                    </div>
                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Clients</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pl-5">
                    <form action="" class="my-4">
                        <div class="from-group row">
                            <div class="col-sm-12 pr-4">
                                <a href="createClient.php" class="btn btn-success right">Ajouter un utilisateur</a>
                            </div>
                        </div>
                    </form>
                    <div class="col">
                        <table>
                            <tr>
                                <th class="table_font_1 textcolor center px-2">Modifier</th>
                                <th class="table_font_1 textcolor center px-2">Supprimer</th>
                                <th class="table_border table_font_1 textcolor center px-4 py-2">ID</th>
                                <th class="table_border table_font_1 textcolor center px-4">Nom</th>
                                <th class="table_border table_font_1 textcolor center px-4">Prénom</th>
                                <th class="table_border table_font_1 textcolor center px-5">Adresse Mail</th>
                                <th class="table_border table_font_1 textcolor center px-5">Clé d'authentification</th>
                                <th class="table_border table_font_1 textcolor center px-4 py-2">Date d'inscription</th>
                                <th class="table_border table_font_1 textcolor center px-4">Trajets restant</th>
                                <th class="table_border table_font_1 textcolor center px-4">Rôle</th>
                                <th class="table_border table_font_1 textcolor center px-4">Authentification</th>
                                <th class="table_border table_font_1 textcolor center px-4">Points</th>
                            </tr>
                            <?php for ($t = 0; $t < $nbUsers; $t++) { ?>
                                <tr>
                                    <td id="pratio" class="table_border_bottom table_font_2 center text-white"><a class="btn btn-warning" href="modify.php?id=<?php echo $idUser; ?>&attrac=<?php echo $resultUsers[$t]['id']; ?>"><i class='bx bx-wrench'></i></a></td>
                                    <td id="dratio" class="table_font_2 center text-white"><a class="btn btn-danger" href="../../delete.php?idclient=<?php echo ($resultUsers[$t]['id']); ?>"><i class='bx bx-trash'></i></a></td>
                                    <td class="table_border table_font_2 center py-2 text-white"><?php print_r($resultUsers[$t]["id"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["lastname"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["firstname"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["mail"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["confirm_key"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["registration_date"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["races"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["role"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["account_confirm"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$t]["points"]); ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>