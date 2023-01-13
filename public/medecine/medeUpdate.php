<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class medeUpadate
    {
        private $idM;
        private $numLot;
        private $dateE;
        private $dateP;
        private $socDori;
        private $qtteMedi;

        private $produitRequis_;
        private $numLot_;
        private $dateE_;
        private $dateP_;
        private $socDori_;
        private $qtteRec_;

        public function __construct() {
            if (isset($_POST))
            {
                $this->idM = (int)$_POST['idM'];
                $this->numLot = $_POST['numL'];
                $this->dateE = $_POST['dateE'];
                $this->dateP = $_POST['dateP'];
                $this->socDori = $_POST['socD'];
                $this->qtteMedi = (int)$_POST['qtteMedi'];
            } else {}
            $this->reg1 = "#[a-zA-Z0-9éèïîÉÈÎÏ\_\-\#\$]+$#";
            $this->reg1Cond = "#[a-zA-Z0-9]+$#";
        }

        public function setNumLot() {
            if ((isset($this->numLot)) && (!empty($this->numLot)) && preg_match($this->reg1Cond, $this->numLot) && (strlen($this->numLot) <= 20))
            {
                return $this->numLot;
            }
        }
        public function setDateE() {
            if ((isset($this->dateE)) && (!empty($this->dateE)))
            {
                return $this->dateE;
            }
        }
        public function setDateP() {
            if ((isset($this->dateP)) && (!empty($this->dateP)))
            {
                return $this->dateP;
            }
        }
        public function setSocDori() {
            if ((isset($this->socDori)) && (!empty($this->socDori)) && preg_match($this->reg1, $this->socDori) && (strlen($this->socDori) <= 40))
            {
                return $this->socDori;
            }
        }
        public function setQtteMedi() {
            if ((isset($this->qtteMedi)) && (!empty($this->qtteMedi)))
            {
                return $this->qtteMedi;
            }
        }
        public function recover_update() {
            $display_Update = Connection::connection_bd()->prepare('SELECT produit, numL, dateE, dateP, socD, qtteMedi FROM medicament WHERE idM=:idM');
            $display_Update->execute(array(
                'idM' => $this->idM
            ));
            while ($don_rec = $display_Update->fetch()) {
                $this->produitRequis_ = $don_rec['produit'];
                $this->numLot_ = $don_rec['numL'];
                $this->dateE_ = $don_rec['dateE'];
                $this->dateP_ = $don_rec['dateP'];
                $this->socDori_ = $don_rec['socD'];
                $this->qtteRec_ = $don_rec['qtteMedi'];
            }
        }
        public function validUpdate() {
            if ($this->setNumLot() && $this->setDateE() < $this->setDateP() && $this->setSocDori() && $this->setQtteMedi())
            {
                $update = Connection::connection_bd()->prepare('UPDATE medicament SET numL=:setNumLot,
                dateE=:setDateE, dateP=:setDateP, socD=:setSocDori, qtteMedi=:setQtteMedi WHERE idM=:idM');
                $update->execute(array(
                    'setNumLot' => $this->setNumLot(),
                    'setDateE' => $this->setDateE(),
                    'setDateP' => $this->setDateP(),
                    'setSocDori' => $this->setSocDori(),
                    'setQtteMedi' => (int)$this->setQtteMedi() + (int)$this->qtteRec_,
                    'idM' => $this->idM
                ));
            }
        }
        public function saveRec() {
            $save_rec = Connection::connection_bd()->prepare('INSERT INTO requisition (idRec, produitRequis, numLRec, dateERec, datePRec, socDRec, qtteRec) VALUES (:idRec, :produitRequis, :numLRec, :dateERec, :datePRec, :socDRec, :qtteRec)');
            $save_rec->execute(array(
                'idRec' => NULL,
                'produitRequis' => $this->produitRequis_,
                'numLRec' => $this->setNumLot(),
                'dateERec' => $this->setDateE(),
                'datePRec' => $this->setDateP(),
                'socDRec' => $this->setSocDori(),
                'qtteRec' => $this->setQtteMedi() //+ $this->qtteRec_
            ));
            echo "enregistré";
        }
        public function display_update() {
            // $display_Update = Connection::connection_bd()->prepare('SELECT requisition.produitRequis, requisition.numLRec, 
            // CONCAT(DAY(medicament.dateE), " - ", MONTH(medicament.dateE), " - ", YEAR(medicament.dateE)),
            // CONCAT(DAY(medicament.dateP), " - ", MONTH(medicament.dateP), " - ", YEAR(medicament.dateP)), requisition.socDRec,
            // requisition.qtteRec FROM requisition, medicament WHERE
            // medicament.qtteMedi=requisition.qtteRec AND medicament.socD=requisition.socDRec AND medicament.dateP=requisition.datePRec
            // AND medicament.dateE=requisition.dateERec AND medicament.numL=requisition.numLRec AND medicament.idM =:idM LIMIT 1');
            // $display_Update->execute(array(
            //     'idM' => $this->idM
            // ));
            // while ($displa_datas = $display_Update->fetch()) {
            //     echo "<div class=\"divHisto\">
            //             <div class=\"divInfosPlus_\">
            //                 <div class=\"divM\">
            //                     <h4 class=\"titleDateE\">La date d'entrée</h4>
            //                     <p class=\"p\">Le numéro du médicament </p>
            //                     <p class=\"p\">La date de péremption </p>
            //                     <p class=\"p\">La société d'origine </p>
            //                     <p class=\"p\">Le stock entrant </p>
            //                 </div>
            //                 <div class=\"divDeuxPoints\">
            //                     <p class=\"p\"> : </p>
            //                     <p class=\"p\"> : </p>
            //                     <p class=\"p\"> : </p>
            //                     <p class=\"p\"> : </p>
            //                     <p class=\"p\"> : </p>
            //                 </div>
            //                 <div class=\"divMM\">
            //                     <p class=\"pdE\"> {$displa_datas['CONCAT(DAY(medicament.dateE), " - ", MONTH(medicament.dateE), " - ", YEAR(medicament.dateE))']} </p>
            //                     <p class=\"pnL\"> {$displa_datas['numL']} </p>
            //                     <p class=\"pdP\"> {$displa_datas['CONCAT(DAY(medicament.dateP), " - ", MONTH(medicament.dateP), " - ", YEAR(medicament.dateP))']} </p>
            //                     <p class=\"scD\"> {$displa_datas['socD']} </p>
            //                     <p class=\"pqR\"> {$displa_datas['qtteRec']} </p>
            //                 </div>
            //             </div>
            //             <div class=\"divImgPlus\">
            //                 <img src=\"../img/png/chevron_down_50px.png\" class=\"imgDown\">
            //             </div>
            //         </div>";
            // }
            echo "bien";
        }
    }
    $valModi = new medeUpadate();
    $valModi->recover_update();
    $valModi->validUpdate();
    $valModi->saveRec();
    // echo $valModi->display_update();
} else {
    while (1) {}
}