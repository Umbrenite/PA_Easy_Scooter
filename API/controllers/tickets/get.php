<?php

require __DIR__ . "/../../connexion_mysql/json-response.php";
require __DIR__ . "/../../models/ticket.php";

try {

    $tickets = TicketModel::getList($bdd);
    Response::json(200, [], [ "ticket" => $tickets ]);
} catch (PDOException $exception) {
    $errorMessage = $exception->getMessage();
    Response::json(500, [], [ "error" => "Error while accessing the database: $errorMessage" ]);
}
