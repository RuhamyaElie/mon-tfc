<?php
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class displayListe
    {
        private $produit;
        public function __construct()
        {
            if (isset($_POST['produit']))
            {
                $this->produit = $_POST['produit'];
            }
        }
        public function display_liste() {
            $display_sortie = Connection::connection_bd()->prepare('SELECT sortie.dele,sortie.desi,
            CONCAT(DAY(sortie.dateS), " - ", MONTH(sortie.dateS), " - ", YEAR(sortie.dateS)),sortie.qtteSort, service.nomS, delegue.nomD,delegue.prenomD, medicament.qtteMedi
            FROM sortie,service,delegue,medicament
            WHERE sortie.dele=CONCAT(delegue.nomD, \' \',
            delegue.prenomD) AND medicament.produit=sortie.desi AND medicament.produit=:produit AND
            service.idS=delegue.idD');
            $display_sortie->execute(array(
                'produit' => $this->produit
            ));
            while ($displa_datas = $display_sortie->fetch()) {
                echo "<div class=\"divHistoEntr\">
                        <div class=\"divInfosUniq\">
                            <p class=\"pdS\"> {$displa_datas['CONCAT(DAY(sortie.dateS), " - ", MONTH(sortie.dateS), " - ", YEAR(sortie.dateS))']} </p>
                            <p class=\"psC\"> {$displa_datas['nomS']} </p>
                            <p class=\"pnD\"> {$displa_datas['nomD']} </p>
                            <p class=\"sqS\"> {$displa_datas['qtteMedi']} </p>
                            <p class=\"pqR\"> {$displa_datas['qtteSort']} </p>
                        </div>
                    </div>";
            }
        }
    }
    $displayListe = new displayListe();
    echo $displayListe->display_liste();
} else {
    while (1) {}
}
