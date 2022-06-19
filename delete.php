<?php
session_start();

if (!empty($_GET['idadmin'])) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');
    $delElement = $_GET['idadmin'];
    $delE = $bdd->prepare('DELETE FROM iw22_user WHERE id = ?');
    $delE->execute([$delElement]);
    header("Location: backOffice/admin/admin_list.php");
    exit();
}

if (!empty($_GET['idclient'])) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');
    $delElement = $_GET['idclient'];
    $delE = $bdd->prepare('DELETE FROM iw22_user WHERE id = ?');
    $delE->execute([$delElement]);
    header("Location: backOffice/admin/client_list.php");
    exit();
}

if (!empty($_GET['idtrot'])) {
    require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');
    $delElement = $_GET['idtrot'];
    $delE = $bdd->prepare('DELETE FROM iw22_scooter WHERE id = ?');
    $delE->execute([$delElement]);
    header("Location: backOffice/admin/admin_list_scooter.php");
    exit();
}

?>
