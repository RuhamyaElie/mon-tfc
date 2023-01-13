<?php
require_once (__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once (__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class viderTables
    {
        public function valid_sup()
        {
            $delete = Connection::connection_bd()->exec('SET GLOBAL FOREIGN_KEY_CHECKS = 0');
            $delete = Connection::connection_bd()->query('TRUNCATE medicament');
            $delete = Connection::connection_bd()->query('TRUNCATE sortie');
            $delete = Connection::connection_bd()->query('TRUNCATE requisition');
            $delete = Connection::connection_bd()->query('TRUNCATE delegue');
            echo "succès";
        }
    }
    $Utilisateur = new viderTables();
    $Utilisateur->valid_sup();
} else {
    while (1) {}
}