<?php

require __DIR__ . "/../../connexion_mysql/json-response.php";
require __DIR__ . "/../../models/scooters.php";

try {

    $scooters = ScooterModel::getList($bdd);
    Response::json(200, [], [ "scooters" => $scooters ]);
} catch (PDOException $exception) {
    $errorMessage = $exception->getMessage();
    Response::json(500, [], [ "error" => "Error while accessing the database: $errorMessage" ]);
}