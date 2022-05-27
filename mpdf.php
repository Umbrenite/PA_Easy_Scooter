<?php
$pageTitle='Facture générée';
require_once 'struct/head.php';
?>
<link rel="stylesheet" href="css/style.css" />

<h1>FACTURE</h1>
<h5>Votre nom</h5>
<span>Adresse 1</span>
<p>Code Postal</p>
<div class="row">
    <div class="col">
        <h3>FACTURE DE</h3>
        <span>Arthur BLANDIN</span><br>
        <span>14 allée du vent</span><br>
        <span>95012 Paris</span><br>
    </div>
    <div class="col">
        <h3>ENVOI A</h3>
        <span>Arthur BLANDIN</span><br>
        <span>14 allée du vent</span><br>
        <span>95012 Paris</span><br>
    </div>
    <div class="col">

        <div class="row">
        <h3>FACTURE N.</h3>
            <div class="col">
                <div class="right">FR-001</div>
            </div>
        </div>

        <div class="row">
        <h3>DATE</h3>
            <div class="col">
                <div class="right">29/01/19</div>
            </div>
        </div>

        <div class="row">
        <h3>COMMANDE N.</h3>
            <div class="col">
                <div class="right">15/1450</div>
            </div>
        </div>
        <div class="row">
        <h3>DATE LIMITE</h3>
            <div class="col">
                <div class="right">29/01/22</div>
            </div>
        </div>

    </div>    
</div>

<div class="container">
    <hr>
    <div class="row">
        <div class="col">
            QTE
        </div>

        <div class="col">
            DESIGNATION
        </div>

        <div class="col right">
            PRIX UNIT. HT
        </div>

        <div class="col right">
            MONTANT HT
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col">
            1
        </div>

        <div class="col">
            Ceci est un test
        </div>

        <div class="col right">
            100.00
        </div>

        <div class="col right">
            125.00
        </div>
        
    </div>

    <br>

    <div class="row">
        <div class="col">
            2
        </div>

        <div class="col">
            laboriosam
        </div>

        <div class="col right">
            15.00
        </div>

        <div class="col right">
            30.00
        </div>
    </div>

    
</div>
