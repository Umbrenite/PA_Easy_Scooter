<?php

require_once ($_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php');

require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');

$member = $bdd->prepare("SELECT * FROM iw22_user where id = $_GET[id]");
$member->execute();
$resultMember = $member->fetchAll();
$fg_pack_member = $resultMember[0]['fg_package'];

$bills = $bdd->prepare("SELECT * FROM iw22_bill where user_id = $_GET[id]");
$bills->execute();
$resultBills = $bills->fetchAll();
$product_order = $resultBills[0]['product'];

$product = $bdd->prepare(' SELECT name,price FROM iw22_bill inner join iw22_accessory on iw22_bill.product = iw22_accessory.name  where product = "'.$_GET['order'].'" union all SELECT name,price FROM iw22_bill inner join iw22_package on iw22_bill.product = iw22_package.name  where product = "'.$_GET['order'].'"');
$product->execute();
$resultProduct = $product->fetchAll();
$product_name = $resultProduct[0]['name'];


$stylesheet = file_get_contents('css/style.css'); // external css
$mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp']);


ob_start();

echo '
<head>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<h1>FACTURE</h1>
<h5>' . $resultMember[0]['firstname'] . ' ' . $resultMember[0]['lastname'] . '</h5>
<hr>
<div>
    <div>
        <h3>FACTURE DE</h3>
        <span>'. $resultMember[0]['firstname'] .'</span><br>
    </div>
    <hr>
    <div>
        <h3>INFORMATIONS SUR LE PRODUIT</h3>
        <span>Prix : ' . $resultProduct[0]['price'] . ' euros</span><br>
        <span>1x' . $resultProduct[0]['name'] . '</span><br>
    </div>
    <hr>
    <div>
        <h3>FACTURE N.</h3>
        <span>FR-00'.$_GET['facture_id'].'</span><br>
    </div>

    <hr>

    <div>
        <h3>DATE</h3>
        <span>' . $resultBills[0]['date_created'] . '</span><br>
    </div> 

    <hr>
</div>
';

$html = ob_get_contents();


$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);
$mpdf->Output();
?>
