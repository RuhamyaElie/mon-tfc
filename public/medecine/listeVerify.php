<?php

require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class listeVerify
    {
        private $tmp_id;
        public function __construct()
        {
            if (isset($_POST['idM_']))
            {
                $this->tmp_id = $_POST['idM_'];
            }
        }
        public function listeVerify_()
        {
            $display_Update = Connection::connection_bd()->prepare('SELECT numL, dateE, dateP, socD, qtteRec FROM medicament WHERE idM=:tmp_id');
            $display_Update->execute(array(
                'tmp_id' => $this->tmp_id
            ));
            while ($displa_datas = $display_Update->fetch()) {
                echo "<div class=\"divHisto\">
                        <div class=\"divInfosPlus_\">
                            <div class=\"divM\">
                                <h4 class=\"titleDateE\">La date d'entrée</h4>
                                <p class=\"p\">Le numéro du médicament </p>
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
                                <p class=\"pdE\"> {$displa_datas['dateE']} </p>
                                <p class=\"pnL\"> {$displa_datas['numL']} </p>
                                <p class=\"pdP\"> {$displa_datas['dateP']} </p>
                                <p class=\"scD\"> {$displa_datas['socD']} </p>
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
    $veri_liste = new listeVerify();
    echo $veri_liste->listeVerify_();
} else {
    while (1) {}
}