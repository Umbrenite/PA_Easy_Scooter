<?php
$pageTitle = "Ajout d'une trotinette";
require($_SERVER['DOCUMENT_ROOT'] . '/struct/head.php');
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
                
                <div class="row pl-3">
                    <div class="col pl-5 pb-5 pt-4">
                        <span class="title pt-3 textcolor px-5"><?php echo $pageTitle ?></span>
                    </div>
                    <div class="col pt-4">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="admin_list_scooter.php">Scooters</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add</li>
                            </ol>
                        </nav>
                    </div>
                </div>

                <div id="interfcreat" class="pl-5 rounded">
                    <div class="col bgfontblack py-5 px-5">
                        <form>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="textcolor">Modèle</label>
                                    <input type="text" class="form-control" placeholder="Modèle de trottinette">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState" class="textcolor">Statût de la trottinette</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Choisissez un statût...</option>
                                        <option>Libre</option>
                                        <option>Louée</option>
                                        <option>Hors-service</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="inputCity" class="textcolor">Latitude</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="inputCity" class="textcolor">Longitude</label>
                                    <input type="text" class="form-control" id="inputCity">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState" class="textcolor">Batterie</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Pleine</option>
                                        <option>Vide</option>
                                        <option>En cours d'utilisation</option>
                                        <option>Déchargée</option>
                                        <option>En charge</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputState" class="textcolor">Utilisée par</label>
                                    <select id="inputState" class="form-control">
                                        <option selected>Personne</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="inputDate1" class="textcolor">Date d'entrée</label>
                                    <div class="datepicker date input-group">
                                        <input type="text" placeholder="Entrée" class="form-control" id="reservationDate">
                                        <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-calendar"></i></span></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputDate1" class="textcolor">Date de dernière maintenance</label>
                                    <div class="datepicker date input-group">
                                        <input type="text" placeholder="Maintenance" class="form-control" id="lastMaintenance">
                                        <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-calendar"></i></span></div>
                                    </div>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputDate1" class="textcolor">Date de prochaine maintenance</label>
                                    <div class="datepicker date input-group">
                                        <input type="text" placeholder="Prochaine maintenance" class="form-control" id="newMaintenance">
                                        <div class="input-group-append"><span class="input-group-text px-4"><i class="fa fa-calendar"></i></span></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-md-auto">
                                    <button type="submit" class="btn btn-success">Ajouter</button>
                                </div>
                                <div class="col-md-auto">
                                    <a href="javascript:history.back()" class="btn btn-danger right">Annuler</a>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>