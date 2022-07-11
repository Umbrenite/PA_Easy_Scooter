<?php

require __DIR__ . "/../../connexion_mysql/json-response.php";
require __DIR__ . "/../../models/scooters.php";
require __DIR__ . "/../../connexion_mysql/request.php";

try {
    $json = Request::getJsonBody();
    ScooterModel::update($json,$bdd);
    Response::json(201, [], [ "success" => true ]);
} catch (PDOException $exception) {
    $errorMessage = $exception->getMessage();
    Response::json(500, [], [ "error" => "Error while accessing the database: $errorMessage" ]);
}
