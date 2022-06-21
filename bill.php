<?php
require '../../../home/pierre/vendor/autoload.php';
?>

<?php
$stylesheet = file_get_contents('css/style.css'); // external css
$mpdf = new \Mpdf\Mpdf(['tempDir' => '/tmp']);


ob_start();

echo '
<head>
<link rel="stylesheet" href="css/style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<h1>FACTURE</h1>
<h5>Votre nom</h5>
<hr>
<div>
    <div>
        <h3>FACTURE DE</h3>
        <span>Arthur BLANDIN</span><br>
        <span>14 allee du vent</span><br>
        <span>95012 Paris</span><br>
    </div>
    <hr>
    <div>
        <h3>INFORMATIONS SUR LE PRODUIT</h3>
        <span>Prix : 15 euros</span><br>
        <span>1xForfait Slow</span><br>
    </div>
    <hr>
    <div>
        <h3>ENVOI A</h3>
        <span>Pierre EVRARD</span><br>
        <span>14 allee du vent</span><br>
        <span>95012 Paris</span><br>
    </div>
    <hr>

    <div>
        <h3>FACTURE N.</h3>
        <span>FR-001</span><br>
    </div>

    <hr>

    <div>
        <h3>DATE</h3>
        <span>29/01/19</span><br>
    </div> 

    <hr>
</div>
';

$html = ob_get_contents();


$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);
$mpdf->Output();
?>
