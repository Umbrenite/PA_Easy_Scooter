<?php 

print_r($_SERVER);
if (!isset($_SERVER['HTTP_APIKEY'])) {
    header('HTTP/1.1 401 Unauthorized');
    //header('WWW-Authenticate: Basic realm="Scooters"');
    exit;
}
// $ratio = $_SERVER['HTTP_APIKEY'];
// var_dump($ratio);

require_once($_SERVER['DOCUMENT_ROOT'] . '/database/database.php');

$allScooters = $bdd->prepare("SELECT id, latitude, longitude FROM iw22_scooter");
$allScooters->execute(array());

header('Content-Type: application/json');

echo (json_encode($allScooters->fetchAll()));
