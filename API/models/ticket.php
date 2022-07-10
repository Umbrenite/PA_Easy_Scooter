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

    public static function create($json,$bdd) {
        $connection = $bdd;
        $date_now = date('Y-m-d');
        if (preg_match('/^\d{4}-(0[1-9]|1[012])-(0[1-9]|[12][0-9]|3[01])$/', $date_now)) {
            if(strstr($json['request_type'], 'Bug') != null){
                $query = $connection->prepare("INSERT INTO iw22_ticket(id_user,title, description, status, request_type, priority_level, date_created) VALUES(:id,:title, :description, 'En cours', :request_type, 'Moyen', '".$date_now."');");
                $query->execute($json);
            }
            if(strstr($json['request_type'], 'Panne') != null){
                $query = $connection->prepare("INSERT INTO iw22_ticket(id_user,title, description, status, request_type, priority_level, date_created) VALUES(:id,:title, :description, 'En cours', :request_type, 'Faible', '".$date_now."');");
                $query->execute($json);
            }
            if(strstr($json['request_type'], 'Maintenance') != null){
                $query = $connection->prepare("INSERT INTO iw22_ticket(id_user,title, description, status, request_type, priority_level, date_created) VALUES(:id,:title, :description, 'En cours', :request_type, 'Forte', '".$date_now."');");
                $query->execute($json);
            }
            if(strstr($json['request_type'], 'Bug') == null && strstr($json['request_type'], 'Panne') == null && strstr($json['request_type'], 'Maintenance') == null){
                echo("Erreur : Le type de requête n'est pas reconnu. Veuillez réessayer plus tard.");
            }

        } else {
            textalert("Erreur : Le format de la date n'est pas correct.\nElle doit être au format (YYYY-MM-DD).");
        }

    }
}

?>