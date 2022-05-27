<?php
session_start();
$pageTitle = "400 Bad Request";
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
        <h1>Erreur 400</h1>
        <h4>Le serveur ne peut pas comprendre la requête en raison d'une syntaxe invalide.</h4>
        <a class="btn btn-success" href="javascript:history.go(-1)">Retour</a>
    </center>
</body>