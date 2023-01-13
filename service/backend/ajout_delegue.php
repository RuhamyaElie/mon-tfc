<?php 
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'asAjax.php';
require_once dirname(dirname(__DIR__)) . DIRECTORY_SEPARATOR . "public" . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . 'Connection.php';
if (asAjax())
{
    class ajout_Delegue
    {
        private $nomD;
        private $prenomD;
        private $reg;
        private $success;
        private $danger;
        public function __construct() {
            if (isset($_POST['nomD']) && isset($_POST['prenomD']))
            {
                $this->nomD = $_POST['nomD'];
                $this->prenomD = $_POST['prenomD'];
            }
            $this->reg = "#[a-zA-ZéèïîÉÈÎÏ]+$#";
        }
        public function getNomD() {
            if ((isset($this->nomD)) && (!empty($this->nomD)) && preg_match($this->reg, $this->nomD) && (strlen($this->nomD) <= 40))
            {
                return $this->nomD;
            }
        }
        public function getPrenomD() {
            if ((isset($this->prenomD)) && (!empty($this->prenomD)) && preg_match($this->reg, $this->prenomD) && (strlen($this->prenomD) <= 40))
            {
                return $this->prenomD;
            }
        }
        public function funAjoutDelegue()
        {
            $donnes_delegue = Connection::connection_bd()->query('SELECT nomD,prenomD FROM delegue WHERE 1');
            while ($non_redondance = $donnes_delegue->fetch()) {
                if ($this->getNomD() == $non_redondance['nomD'] && $this->getPrenomD() == $non_redondance['prenomD'])
                {
                    $this->success = "existe";
                } else {
                    $this->danger = "enregistre";
                }
            }

            if ($this->success == "existe")
            {
                $this->success = "existe";
                echo $this->success;
            } else {
                $add_service = Connection::connection_bd()->prepare('INSERT INTO delegue (idD,nomD,prenomD) VALUES (:idD,:nomD,:prenomD)');
                $add_service->execute(array(
                    'idD' => NULL,
                    'nomD' => $this->getNomD(),
                    'prenomD' => $this->getPrenomD()
                ));
            }
        }
    }
    $ajout_delegue = new ajout_Delegue();
    $ajout_delegue->funAjoutDelegue();
} else {
    while (1) {}
}