<?php
session_start();
$pageTitle = "401 Unauthorized";
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
        <h1>Erreur 401</h1>
        <h4>Une identification est nécessaire pour obtenir la réponse demandée.</h4>
        <a class="btn btn-success" href="javascript:history.go(-1)">Retour</a>
    </center>
</body>