<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');
$users = $bdd->prepare("SELECT * FROM iw22_user where role='client'");
$users->execute();
$resultUsers = $users->fetchAll();
$nbUsers = count($resultUsers);

$users_this_month = $bdd->prepare("SELECT * FROM iw22_user where role='client' AND MONTH(registration_date) = (SELECT EXTRACT(MONTH FROM CURRENT_TIMESTAMP))"); // Select tout les utilisateurs créés durant le mois actuel
$users_this_month->execute();
$resultUsers_this_month = $users_this_month->fetchAll();
$nbUsers_this_month = count($resultUsers_this_month);

$users_last_month = $bdd->prepare("SELECT * FROM iw22_user where role='client' AND MONTH(registration_date) = (SELECT EXTRACT(MONTH FROM CURRENT_TIMESTAMP)-1)"); // Select tout les utilisateurs créés durant le mois dernier
$users_last_month->execute();
$resultUsers_last_month = $users_last_month->fetchAll();
$nbUsers_last_month = count($resultUsers_last_month);

$users_this_year = $bdd->prepare("SELECT * FROM iw22_user where role='client' AND YEAR(registration_date) = (SELECT EXTRACT(YEAR FROM CURRENT_TIMESTAMP))"); // Select tout les utilisateurs créés durant l'année actuelle
$users_this_year->execute();
$resultUsers_this_year = $users_this_year->fetchAll();
$nbUsers_this_year = count($resultUsers_this_year);

$packages = $bdd->prepare("SELECT * FROM iw22_package");
$packages->execute();
$resultPacks = $packages->fetchAll();
$nbPacks = count($resultPacks);

$nmPkgs = $bdd->prepare("SELECT name FROM iw22_package");
$nmPkgs->execute();
$arrayNmPkgs = $nmPkgs->fetchAll();
$nbNmPkgs = count($arrayNmPkgs);

$active_packages = $bdd->prepare("SELECT * FROM iw22_user WHERE role = 'client' AND fg_package != 0");
$active_packages->execute();
$resultActivePacks = $active_packages->fetchAll();
$nbActivePacks = count($resultActivePacks);

$tickets = $bdd->prepare("SELECT * FROM iw22_ticket");
$tickets->execute();
$resultTickets = $tickets->fetchAll();
$nbTickets = count($resultTickets);

$tickets_pendent = $bdd->prepare("SELECT * FROM iw22_ticket WHERE status != 'Résolu'");
$tickets_pendent->execute();
$resultTickets_pendent = $tickets_pendent->fetchAll();
$nbTickets_pendent = count($resultTickets_pendent);

$tickets_bloq = $bdd->prepare("SELECT * FROM iw22_ticket WHERE status = 'Bloqué'");
$tickets_bloq->execute();
$resultTickets_bloq = $tickets_bloq->fetchAll();
$nbTickets_bloq = count($resultTickets_bloq);

$scooters_total = $bdd->prepare("SELECT * FROM iw22_scooter");
$scooters_total->execute();
$resultScooters_total = $scooters_total->fetchAll();
$nbScooters_total = count($resultScooters_total);

$scooters_onservice = $bdd->prepare("SELECT * FROM iw22_scooter WHERE status !='Hors-service'");
$scooters_onservice->execute();
$resultScooters = $scooters_onservice->fetchAll();
$nbScooters = count($resultScooters);

$scooters_offservice = $bdd->prepare("SELECT * FROM iw22_scooter WHERE status = 'Hors-service'");
$scooters_offservice->execute();
$resultScooters_off = $scooters_offservice->fetchAll();
$nbScooters_off = count($resultScooters_off);

function get_server_cpu_usage(){
    $load = sys_getloadavg();
    return $load[0];
}

function get_money_from_packages($nbActivePacks, $resultPacks, $resultUsers){
    $total = 0;
    $i = 0;
    for ($i = 0; $i< $nbActivePacks; $i++) {
        $total += $resultPacks[($resultUsers[$i]["fg_package"]-1)]["price"];
    }
    echo ($total);
}

function countNbUsersPkgs($nbFgPackage){
    global $bdd;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
    $req = $bdd->prepare("SELECT * FROM iw22_user WHERE fg_package = $nbFgPackage");
    $req->execute();
    $results = $req->fetchAll();
    $countR = count($results);
    return $countR;
}

function NmPkg($nbFgPackage){
    global $bdd;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
    $req = $bdd->prepare("SELECT * FROM iw22_package WHERE id = $nbFgPackage");
    $req->execute();
    $result = $req->fetch();
    return json_encode($result['name']);
}

function NmPkgPhp($nbFgPackage){
    global $bdd;
    require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');
    $req = $bdd->prepare("SELECT * FROM iw22_package WHERE id = $nbFgPackage");
    $req->execute();
    $result = $req->fetch();
    return $result['name'];
}

function getColor($numColor) {
    $mots = ['blue', 'grey', 'brown', 'orange', 'red', 'purple', 'white', 'yellow', 'black', 'pink', 'green', 'beige'];
    return $mots[$numColor];
}

?>

