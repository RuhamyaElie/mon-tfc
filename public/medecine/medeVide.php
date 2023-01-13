
<?php
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
    
    if (asAjax())
    {
        class ListeVide
        {
            static function funListeVide()
            {
                $rep = Connection::connection_bd()->exec('SET GLOBAL FOREIGN_KEY_CHECKS = 0');
                $rep = Connection::connection_bd()->exec('TRUNCATE medicament');
                $rep = Connection::connection_bd()->exec('TRUNCATE requisition');
                $rep = Connection::connection_bd()->exec('TRUNCATE sortie');
            }
        }
        ListeVide::funListeVide();
    } else {
        while (1) {}
    }
?>