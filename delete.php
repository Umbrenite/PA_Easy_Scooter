<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

if ($_SESSION['role'] != "admin") {
    header("Location: ../../index.php");
    exit();
}

require_once('struct/functions.php');

if (!empty($_GET['idadmin'])) {
    deleteT($_GET['idadmin'], "iw22_user", "admin_list");
    exit();
}

if (!empty($_GET['idclient'])) {
    deleteT($_GET['idclient'], "iw22_user", "client_list");
    exit();
}

if (!empty($_GET['idtrot'])) {
    deleteT($_GET['idtrot'], "iw22_scooter", "admin_list_scooter");
    exit();
}
