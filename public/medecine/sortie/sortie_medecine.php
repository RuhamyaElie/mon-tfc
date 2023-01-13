<?php
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
if (asAjax())
{
    class Sortie
    {
        private $delegue;
        private $designation;
        private $qtteSort;
        private $dateS;

        private $regDesignation;
        private $regDelegue;
        private $regQtteSort;

        private $sucess;
        private $val_qtte;
        private $idM;

        public function __construct() {
            if (isset($_POST['dele']) && isset($_POST['desi']) && isset($_POST['qtteSort']) && isset($_POST['dateS']) && isset($_POST['idM']))
            {
                $this->delegue = $_POST['dele'];
                $this->designation = $_POST['desi'];
                $this->qtteSort = (int)$_POST['qtteSort'];
                $this->dateS = $_POST['dateS'];

                $this->regDesignation = "#[a-zA-ZéèïîÉÈÎÏ\_\-]+$#";
                $this->regDelegue = "#[a-zA-Z]+$#";
                $this->regQtteSort = "#[0-9]+$#";

                $this->success = false; 
                $this->idM = (int)$_POST['idM'];
                $this->val_qtte = 0;
            }
        }
        public function getDelegue() {
            if ((isset($this->delegue)) && (!empty($this->delegue)) && preg_match($this->regDelegue, $this->delegue) && (strlen($this->delegue) <= 40))
            {
                return $this->delegue;
            }
        }
        public function getDesignation() {
            if ((isset($this->designation)) && (!empty($this->designation)) && preg_match($this->regDesignation, $this->designation) && (strlen($this->designation) <= 40))
            {
                return $this->designation;
            }
        }
        public function getQtteSort() {
            if ((isset($this->qtteSort)) && (!empty($this->qtteSort)) && preg_match($this->regQtteSort, $this->qtteSort) && (strlen($this->qtteSort) <= 10))
            {
                return $this->qtteSort;
            }
        }
        public function getDateS() {
            if ((isset($this->dateS)) && (!empty($this->dateS)))
            {
                return $this->dateS;
            }
        }
        public function recup_() {
            $recup_medicament = Connection::connection_bd()->prepare('SELECT qtteMedi FROM medicament WHERE idM=:idM');
            $recup_medicament->execute(array(
                'idM' => $this->idM
            ));
            while ($datas_ = $recup_medicament->fetch()) {
                $this->val_qtte = (int)$datas_['qtteMedi'];
            } 
        }
        // public function save_() {
        //     $sortie_medicament = Connection::connection_bd()->prepare('INSERT INTO sortie (idSo,dele,desi,dateS,qtteSort, qtteRest) VALUES (:idSo,:dele,:desi,:dateS,:qtteSort,:qtteRest)');
        //     $sortie_medicament->execute(array(
        //         'idSo' => NULL,
        //         'dele' => $this->getDelegue(),
        //         'desi' => $this->getDesignation(),
        //         'dateS' => $this->getDateS(),
        //         'qtteSort' => $this->getQtteSort(),
        //         'qtteRest' => $this->val_qtte - $this->getQtteSort()
        //     ));
        // }
        
        public function update_()
        {
            $display_sortie = Connection::connection_bd()->prepare('UPDATE medicament SET qtteMedi=:setQttRec WHERE idM=:idM');
            if ((int)$this->val_qtte > (int)$this->qtteSort)
            {
                $display_sortie->execute(array(
                    'setQttRec' => (int)$this->val_qtte - (int)$this->qtteSort,
                    'idM' => $this->idM
                ));
                $sortie_medicament = Connection::connection_bd()->prepare('INSERT INTO sortie (idSo,dele,desi,dateS,qtteSort, qtteRest) VALUES (:idSo,:dele,:desi,:dateS,:qtteSort,:qtteRest)');
                $sortie_medicament->execute(array(
                    'idSo' => NULL,
                    'dele' => $this->getDelegue(),
                    'desi' => $this->getDesignation(),
                    'dateS' => $this->getDateS(),
                    'qtteSort' => $this->getQtteSort(),
                    'qtteRest' => $this->val_qtte - $this->getQtteSort()
                ));
                echo "success";
            }
        }
    }
    $sortie_medi = new Sortie();
    // $sortie_medi->save_();
    $sortie_medi->recup_();
    $sortie_medi->update_();
    
} else {
    while (1) {}
}