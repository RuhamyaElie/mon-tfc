<?php
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "Connection.php";
require_once dirname(__DIR__) . DIRECTORY_SEPARATOR . "sys" . DIRECTORY_SEPARATOR . "asAjax.php";
if (asAjax())
{
    class updateUser
    {
        private $nomU;
        private $preU;
        private $admU;
        private $mdpU;
        private $Confmdp;


        public function __construct()
        {
            if (isset($_POST['nomU']) && isset($_POST['preU']) && isset($_POST['admU']) && isset($_POST['mdpU']) && isset($_POST['Confmdp']))
            {
                $this->nomU = $_POST['nomU'];
                $this->preU = $_POST['preU'];
                $this->admU = $_POST['admU'];
                $this->mdpU = $_POST['mdpU'];
                $this->Confmdp = $_POST['Confmdp'];
            }
            $this->reg1 = "#[a-zA-Z0-9éèïîÉÈÎÏ\_\-\#\$]+$#";
            $this->reg1Dose = "#[a-zA-Z0-9\,\.]+$#";
            $this->reg1Cond = "#[a-zA-Z0-9]+$#";
        }
        public function setNomU() {
            if ((isset($this->nomU)) && (!empty($this->nomU)) && (preg_match($this->reg1, $this->nomU)) && (strlen($this->nomU) <= 40))
            {
                return $this->nomU;
            }
        }
        public function setPreU() {
            if ((isset($this->preU)) && (!empty($this->preU)) && (preg_match($this->reg1, $this->preU)) && (strlen($this->preU) <= 40))
            {
                return $this->preU;
            }
        }
        public function setAMU() {
            if ((isset($this->admU)) && (!empty($this->admU)) && (filter_var($this->admU, FILTER_VALIDATE_EMAIL)) && (strlen($this->admU) <= 40))
            {
                return $this->admU;
            }
        }
        public function setMDPU() {
            if ((isset($this->mdpU)) && (!empty($this->mdpU)) && preg_match($this->reg1, $this->mdpU) && (strlen($this->mdpU) <= 16))
            {
                return $this->mdpU;
            }
        }
        public function setConfMDPU() {
            if ((isset($this->Confmdp)) && (!empty($this->Confmdp)) && preg_match($this->reg1, $this->Confmdp) && (strlen($this->Confmdp) <= 16))
            {
                return $this->Confmdp;
            }
        }
        public function funUpdateUser()
        {
            if ($this->setNomU() && $this->setPreU() && $this->setAMU() && $this->setMDPU() && $this->setConfMDPU())
            {
                if ($this->setMDPU() === $this->setConfMDPU())
                {
                    $update_ = Connection::connection_bd()->prepare("UPDATE utilisateur SET 
                    nomU=:setNomU, preU=:setPreU, adMU=:setAMU, mdpU=:setMDPU WHERE idUser=1");
                    $update_->execute(array(
                        'setNomU' => $this->setNomU(),
                        'setPreU' => $this->setPreU(),
                        'setAMU' => $this->setAMU(),
                        'setMDPU' => password_hash($this->setConfMDPU(), PASSWORD_DEFAULT)
                    ));
                    echo "succès";
                }
            }
        }
    }
    $Utilisateur = new updateUser();
    $Utilisateur->funUpdateUser();
} else {
    while (1) {}
}