<?php
session_start();
$pageTitle = "403 Forbidden";
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
        <h1>Erreur 403</h1>
        <h4>Vous n'avez pas les droits d'accès nécessaires.</h4>
        <a class="btn btn-success" href="javascript:history.go(-1)">Retour</a>
    </center>
</body>