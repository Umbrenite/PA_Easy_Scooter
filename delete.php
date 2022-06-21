<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
}

if ($_SESSION['role'] != "admin") {
    header("Location: ../../index.php");
}

require_once('struct/functions.php');

if (!empty($_GET['idadmin'])) {
    deleteT($_GET['idadmin'], "iw22_user", "admin_list");
}

if (!empty($_GET['idclient'])) {
    deleteT($_GET['idclient'], "iw22_user", "client_list");
}

if (!empty($_GET['idtrot'])) {
    deleteT($_GET['idtrot'], "iw22_scooter", "admin_list_scooter");
}
