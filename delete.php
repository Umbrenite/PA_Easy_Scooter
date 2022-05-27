<?php
session_start();

if (!empty($_GET['idclient'])) {
    require_once "database/database.php";
    $delElement = $_GET['idclient'];
    $delE = $bdd->prepare('DELETE FROM iw22_user WHERE id = ?');
    $delE->execute([$delElement]);
    header("Location: backOffice/admin/admin_users_client.php?id=" . $_SESSION['id']);
    exit();
}

if (!empty($_GET['idtrot'])) {
    require_once "database/database.php";
    $delElement = $_GET['idtrot'];
    $delE = $bdd->prepare('DELETE FROM iw22_scooter WHERE id = ?');
    $delE->execute([$delElement]);
    header("Location: backOffice/admin/admin_list_scooter.php?id=" . $_SESSION['id']);
    exit();
}

?>
