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
            $display_Update = Connection::connection_bd()->prepare('SELECT requisition.produitRequis, requisition.numLRec,
            CONCAT(DAY(requisition.dateERec), " - ", MONTH(requisition.dateERec), " - ", YEAR(requisition.dateERec)),
            CONCAT(DAY(requisition.datePRec), " - ", MONTH(requisition.datePRec), " - ", YEAR(requisition.datePRec)), requisition.socDRec, requisition.qtteRec
            FROM medicament, requisition WHERE medicament.produit=requisition.produitRequis
            AND requisition.produitRequis=:produit');
            $display_Update->execute(array(
                'produit' => $this->produit
            ));
            while ($displa_datas = $display_Update->fetch()) {
                echo "<div class=\"divHistoEntr\">
                        <div class=\"divInfosUniq\">
                            <p class=\"pdE\"> {$displa_datas['CONCAT(DAY(requisition.dateERec), " - ", MONTH(requisition.dateERec), " - ", YEAR(requisition.dateERec))']} </p>
                            <p class=\"pnL\"> {$displa_datas['numLRec']} </p>
                            <p class=\"pdP\"> {$displa_datas['CONCAT(DAY(requisition.datePRec), " - ", MONTH(requisition.datePRec), " - ", YEAR(requisition.datePRec))']} </p>
                            <p class=\"scD\"> {$displa_datas['socDRec']} </p>
                            <p class=\"pqR\"> {$displa_datas['qtteRec']} </p>
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
