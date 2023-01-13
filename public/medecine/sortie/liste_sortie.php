<?php
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
if (asAjax())
{
    class listeSortie
    {
        private $num_produit;
        public function __construct()
        {
            if (isset($_POST['num_produit']))
            {
                $this->num_produit = $_POST['num_produit'];
            }
        }
        public function funListeSortie()
        {
            $display_sortie = Connection::connection_bd()->prepare('SELECT sortie.dele,sortie.desi,sortie.qtteRest,
            CONCAT(DAY(sortie.dateS), " - ", MONTH(sortie.dateS), " - ", YEAR(sortie.dateS)),sortie.qtteSort, UPPER(service.nomS), delegue.nomD,delegue.prenomD, medicament.qtteMedi
            FROM sortie,service,delegue,medicament WHERE sortie.dele=CONCAT(delegue.nomD, \' \',
            delegue.prenomD) AND medicament.produit=sortie.desi AND medicament.idM=:idM AND
            service.idS=delegue.idD');

            $display_sortie->execute(array(
                'idM' => $this->num_produit
            ));
            while ($donnee_sortie = $display_sortie->fetch()) {
                echo "<div class=\"divHisto\">
                        <div class=\"divInfosPlus_\">
                            <div class=\"divM\">
                                <h4 class=\"titleDateS\">La date de sortie</h4>
                                <p class=\"p\">Le service concerné </p>
                                <p class=\"p\">Le nom du délégué </p>
                                <p class=\"p\">La quantité sortante </p>
                                <p class=\"p\">La quantité restante </p>
                            </div>
                            <div class=\"divDeuxPoints\">
                                <p class=\"p\"> : </p>
                                <p class=\"p\"> : </p>
                                <p class=\"p\"> : </p>
                                <p class=\"p\"> : </p>
                                <p class=\"p\"> : </p>
                            </div>
                            <div class=\"divMM\">
                                <p class=\"pdE\"> {$donnee_sortie['CONCAT(DAY(sortie.dateS), " - ", MONTH(sortie.dateS), " - ", YEAR(sortie.dateS))']} </p>
                                <p class=\"pdP\"> {$donnee_sortie['UPPER(service.nomS)']} </p>
                                <p class=\"scD\"> {$donnee_sortie['dele']} </p>
                                <p class=\"pqR\"> {$donnee_sortie['qtteSort']} </p>
                                <p class=\"pqR_r\"> {$donnee_sortie['qtteRest']} </p>
                            </div>
                        </div>
                        <div class=\"divImgPlus\">
                            <img src=\"../img/png/chevron_down_50px.png\" class=\"imgDown\">
                        </div>
                    </div>";
            }
        }
    }
    $liste_sortie = new listeSortie();
    $liste_sortie->funListeSortie();
} else {
    while (1) {}
}