<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class displayListe
    {
        private $idM;
        public function __construct()
        {
            if (isset($_POST['idM_']))
            {
                $this->idM = $_POST['idM_'];
            }
        }
        public function display_liste() {
            $display_Update = Connection::connection_bd()->prepare('SELECT requisition.produitRequis, requisition.numLRec,
            CONCAT(DAY(requisition.dateERec), " - ", MONTH(requisition.dateERec), " - ", YEAR(requisition.dateERec)),
            CONCAT(DAY(requisition.datePRec), " - ", MONTH(requisition.datePRec), " - ", YEAR(requisition.datePRec)),
            requisition.socDRec, requisition.qtteRec
            FROM medicament, requisition WHERE medicament.produit=requisition.produitRequis
            AND medicament.idM=:idM');
            $display_Update->execute(array(
                'idM' => $this->idM
            ));
            while ($displa_datas = $display_Update->fetch()) {
                echo "<div class=\"divHisto\">
                        <div class=\"divInfosPlus_\">
                            <div class=\"divM\">
                                <h4 class=\"titleDateE\">La date d'entrée</h4>
                                <p class=\"p\">Le numéro du Lot </p>
                                <p class=\"p\">La date de péremption </p>
                                <p class=\"p\">La société d'origine </p>
                                <p class=\"p\">La quantité du stock </p>
                            </div>
                            <div class=\"divDeuxPoints\">
                                <p class=\"p\"> : </p>
                                <p class=\"p\"> : </p>
                                <p class=\"p\"> : </p>
                                <p class=\"p\"> : </p>
                                <p class=\"p\"> : </p>
                            </div>
                            <div class=\"divMM\">
                                <p class=\"pdE\"> {$displa_datas['CONCAT(DAY(requisition.dateERec), " - ", MONTH(requisition.dateERec), " - ", YEAR(requisition.dateERec))']} </p>
                                <p class=\"pnL\"> {$displa_datas['numLRec']} </p>
                                <p class=\"pdP\"> {$displa_datas['CONCAT(DAY(requisition.datePRec), " - ", MONTH(requisition.datePRec), " - ", YEAR(requisition.datePRec))']} </p>
                                <p class=\"scD\"> {$displa_datas['socDRec']} </p>
                                <p class=\"pqR\"> {$displa_datas['qtteRec']} </p>
                            </div>
                        </div>
                        <div class=\"divImgPlus\">
                            <img src=\"../img/png/chevron_down_50px.png\" class=\"imgDown\">
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