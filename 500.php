<?php
session_start();
$pageTitle = "500 Internal Server Error";
?>

<!DOCTYPE html>
<html lang="fr">

<?php
require "struct/head.php";
?>
<link href="css/erreurs.css" rel="stylesheet" type="text/css">
</head>

<body>
    <center>
        <img src="img/logo/electrotst.png">
        <h1>Erreur 500</h1>
        <h4>Le serveur a rencontré une situation qu'il ne sait pas traiter.</h4>
        <a class="btn btn-success" href="javascript:history.go(-1)">Retour</a>
    </center>
</body>