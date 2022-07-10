<?php
$pageTitle = "Modification Ticket";

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

$date_update = new DateTime();
$date_update->setTimezone(new DateTimeZone('Europe/Paris'));
$dateu = $date_update->format("Y-m-d");

// PARTIE RECUP INFO TICKET
$ticketID = $_GET['ticketid'];
$reqti = $bdd->prepare('SELECT * FROM iw22_ticket WHERE id = :id');
$reqti->bindValue('id', $ticketID, PDO::PARAM_INT); // Représente le type de données INTEGER SQL.
$reqti->execute();
$infoTicket = $reqti->fetch();
$idt = $infoTicket['id'];

// PARTIE RECUP INFO USERS
$requsr = $bdd->prepare('SELECT id, firstname, lastname FROM iw22_user');
$requsr->execute();
$infoUser = $requsr->fetchall();
$nbUsers = count($infoUser);

// PARTIE RECUP INFO STATUTS TROTINETTE
$reqrti = $bdd->prepare('SELECT name FROM iw22_ticket_reqtype');
$reqrti->execute();
$typeTic = $reqrti->fetchall();
$nbTypeTic = count($typeTic);

// PARTIE RECUP INFO STATUTS TICKET
$reqstic = $bdd->prepare('SELECT name FROM iw22_ticket_status');
$reqstic->execute();
$statusTic = $reqstic->fetchall();
$nbStatusTic = count($statusTic);

if (isset($_POST['formModifyTi'])) {

    if (isset($_POST['iduti']) && !empty($_POST['iduti'])) modifTicket($_POST['iduti'], $idt, 'id_user', $infoTicket['id_user']);
    if (isset($_POST['titleti']) && !empty($_POST['titleti'])) modifTicket($_POST['titleti'], $idt, 'title', $infoTicket['title']);
    if (isset($_POST['descti']) && !empty($_POST['descti'])) modifTicket($_POST['descti'], $idt, 'description', $infoTicket['description']);
    if (isset($_POST['statti']) && !empty($_POST['statti'])) modifTicket($_POST['statti'], $idt, 'status', $infoTicket['status']);
    if (isset($_POST['typereq']) && !empty($_POST['typereq'])) modifTicket($_POST['typereq'], $idt, 'request_type', $infoTicket['request_type']);
    if (isset($_POST['priolvl']) && !empty($_POST['priolvl'])) modifTicket($_POST['priolvl'], $idt, "priority_level", $infoTicket['priority_level']);
    if (isset($dateu) && !empty($dateu)) modifTicket($dateu, $idt, "date_updated", $infoTicket['date_updated']);

}

require "../../struct/head.php"; ?>
<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
</head>

<?php require "admin_leftmenu.php"; ?>

<body class="bgfontdark">

    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">

                <div class="row pt-3 pl-3">
                    <div class="col pl-5 pb-5 pt-3">
                        <span class="title pt-3 textcolor px-5"><?php echo ($pageTitle); ?></span>
                    </div>
                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="admin_list_ticket.php">Tickets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Modification</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <form name="monForm" method="post">
                    <div class="container">

                        <div class="row">
                            <div class="col">
                                <table id="listm">

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">ID :</th>
                                        <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoTicket['id']; ?>" disabled></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Auteur :</th>
                                        <td>
                                            <select class="form-control" name="iduti" required>

                                                <option value="<?php if ($infoTicket['id_user']) echo $infoTicket['id_user']; ?>" selected>
                                                    <?php if ($infoTicket['id_user']) echo printUserInfo($infoTicket['id_user']); ?>
                                                </option>

                                                <?php for ($u = 0; $u < $nbUsers; $u++) { ?>
                                                    <option value="<?php echo $infoUser[$u]["id"]; ?>">
                                                        <?php echo ($infoUser[$u]["firstname"] . " " . $infoUser[$u]["lastname"]); ?>
                                                    </option>
                                                <?php } ?>

                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Titre :</th>
                                        <td><input id="ctn" name="titleti" type="text" class="form-control" value="<?php echo $infoTicket['title']; ?>"></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Description :</th>
                                        <td><textarea name="descti" id="tarea" oninput="updateTextareaHeight(this);"><?php echo $infoTicket['description']; ?></textarea></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Statut :</th>
                                        <td>
                                            <select class="form-control" name="statti" required>
                                                <option selected><?php print_r($infoTicket['status']); ?></option>
                                                
                                                <?php for ($s = 0; $s < $nbStatusTic; $s++) { ?>
                                                    <option>
                                                        <?php echo $statusTic[$s]["name"]; ?>
                                                    </option>
                                                <?php } ?>
                                                
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Type de requête :</th>
                                        <td>
                                            <select class="form-control" name="typereq" required>
                                                <option selected><?php print_r($infoTicket['request_type']); ?></option>
                                                
                                                <?php for ($t = 0; $t < $nbTypeTic; $t++) { ?>
                                                    <option>
                                                        <?php echo $typeTic[$t]["name"]; ?>
                                                    </option>
                                                <?php } ?>

                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Niveau de Priorité :</th>
                                        <td>
                                            <select class="form-control" name="priolvl" required>
                                                <option selected><?php print_r($infoTicket['priority_level']); ?></option>
                                                <option>Faible</option>
                                                <option>Moyenne</option>
                                                <option>Forte</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Date de création :</th>
                                        <td><input id="ctn" type="text" class="form-control" value="<?php echo $infoTicket['date_created']; ?>" disabled></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Date de mise à jour :</th>
                                        <td><input id="ctn" type="text" class="form-control" value="<?php echo ($date_update->format("Y-m-d")); ?>" disabled></td>
                                    </tr>

                                </table>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-auto">
                                <input type="submit" class="btn btn-success" name="formModifyTi" value="Modifier">
                            </div>
                            <div class="col-md-auto">
                                <a href="javascript:history.back()" class="btn btn-danger right">Annuler</a>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        function updateTextareaHeight(input) {
            input.style.height = 'auto';
            input.style.height = input.scrollHeight + 'px';
        }

        window.onload = function() {
            const text = <?php echo json_encode($infoTicket['description']); ?>;
            updateTextareaHeight(document.monForm.descti);
            //updateTextareaHeight(text);
        }
    </script>

</body>

</html>