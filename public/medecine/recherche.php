<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class Recherche
    {
        private $champRec;
        public function __construct()
        {
            if (isset($_POST['champRec']))
            {
                $this->champRec = $_POST['champRec'];
            }
        }
        public function recherche_liste() 
        {
            $recherche = Connection::connection_bd()->prepare('SELECT * FROM medicament WHERE produit=:champRec');
            $recherche->execute(array(
                'champRec' => $this->champRec
            ));
            while ($dataM = $recherche->fetch())
                {
                    echo "<div class=\"divInfosMedi\">
                            <div class=\"divNum\">
                                <p class=\"paraInfosMedi\">{$dataM['idM']}</p>
                            </div>
                            <div class=\"divProd\">
                                <p class=\"paraInfosMedi\">{$dataM['produit']}</p>
                            </div>
                            <div class=\"divForm\">
                                <p class=\"paraInfosMedi\">{$dataM['forme']}</p>
                            </div>
                            <div class=\"divDateP\">
                                <p class=\"paraInfosMedi\">{$dataM['dateP']}</p>
                            </div>
                            <div class=\"divStock\">
                                <p class=\"paraInfosMedi\">{$dataM['qtteMedi']}</p>
                            </div>
                            <div class=\"divBtnES\">
                                <p class=\"btnData\"> <a class=\"p_mod\" href=\"../medeInfos/medeInfos.php?idM={$dataM['idM']}&produit={$dataM['produit']}&forme={$dataM['forme']}&dose={$dataM['dose']}&cond={$dataM['cond']}&numL={$dataM['numL']}&dateE={$dataM['dateE']}&dateP={$dataM['dateP']}&socD={$dataM['socD']}&qtteRec={$dataM['qtteMedi']}\">Déscription</a></p>
                            </div>
                        </div>";
                }
                $recherche->closeCursor();
            }
        }
    $ma_recherche = new Recherche();
    $ma_recherche->recherche_liste();
} else {
    while (1) {}
}