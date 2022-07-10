<?php
$pageTitle = "Liste clients";
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

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
                        <div class="row justify-content-end">
                            <div class="col-md-auto">
                                <a href="createClient.php" class="btn btn-success right">Ajouter un utilisateur</a>
                            </div>
                        </div>
                    </form>
                    <div class="col">
                        <table id="listc">
                            <tr>
                                <th class="table_font_1 textcolor center px-2"></th>
                                <th class="table_font_1 textcolor center px-2"></th>
                                <th class="table_border table_font_1 textcolor center px-5">ID</th>
                                <th class="table_border table_font_1 textcolor center px-5">Mail</th>
                                <th class="table_border table_font_1 textcolor center px-5">Nom</th>
                                <th class="table_border table_font_1 textcolor center px-5">Prénom</th>
                                <th class="table_border table_font_1 textcolor center px-5">Rôle</th>
                                <th class="table_border table_font_1 textcolor center px-5">Forfait</th>
                                <th class="table_border table_font_1 textcolor center px-5">Trajets</th>
                                <th class="table_border table_font_1 textcolor center px-5">Points</th>
                                <th class="table_border table_font_1 textcolor center px-5">Confirmkey</th>
                                <th class="table_border table_font_1 textcolor center px-5">Verif</th>
                                <th class="table_border table_font_1 textcolor center px-5">Date d'inscription</th>
                            </tr>
                            <?php for ($u = 0; $u < $nbUsers; $u++) { ?>
                                <tr>
                                    <td id="mod" class="table_border_bottom table_font_2 center text-white"><a class="btn btn-warning" href="modifyUser.php?userm=<?php echo $resultUsers[$u]['id']; ?>"><i class='bx bx-wrench'></i></a></td>
                                    <td id="del" class="table_font_2 center text-white"><a class="btn btn-danger" href="../../delete.php?idclient=<?php echo ($resultUsers[$u]['id']); ?>"><i class='bx bx-trash'></i></a></td>
                                    <td id="lgn" class="table_border table_font_2 center py-2 text-white"><?php print_r($resultUsers[$u]["id"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["mail"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["lastname"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["firstname"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["role"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r(printPkgName($resultUsers[$u]["fg_package"])); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["races"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["points"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["confirm_key"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["account_confirm"]); ?></td>
                                    <td id="lgn" class="table_border table_font_2 center text-white"><?php print_r($resultUsers[$u]["registration_date"]); ?></td>
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