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

$member = $bdd->prepare("SELECT * FROM iw22_user where id = $_SESSION[id]");
$member->execute();
$resultMember = $member->fetchAll();
$fg_pack_member = $resultMember[0]['fg_package'];

$bills = $bdd->prepare("SELECT * FROM iw22_bill where user_id = $_SESSION[id]");
$bills->execute();
$resultBills = $bills->fetchAll();
$nbBills = count($resultBills);
$product_order = $resultBills[0]['product'];

$product = $bdd->prepare('SELECT name,price FROM iw22_bill left join iw22_package on iw22_bill.product = iw22_package.name where name != "" union all SELECT name,price from iw22_bill right join iw22_accessory on iw22_bill.product = iw22_accessory.name where iw22_bill.product = iw22_accessory.name');
$product->execute();
$resultProduct = $product->fetchAll();

$package_per_users = $bdd->prepare('SELECT name,price FROM iw22_package left join iw22_user on iw22_package.id = iw22_user.fg_package where fg_package = "'.$fg_pack_member.'"');
$package_per_users->execute();
$resultPackage_per_users = $package_per_users->fetchAll();
?>

