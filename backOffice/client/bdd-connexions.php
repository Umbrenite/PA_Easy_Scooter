<?php
// if (!empty($_GET['id'])) $getId = intval($_GET['id']);
// if ($getId != $_SESSION['id']) header("Location: ../../index.php");


if (!isset($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}

require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');
$users = $bdd->prepare("SELECT * FROM iw22_user where role='client' AND id >= 1");
$users->execute();
$resultUsers = $users->fetchAll();
$nbUsers = count($resultUsers);

$member = $bdd->prepare("SELECT * FROM iw22_user where id = $_GET[id]");
$member->execute();
$resultMember = $member->fetchAll();
$fg_pack_member = $resultMember[0]['fg_package'];

$package_per_users = $bdd->prepare("SELECT name FROM iw22_package left join iw22_user on iw22_package.id = iw22_user.fg_package where fg_package = $fg_pack_member");
$package_per_users->execute();
$resultPackage_per_users = $package_per_users->fetchAll();
?>

