<?php

require __DIR__ . "/../../database/database.php";

class UserModel
{
    public static function getList($bdd) {

        $connection = $bdd;

        $getUsersQuery = $connection->query("SELECT * FROM iw22_user");

        $users = $getUsersQuery->fetchAll();

        return $users;
    }
}

?>