<?php
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
    require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
    if (asAjax())
    {
        class DeleteMede
        {
            static function funDelete()
            {
                $reponse = Connection::connection_bd()->prepare('DELETE FROM medicament WHERE idM=:idM AND produit=:produit AND forme=:forme AND dose=:dose AND cond=:cond LIMIT 1');
                $reponse->execute(array(
                    'idM' => $_POST['idM'],
                    'produit' => $_POST['produit'],
                    'forme' => $_POST['forme'],
                    'dose' => $_POST['dose'],
                    'cond' => $_POST['cond']
                ));
                echo "succès";
            }
        }
        DeleteMede::funDelete();
    } else {
        while (1) {}
    }
