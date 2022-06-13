<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');

$allScooters = $bdd->prepare("SELECT id, latitude, longitude FROM iw22_scooter");
$allScooters->execute(array());

header('Content-Type: application/json');

echo (json_encode($allScooters->fetchAll()));
