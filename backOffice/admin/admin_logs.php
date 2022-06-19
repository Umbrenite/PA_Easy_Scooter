<?php
$pageTitle = "Logs";
require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');

$logs = $bdd->prepare("SELECT * FROM iw22_log WHERE id > 1");
$logs->execute();
$resultLogs = $logs->fetchAll();
$nbLogs = count($resultLogs);

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
                        <span class="title pt-3 textcolor px-5"><?php echo($pageTitle); ?></span>
                    </div>
                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Admins</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="pl-5">
                    <form action="" class="my-4">
                        <div class="from-group row">
                        </div>
                    </form>
                    <div class="col">
                        <table>

                            <tr>
                                <th class="table_border table_font_1 textcolor center px-4 py-2">ID</th>
                                <th class="table_border table_font_1 textcolor center px-4">ID_user</th>
                                <th class="table_border table_font_1 textcolor center px-4">User Agent</th>
                                <th class="table_border table_font_1 textcolor center px-5">IP</th>
                                <th class="table_border table_font_1 textcolor center px-5">Date de login</th>
                            </tr>

                            <?php for ($t = 0; $t < $nbLogs; $t++) { ?>
                                <tr>
                                    <td class="table_border table_font_2 center py-2 text-white"><?php echo ($resultLogs[$t]["id"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo ($resultLogs[$t]["id_user"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo ($resultLogs[$t]["user_agent"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo ($resultLogs[$t]["ip"]); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo ($resultLogs[$t]["end_date"]); ?></td>

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