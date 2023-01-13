<?php
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'asAjax.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'Connection.php';
if (asAjax())
{
    class liste_service
    {
        public function funViderListeService()
        {
            $vider_liste_service = Connection::connection_bd()->query('TRUNCATE service');
            $vider_liste_service = Connection::connection_bd()->query('TRUNCATE delegue');
        }
    }
    $liste_service = new liste_service();
    $liste_service->funViderListeService();
} else {
    while (1) {}
}