<?php

require __DIR__ . "/../../connexion_mysql/json-response.php";
require __DIR__ . "/../../models/users.php";
require __DIR__ . "/../../connexion_mysql/request.php";
require __DIR__ . "/../../../database/database.php";

try {

    $users = UserModel::getList($bdd);
    Response::json(200, [], [ "users" => $users ]);
} catch (PDOException $exception) {
    $errorMessage = $exception->getMessage();
    Response::json(500, [], [ "error" => "Error while accessing the database: $errorMessage" ]);
}
