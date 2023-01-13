<?php
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
if (asAjax())
{
    class liste
    {
        public function funListe()
        {
            $display = Connection::connection_bd()->query('SELECT nomD, prenomD FROM delegue,service WHERE delegue.idD=service.idS');
            while ($donnee_delegue = $display->fetch()) {
                echo "<option value=\"{$donnee_delegue['nomD']} {$donnee_delegue['prenomD']}\">{$donnee_delegue['nomD']} {$donnee_delegue['prenomD']}";
            }
        }
    }
    $liste = new liste();
    $liste->funListe();
} else {
    while (1) {}
}