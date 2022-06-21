<?php

require "database.php";

$mail = "ratio@gmail.com";
$lastname = "evrard";
$firstname = "pierre";
$points = 0;
$confirm_key = 111111;
$pwd = "pwd";
$rol = "member";

$date_now = new DateTime();
$date_now->setTimezone(new DateTimeZone('Europe/Paris'));
// echo $date_now->format("Y-m-d H:i:s");

$ratio = $bdd->prepare('INSERT INTO iw22_user(mail, lastname, firstname, confirm_key, password, role, points, races, registration_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');

try {
    $ratio->execute(array($mail, $lastname, $firstname, $confirm_key, $pwd, $rol, $points, 0, $date_now->format("Y-m-d H:i:s")));
} catch (\Throwable $th) {
    throw $th;
}
