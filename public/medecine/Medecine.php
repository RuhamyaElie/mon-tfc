<?php
require_once "../sys/asAjax.php";
require_once "../sys/Connection.php";

if (asAjax())
{
    class Medecine
    {
        private $produit;
        private $forme;
        private $dosage;
        private $condi;
        private $numLot;
        private $dateE;
        private $dateP;
        private $socDori;
        private $qttRec;
        // expression régulière
        private $reg1;
        private $tmp;
        // rédondane
        private $success;
        private $danger;
        public function __construct() {
            if ($_POST)
            {
                $this->produit = $_POST['produit'];
                $this->forme = $_POST['forme'];
                $this->dosage = $_POST['dose'];
                $this->condi = $_POST['cond'];
                $this->numLot = $_POST['numL'];
                $this->dateE = $_POST['dateE'];
                $this->dateP = $_POST['dateP'];
                $this->socDori = $_POST['socD'];
                $this->qttRec = (int)$_POST['qttRec'];

                $this->success = null;
                $this->danger = null;
            }

            $this->reg1 = "#[a-zA-Z0-9éèïîÉÈÎÏ\_\-\#\$]+$#";
            $this->reg1Dose = "#[a-zA-Z0-9\,\.]+$#";
            $this->reg1Cond = "#[a-zA-Z0-9]+$#";
        }
        public function getProduit() {
            if ((isset($this->produit)) && (!empty($this->produit)) && preg_match($this->reg1, $this->produit) && (strlen($this->produit) <= 40))
            {
                return $this->produit;
            }
        }
        public function getForme() {
            if ((isset($this->forme)) && (!empty($this->forme)) && preg_match($this->reg1, $this->forme) && (strlen($this->forme) <= 40))
            {
                return $this->forme;
            }
        }
        public function getDosage() {
            if ((isset($this->dosage)) && (!empty($this->dosage)) && preg_match($this->reg1Dose, $this->dosage) && (strlen($this->dosage) <= 10))
            {
                return $this->dosage;
            }
        }
        public function getCondi() {
            if ((isset($this->condi)) && (!empty($this->condi)) && preg_match($this->reg1Cond, $this->condi) && (strlen($this->condi) <= 10))
            {
                return $this->condi;
            }
        }
        public function getNumLot() {
            if ((isset($this->numLot)) && (!empty($this->numLot)) && preg_match($this->reg1Cond, $this->numLot) && (strlen($this->numLot) <= 20))
            {
                return $this->numLot;
            }
        }
        public function getDateE() {
            if ((isset($this->dateE)) && (!empty($this->dateE)))
            {
                return $this->dateE;
            }
        }
        public function getDateP() {
            if ((isset($this->dateP)) && (!empty($this->dateP)))
            {
                return $this->dateP;
            }
        }
        public function getSocDori() {
            if ((isset($this->socDori)) && (!empty($this->socDori)) && preg_match($this->reg1, $this->socDori) && (strlen($this->socDori) <= 40))
            {
                return $this->socDori;
            }
        }
        public function getQttRec() {
            if ((isset($this->qttRec)) && (!empty($this->qttRec)))
            {
                return $this->qttRec;
            }
        }
        public function save_ () {
            $veri = Connection::connection_bd()->query('SELECT produit FROM medicament WHERE 1');
            while ($id_produit = $veri->fetch()) {
                if ($this->getProduit() == $id_produit['produit'])
                {
                    $this->success = "<p class=\"paraRedo\">Pas de rédondance de données</p>";
                } else {
                    $this->danger = "non de rédondance";
                }
            }
            if ($this->success)
            {
                echo $this->success;
            } else {
                $reponse = Connection::connection_bd()->prepare('INSERT INTO medicament(idM,produit,forme,dose,cond,numL,dateE,dateP,socD,qtteMedi) VALUES (:idM,:produit,:forme,:dose,:cond,:numL,:dateE,:dateP,:socD,:qtteMedi)');
                $reponse->execute(array(
                'idM' => NULL,
                'produit' => $this->getProduit(),
                'forme' => $this->getForme(),
                'dose' => $this->getDosage(),
                'cond' => $this->getCondi(),
                'numL' => $this->getNumLot(),
                'dateE' => $this->getDateE(),
                'dateP' => $this->getDateP(),
                'socD' => $this->getSocDori(),
                'qtteMedi' => $this->getQttRec()
                ));
                $reponse_ = Connection::connection_bd()->prepare('INSERT INTO requisition(idRec,produitRequis,numLRec,dateERec,datePRec,socDRec,qtteRec) VALUES (:idRec,:produitRequis,:numLRec,:dateERec,:datePRec,:socDRec,:qtteRec)');
                $reponse_->execute(array(
                'idRec' => NULL,
                'produitRequis' => $this->getProduit(),
                'numLRec' => $this->getNumLot(),
                'dateERec' => $this->getDateE(),
                'datePRec' => $this->getDateP(),
                'socDRec' => $this->getSocDori(),
                'qtteRec' => $this->getQttRec()
                ));
            }
        }
        public function display_()
            {
                $reponse = Connection::connection_bd()->query('SELECT idM,produit,forme,dose,cond,numL,dateE,socD,qtteMedi,
                CONCAT(DAY(medicament.dateP), " - ", MONTH(medicament.dateP), " - ", YEAR(medicament.dateP)),
                qtteMedi FROM medicament WHERE 1');
                    while ($dataM = $reponse->fetch()) {
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
                                            <p class=\"paraInfosMedi\">{$dataM['CONCAT(DAY(medicament.dateP), " - ", MONTH(medicament.dateP), " - ", YEAR(medicament.dateP))']}</p>
                                        </div>
                                        <div class=\"divStock\">
                                            <p class=\"paraInfosMedi\">{$dataM['qtteMedi']}</p>
                                        </div>
                                        <div class=\"divBtnES\">
                                            <p class=\"btnData\"> <a class=\"p_mod\" href=\"../medeInfos/medeInfos.php?idM={$dataM['idM']}&produit={$dataM['produit']}&forme={$dataM['forme']}&dose={$dataM['dose']}&cond={$dataM['cond']}&numL={$dataM['numL']}&dateE={$dataM['dateE']}&dateP={$dataM['CONCAT(DAY(medicament.dateP), " - ", MONTH(medicament.dateP), " - ", YEAR(medicament.dateP))']}&socD={$dataM['socD']}&qtteRec={$dataM['qtteMedi']}\">Déscription</a></p>
                                        </div>
                                    </div>";
                    }
                $reponse->closeCursor();
            }
    }
    $medecine = new Medecine();
    $medecine->save_();
    $medecine->display_();
} else {
    while (1) {}
}
