<?php
$pageTitle = "Options";

require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

$statusTi = recupinfo("iw22_ticket_status");
$nbStatusTi = count($statusTi);

$typeTi = recupinfo("iw22_ticket_reqtype");
$nbTypeTi = count($typeTi);

$statusSco = recupinfo("iw22_scooter_status");
$nbStatusSco = count($statusSco);

if (isset($_POST['formStatutTi'])) {
    if (!htmlspecialchars($_POST['statusTi'])) $errorStatusTi = "Le statut de ticket n'est pas conforme";
    if (empty($errorStatusTi)) insertOptions($_POST['statusTi'], "iw22_ticket_status", "name", "Le statut de ticket a bien été ajouté.", "admin_list_options.php");
}

if (isset($_POST['formTypeTi'])) {
    if (!htmlspecialchars($_POST['typeTi'])) $errorTypeTi = "Le type de ticket n'est pas conforme";
    if (empty($errorTypeTi)) insertOptions($_POST['typeTi'], "iw22_ticket_reqtype", "name", "Le type de ticket a bien été ajouté.", "admin_list_options.php");
}

if (isset($_POST['formStatusSco'])) {
    if (!htmlspecialchars($_POST['statusSco'])) $errorStatusSco = "Le statut de scooter n'est pas conforme";
    if (empty($errorStatusSco)) insertOptions($_POST['statusSco'], "iw22_scooter_status", "name", "Le statut de scooter a bien été ajouté.", "admin_list_options.php");
}

require "../../struct/head.php"; ?>
<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
<link href="../../css/profil.css" rel="stylesheet" type="text/css">
</head>

<?php
require "admin_leftmenu.php";
?>

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
                                <li class="breadcrumb-item active" aria-current="page">Profil</li>
                            </ol>
                        </nav>
                    </div>

                    <div class="container">
                        <div class="row">
                            <div class="login-formo">
                                <form method="post">


                                    <h5>Modifier les options</h5>

                                    <div class="row">

                                        <div class="col">
                                            <input name="statusTi" class="form-control" type="text" placeholder="Entrer un statut de ticket">
                                            <p class="errorr"><?php if (isset($errorStatusTi)) echo $errorStatusTi; ?></p>
                                            <input name="formStatutTi" type="submit" class="btn btn-success" value="Ajouter">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <?php for ($a = 0; $a < $nbStatusTi; $a++) { ?>
                                                        <tr class="table-success">
                                                            <td><?php print_r($statusTi[$a]["name"]); ?></td>
                                                            <td><a class="btn btn-danger" href="../../delete.php?statusti=<?php echo ($statusTi[$a]['id']); ?>"><i class='bx bx-trash'></i></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col">
                                            <input name="typeTi" class="form-control" type="text" placeholder="Entrer un type de ticket">
                                            <p class="errorr"><?php if (isset($errorTypeTi)) echo $errorTypeTi; ?></p>
                                            <input name="formTypeTi" type="submit" class="btn btn-success" value="Ajouter">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <?php for ($b = 0; $b < $nbTypeTi; $b++) { ?>
                                                        <tr class="table-success">
                                                            <td><?php print_r($typeTi[$b]["name"]); ?></td>
                                                            <td><a class="btn btn-danger" href="../../delete.php?typeti=<?php echo ($typeTi[$b]['id']); ?>"><i class='bx bx-trash'></i></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="col">
                                            <input name="statusSco" class="form-control" type="text" placeholder="Entrer un statut de trotinette">
                                            <p class="errorr"><?php if (isset($errorStatusSco)) echo $errorStatusSco; ?></p>
                                            <input name="formStatusSco" type="submit" class="btn btn-success" value="Ajouter">
                                            <table class="table table-hover">
                                                <tbody>
                                                    <?php for ($c = 0; $c < $nbStatusSco; $c++) { ?>
                                                        <tr class="table-success">
                                                            <td><?php print_r($statusSco[$c]["name"]); ?></td>
                                                            <td><a class="btn btn-danger" href="../../delete.php?statussco=<?php echo ($statusSco[$c]['id']); ?>"><i class='bx bx-trash'></i></a></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>


                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>