<?php 
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'asAjax.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'Connection.php';
if (asAjax())
{
    class modifierService
    {
        private $ancien_nom;
        private $NNS;
        private $NND;
        private $NPD;
        private $reg;
        private $success;
        private $danger;
        public function __construct() {
            if ($_POST['ancien_nom'] && $_POST['NNS'] && $_POST['NND'] && $_POST['NPD'])
            {
                $this->ancien_nom = trim($_POST['ancien_nom']);
                $this->NNS = $_POST['NNS'];
                $this->NND = $_POST['NND'];
                $this->NPD = $_POST['NPD'];
                $this->success = "success";
                $this->danger = "fail";
            }
            $this->reg = "#[a-zA-ZéèïîÉÈÎÏ]+$#";
        }
        public function setNNS() {
            if ((isset($this->NNS)) && (!empty($this->NNS)) && preg_match($this->reg, $this->NNS) && (strlen($this->NNS) <= 40))
            {
                return $this->NNS;
            }
        }
        public function setNND() {
            if ((isset($this->NND)) && (!empty($this->NND)) && preg_match($this->reg, $this->NND) && (strlen($this->NND) <= 40))
            {
                return $this->NND;
            }
        }
        public function setNPD() {
            if ((isset($this->NPD)) && (!empty($this->NPD)) && preg_match($this->reg, $this->NPD) && (strlen($this->NPD) <= 40))
            {
                return $this->NPD;
            }
        }
        public function funModifier()
        {
            $select_serv  = Connection::connection_bd()->query('SELECT service.nomS,
            delegue.nomD,delegue.prenomD FROM service,delegue WHERE 1');
            while ($datas = $select_serv->fetch()) {
                if (($datas['nomS'] === $this->setNNS()) || ($datas['nomD'] === $this->setNND() && $datas['prenomD'] === $this->setNPD()))
                {
                    return $this->danger;
                }
            }
            $update_datas = Connection::connection_bd()->prepare('UPDATE service,delegue,sortie SET service.nomS=:setNNS,
            sortie.dele=:setSortieDel, delegue.nomD=:setNND,delegue.prenomD=:setNPD WHERE sortie.dele=CONCAT(delegue.nomD,\' \',delegue.prenomD) AND 
            service.nomS=:ancien_nom AND service.idS=delegue.idD');
            $update_datas->execute(array(
                'ancien_nom' => $this->ancien_nom,
                'setSortieDel' => $this->setNND() . " " . $this->setNPD(),
                'setNNS' => $this->setNNS(),
                'setNND' => $this->setNND(),
                'setNPD' => $this->setNPD()
            ));
            return $this->success;
        }
    }
    $modification = new modifierService();
    echo $modification->funModifier();
} else {
    while (1) {}
}