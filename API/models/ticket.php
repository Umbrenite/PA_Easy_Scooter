<?php

require __DIR__ . "/../../database/database.php";

class TicketModel
{
    public static function getList($bdd) {

        $connection = $bdd;

        $getTicketsQuery = $connection->query("SELECT * FROM iw22_ticket");

        $tickets = $getTicketsQuery->fetchAll();

        return $tickets;
    }
}

?>