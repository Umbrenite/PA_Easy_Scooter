<?php
$pageTitle = "Modification Ticket";

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
require($_SERVER['DOCUMENT_ROOT'] . '/struct/functions.php');

$date_update = new DateTime();
$date_update->setTimezone(new DateTimeZone('Europe/Paris'));

// PARTIE RECUP INFO TICKET
$ticketID = $_GET['ticketid'];
$reqti = $bdd->prepare('SELECT * FROM iw22_ticket WHERE id = :id');
$reqti->bindValue('id', $ticketID, PDO::PARAM_INT); // Représente le type de données INTEGER SQL.
$reqti->execute();
$infoTicket = $reqti->fetch();

// PARTIE RECUP INFO USERS
$requsr = $bdd->prepare('SELECT id, firstname, lastname FROM iw22_user');
$requsr->execute();
$infoUser = $requsr->fetchall();
$nbUsers = count($infoUser);

if (isset($_POST['formModifyT'])) {
    // iduti int
    // titleti varchar
    // descti text
    // statti varchar
    // typereq varchar
    // priolvl varchar
    // datecrea date
    // dateup date
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
                                                <option>En cours</option>
                                                <option>Résolu</option>
                                                <option>Bloqué</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Type de requête :</th>
                                        <td>
                                            <select class="form-control" name="typereq" required>
                                                <option selected><?php print_r($infoTicket['request_type']); ?></option>
                                                <option>Ajout de fonctionnalité</option>
                                                <option>Correction bug</option>
                                                <option>Problème de trotinette</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Niveau de Priorité :</th>
                                        <td>
                                            <select class="form-control" name="priolvl" required>
                                                <option selected><?php print_r($infoTicket['priority_level']); ?></option>
                                                <option>Faible</option>
                                                <option>Moyen</option>
                                                <option>Élevé</option>
                                            </select>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Date de création :</th>
                                        <td><input id="ctn" name="datecrea" type="text" class="form-control" value="<?php echo $infoTicket['date_created']; ?>" disabled></td>
                                    </tr>

                                    <tr>
                                        <th class="table_border table_font_1 textcolor center px-4" scope="row">Date de mise à jour :</th>
                                        <td><input id="ctn" name="dateup" type="text" class="form-control" value="<?php echo ($date_update->format("Y-m-d")); ?>" disabled></td>
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