<?php
require_once '../sys/Connection.php';
class verifyUser extends Connection {
    public function VeriUti() {
        $reponse = Connection::connection_bd()->query('SELECT * FROM utilisateur WHERE 1');
        while ($donnees = $reponse->fetch()) {
            return 1;
        }
    }
}
$unicUser = new verifyUser();
// echo $unicUser->VeriUti();