<?php

require __DIR__ . "/../../database/database.php";

class ScooterModel
{
    public static function getList($bdd) {

        $connection = $bdd;

        $getScootersQuery = $connection->query("SELECT * FROM iw22_scooter");

        $scooters = $getScootersQuery->fetchAll();

        return $scooters;
    }

    public static function update($json,$bdd) {

        $connection = $bdd;

        $setScootersQuery = $connection->prepare("UPDATE iw22_scooter SET status = :status WHERE id = :id");

        $setScootersQuery->execute($json);
    }
}